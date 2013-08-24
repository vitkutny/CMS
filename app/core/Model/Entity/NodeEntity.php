<?php

namespace CMS\Model\Entity;

/**
 * @property int $id
 * @property Node|NULL $node m:hasOne
 * @property Node[] $nodes m:belongsToMany
 * @property Tree $tree m:hasOne
 * @property string $link
 * @property int|NULL $link_id
 * @property string $title
 * @property int|NULL $position
 */
class Node extends \LeanMapper\Entity {
    
}