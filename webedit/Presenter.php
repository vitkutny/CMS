<?php

/**
 * TODO:
 * Default front layout 
 *
 * Menu
 *  - moving with ALL nodes inside front tree
 * Tags
 *  - node x tags
 *  tag/view
 *      tag -> related nodes with node->tree->title
 * 
 * ACL
 * 
 * Gallery
 *  -photo
 *  -video
 * {control gallery $product->gallery} //all photos + videos
 * {control photo:xs $product->gallery->photo}
 * {control video:youtube aSdXzWs3gkI}
 * 
 * Social
 *  -comments
 *  -reviews
 *  -rating
 * {control social:comments $product->social}
 * {control social:reviews $product->social} //positive + negative + include social:rating
 * {control social:rating $product->social} //just 5 star bar
 * 
 * User
 * modules will (Create column if not exist) instead of extending user table by another table
 */

namespace WebEdit;

use Nette\Application\UI;

abstract class Presenter extends UI\Presenter {

    /**
     * @inject
     * @var \WebEdit\Resources\Control\Factory
     */
    public $resourcesFactory;

    /**
     * @inject
     * @var \Kdyby\Translation\Translator
     */
    public $translator;

    /**
     * @persistent
     */
    public $locale;

    /**
     * @inject
     * @var \WebEdit\Menu\Control\Factory
     */
    public $menuFactory;
    protected $menu;

    protected function startup() {
        parent::startup();
        $this->menu = $this->getComponent('menu');
        $this->menu->breadcrumb->fromLink(':' . $this->getName() . ':' . $this->getView());
    }

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->baseLayout = __DIR__ . '/@layout.latte';
    }

    protected function createTemplate($class = NULL) {
        $template = parent::createTemplate($class);
        $template->registerHelperLoader(callback($this->translator->createTemplateHelpers(), 'loader'));
        return $template;
    }

    protected function createComponentMenu() {
        return $this->menuFactory->create();
    }

    protected function createComponentResources() {
        return $this->resourcesFactory->create();
    }

    public function formatLayoutTemplateFiles() {
        $list = array();
        $reflection = $this->getReflection();
        while ($reflection->getName() != "Nette\Application\UI\Presenter") {
            $list[] = dirname($reflection->getFileName()) . '/@layout.latte';
            $reflection = $reflection->getParentClass();
        }
        return $list;
    }

    public function formatTemplateFiles() {
        $list = array();
        $reflection = $this->getReflection();
        $list[] = dirname($reflection->getFileName()) . '/Presenter/' . $this->view . '.latte';
        return $list;
    }

}
