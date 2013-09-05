<?php

namespace CMS\Admin\Menu\Form;

use Nette\Forms\Container;
use Nette\Database\Table\ActiveRow;
use CMS\Component\Menu\MenuControl;

class NodeFormContainer extends Container {

    /**
     * @param MenuControl $menu
     * @param ActiveRow|string $tree
     * @param ActiveRow|NULL $node
     */
    public function __construct($menu, $tree, $node = NULL) {
        $this->addText('title', 'Title')->setRequired();
        $parent = $menu->getParentNodeSelectData($tree, $node);
        if ($parent) {
            $this->addSelect('node_id', 'Parent node', $parent)->setRequired();
        }
        if ($node) {
            $this->setDefaults($node);
        }
    }

}
