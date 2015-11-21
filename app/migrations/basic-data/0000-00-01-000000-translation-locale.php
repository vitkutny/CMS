<?php
/**
 * @var Nextras\Orm\Model\IModel $model
 */
$repository = $model->getRepository(Ytnuk\Translation\Locale\Repository::class);
$locale = new Ytnuk\Translation\Locale\Entity;
$locale->id = '🇨🇿';
$locale->name = '🇨🇿 Čeština';
$repository->persist($locale);
$locale = new Ytnuk\Translation\Locale\Entity;
$locale->id = '🇺🇸';
$locale->name = '🇺🇸 English';
$repository->persist($locale);
$repository->flush();
