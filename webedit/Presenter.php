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

    protected function startup() {
        parent::startup();
        $this['menu']['breadcrumb'][] = array('link' => ':' . $this->getName() . ':view');
    }

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->baseLayout = __DIR__ . '/@layout.latte';
    }

    protected function createComponentResources() {
        return $this->resourcesFactory->create();
    }

    public function formatTemplateFiles() {
        $list = array();
        $reflection = $this->getReflection();
        $list[] = dirname($reflection->getFileName()) . '/Presenter/' . $this->view . '.latte';
        return $list;
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

    protected function createTemplate($class = NULL) {
        $template = parent::createTemplate($class);
        $template->registerHelperLoader(callback($this->translator->createTemplateHelpers(), 'loader'));
        return $template;
    }

}
