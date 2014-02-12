<?php

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
    protected $menu;

    protected function startup() {
        parent::startup();
        $this->menu = $this->getComponent('menu');
        $this->menu->breadcrumb->fromLink(':' . $this->getName() . ':view');
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

    protected function createComponentResources() {
        return $this->resourcesFactory->create();
    }

    public function formatLayoutTemplateFiles() {
        $list = array();
        $reflection = $this->getReflection();
        do {
            $list[] = dirname($reflection->getFileName()) . '/@layout.latte';
            $reflection = $reflection->getParentClass();
        } while ($reflection);
        return $list;
    }

    public function formatTemplateFiles() {
        $list = array();
        $reflection = $this->getReflection();
        $list[] = dirname($reflection->getFileName()) . '/Presenter/' . $this->view . '.latte';
        return $list;
    }

}
