<?php

/**
 * This file is part of the Lean Mapper library (http://www.leanmapper.com)
 *
 * Copyright (c) 2013 Vojtěch Kohout (aka Tharos)
 *
 * For the full copyright and license information, please view the file
 * license-mit.txt that was distributed with this source code.
 */

namespace LeanMapper\Reflection;

use LeanMapper\Exception\InvalidAnnotationException;
use LeanMapper\Exception\UtilityClassException;
use LeanMapper\Relationship;
use LeanMapper\Result;

/**
 * Property factory
 *
 * @author Vojtěch Kohout
 */
class PropertyFactory
{

	/**
	 * @throws UtilityClassException
	 */
	public function __construct()
	{
		throw new UtilityClassException('Cannot instantiate utility class ' . get_called_class() . '.');
	}

	/**
	 * Creates new LeanMapper\Reflection\Property instance from given annotation
	 *
	 * @param string $annotationType
	 * @param string $annotation
	 * @param EntityReflection $reflection
	 * @return Property
	 * @throws InvalidAnnotationException
	 */
	public static function createFromAnnotation($annotationType, $annotation, EntityReflection $reflection)
	{
		$aliases = $reflection->getAliases();

		$matches = array();
		$matched = preg_match('~
			^(null\|)?
			((?:\\\\?[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)+)
			(\[\])?
			(\|null)?\s+
			(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)
			(?:\s+\(([^)]+)\))?
			(?:\s+m:enum\(([^)]+)\))?
			(?:\s+m:(?:(hasOne|hasMany|belongsToOne|belongsToMany)(?:\(([^)]+)\))?))?
			(?:\s+m:filter\(([^)]+)\))?
			(?:\s+m:extra\(([^)]+)\))?
		~xi', $annotation, $matches);

		if (!$matched) {
			throw new InvalidAnnotationException("Invalid property annotation given: @$annotationType $annotation");
		}
		$propertyType = new PropertyType($matches[2], $aliases);

		$containsCollection = $matches[3] !== '';
		if ($propertyType->isBasicType() and $containsCollection) {
			throw new InvalidAnnotationException("Unsupported property annotation given: @$annotationType $annotation");
		}
		$isNullable = ($matches[1] !== '' or $matches[4] !== '');

		if ($containsCollection and $isNullable) {
			throw new InvalidAnnotationException("It doesn't make sense to have a property containing collection nullable: @$annotationType $annotation");
		}
		$name = substr($matches[5], 1);
		$column = (isset($matches[6]) and $matches[6] !== '') ? $matches[6] : $name;

		$propertyValuesEnum = null;
		if (isset($matches[7]) and $matches[7] !== '') {
			if (!$propertyType->isBasicType() or $propertyType->getType() === 'array') {
				throw new InvalidAnnotationException("Invalid property annotation given: values of {$propertyType->getType()} property cannot be enumerated");
			}
			$propertyValuesEnum = new PropertyValuesEnum($matches[7], $reflection);
		}

		$propertyFilters = null;
		if (isset($matches[10]) and $matches[10] !== '') {
			if ($propertyType->isBasicType()) {
				throw new InvalidAnnotationException("Invalid property annotation given: {$propertyType->getType()} property cannot be filtered");
			}
			$propertyFilters =  new PropertyFilters($matches[10], $aliases);
		}

		$relationship = null;
		if (isset($matches[8]) and $matches[8] !== '') {
			$relationship = self::createRelationship(
				$reflection->getName(),
				$propertyType,
				$containsCollection,
				$matches[8],
				(isset($matches[9]) and $matches[9] !== null) ? $matches[9] : null
			);
		}
		if ($relationship !== null) {
			if (isset($matches[6]) and $matches[6] !== '') {
				throw new InvalidAnnotationException("All special column and table names must be specified in relationship definition when property holds relationship: @$annotationType $annotation");
			}
			$column = null;
			if ($relationship instanceof Relationship\HasOne) {
				$column = $relationship->getColumnReferencingTargetTable();
			}
		}
		$extra = isset($matches[11]) ? $matches[11] : null;

		return new Property(
			$name,
			$column,
			$propertyType,
			$annotationType === 'property',
			$isNullable,
			$containsCollection,
			$relationship,
			$propertyFilters,
			$propertyValuesEnum,
			$extra
		);
	}

	////////////////////
	////////////////////

	/**
	 * @param string $sourceClass
	 * @param PropertyType $propertyType
	 * @param bool $containsCollection
	 * @param string $relationshipType
	 * @param string|null $definition
	 * @return mixed
	 * @throws InvalidAnnotationException
	 */
	private static function createRelationship($sourceClass, PropertyType $propertyType, $containsCollection, $relationshipType, $definition = null)
	{
		// logic validation
		if ($propertyType->isBasicType()) {
			throw new InvalidAnnotationException("Invalid property annotation given: {$propertyType->getType()} property cannot have relationship.");
		}
		if ($relationshipType === 'hasMany' or $relationshipType === 'belongsToMany') {
			if (!$containsCollection) {
				throw new InvalidAnnotationException("Invalid property annotation given: property with '$relationshipType' relationship type must contain collection.");
			}
		} else {
			if ($containsCollection) {
				throw new InvalidAnnotationException("Invalid property annotation given: property with '$relationshipType' relationship type must not contain collection.");
			}
		}
		if ($relationshipType !== 'hasOne') {
			$strategy = Result::STRATEGY_IN; // default strategy
			if ($definition !== null and substr($definition, -6) === '#union') {
				$strategy = Result::STRATEGY_UNION;
				$definition = substr($strategy, 0, strlen($definition) - 6);
			}
		}
		$pieces = array_replace(array_fill(0, 6, ''), $definition !== null ? explode(':', $definition) : array());

		$sourceTable = strtolower(self::trimNamespace($sourceClass));
		$targetTable = strtolower(self::trimNamespace($propertyType->getType()));

		switch ($relationshipType) {
			case 'hasOne':
				return new Relationship\HasOne($pieces[0] ? : $targetTable . '_id', $pieces[1] ? : $targetTable);
			case 'hasMany':
				return new Relationship\HasMany(
					$pieces[0] ?: $sourceTable . '_id',
					$pieces[1] ?: $sourceTable . '_' . $targetTable,
					$pieces[2] ?: $targetTable . '_id',
					$pieces[3] ?: $targetTable,
					$strategy
				);
			case 'belongsToOne':
				return new Relationship\BelongsToOne($pieces[0] ? : $sourceTable . '_id', $pieces[1] ? : $targetTable, $strategy);
			case 'belongsToMany':
				return new Relationship\BelongsToMany($pieces[0] ? : $sourceTable . '_id', $pieces[1] ? : $targetTable, $strategy);
		}
		return null;
	}

	/**
	 * @param string $class
	 * @return string
	 */
	private static function trimNamespace($class)
	{
		$class = explode('\\', $class);
		return end($class);
	}

}
