<?php

namespace CMS\Model\Entity;

/**
 * @property int $id
 * @property Node $node m:hasOne
 * @property Node[] $nodes m:belongsToMany
 * @property string $type
 * @property string $title
 */
class Tree extends \LeanMapper\Entity {
    
}