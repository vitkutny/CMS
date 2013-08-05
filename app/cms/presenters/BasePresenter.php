<?php

/**
 * TODO:
 * Shared components:
 * User, Photo, Comments
 * ACL
 */

namespace CMS;

use WebLoader;
use Nette\Application\UI\Presenter;
use CMS\Menu\Component\MenuControl;
use \JavaScriptPacker as JsPacker;

abstract class BasePresenter extends Presenter {

    /**
     * @var string
     */
    protected $baseBacklink;

    /**
     * @var MenuControl
     */
    protected $menu;

    /**
     * @inject
     * @var CMS\Menu\Component\MenuFactory
     */
    public $menuFactory;

    protected function startup() {
        parent::startup();
        $this->baseBacklink = $this->storeRequest();
        $this->menu = $this->menuFactory->create();
    }

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->backlink = $this->baseBacklink;
        $this->template->baseLayout = dirname(__DIR__) . '/templates/@layout.latte';
        $this->template->frontLayout = dirname(__DIR__) . '/Front/templates/@layout.latte';
        $this->template->adminLayout = dirname(__DIR__) . '/Admin/templates/@layout.latte';
    }

    /**
     * @return \WebLoader\Nette\CssLoader
     */
    protected function createComponentCss() {
        $dir = $this->context->parameters['wwwDir'] . '/temp';
        $files = new WebLoader\FileCollection();
        $files->addFiles($this->context->parameters['css']);
        $compiler = WebLoader\Compiler::createCssCompiler($files, $dir);
        $compiler->addFilter(function($css) {
                    return str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', str_replace(': ', ':', preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css)));
                });
        return new WebLoader\Nette\CssLoader($compiler, $this->template->basePath . '/temp');
    }

    /**
     * @return \WebLoader\Nette\JavaScriptLoader
     */
    protected function createComponentJs() {
        $dir = $this->context->parameters['wwwDir'] . '/temp';
        $files = new WebLoader\FileCollection();
        $files->addFiles($this->context->parameters['javascript']);
        $compiler = WebLoader\Compiler::createJsCompiler($files, $dir);
        $compiler->addFilter(function($js) {
                    $packer = new JsPacker($js);
                    return $packer->pack();
                });
        return new WebLoader\Nette\JavaScriptLoader($compiler, $this->template->basePath . '/temp');
    }

    /**
     * @return MenuControl
     */
    protected function createComponentMenu() {
        return $this->menu;
    }

}
