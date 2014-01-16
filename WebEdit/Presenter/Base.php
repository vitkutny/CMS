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

namespace WebEdit\Presenter;

use Nette\Application\UI\Presenter;

abstract class Base extends Presenter {

    /**
     * @inject
     * @var \WebEdit\Menu\Control
     */
    public $menu;

    /**
     * @inject
     * @var \WebEdit\Resources\Control
     */
    public $resources;

    /**
     * @inject
     * @var \Kdyby\Translation\Translator
     */
    public $translator;

    /**
     * @persistent
     */
    public $locale;

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->baseLayout = dirname(__DIR__) . '/templates/@layout.latte';
        $this->template->frontLayout = dirname(__DIR__) . '/Front/templates/@layout.latte';
        $this->template->adminLayout = dirname(__DIR__) . '/Admin/templates/@layout.latte';
    }

    protected function createTemplate($class = NULL) {
        $template = parent::createTemplate($class);
        $template->registerHelperLoader(callback($this->translator->createTemplateHelpers(), 'loader'));
        return $template;
    }

    protected function createComponentResources() {
        return $this->resources;
    }

    protected function createComponentMenu() {
        return $this->menu;
    }

}
