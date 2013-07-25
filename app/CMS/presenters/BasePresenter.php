<?php

/**
 * TODO:
 * Shared components:
 * User, Photo, Comments
 * FormRenderer
 */

namespace CMS;

use WebLoader;
use Nette\Application\UI\Presenter;
use CMS\Menu\Component\MenuFactory;
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

    protected function startup() {
        parent::startup();
        $this->baseBacklink = $this->storeRequest();
    }

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->backlink = $this->baseBacklink;
        $this->template->home = $this->menu->getHome();
        $this->template->frontLayout = dirname(__DIR__) . "/Front/templates/@layout.latte";
        $this->template->adminLayout = dirname(__DIR__) . "/Admin/templates/@layout.latte";
    }

    /**
     * 
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
     * 
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

    public function injectMenuControl(MenuFactory $menu) {
        $this->menu = $menu->create();
    }

    /**
     * 
     * @return \CMS\Menu\Component\MenuFactory
     */
    protected function createComponentMenu() {
        return $this->menu;
    }

}
