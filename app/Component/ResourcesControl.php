<?php

namespace CMS\Component;

use CMS\Component\BaseControl;
use WebLoader;
use \JavaScriptPacker;

final class ResourcesControl extends BaseControl {

    private $styles;
    private $scripts;
    private $tempDirectory;

    public function __construct($styles, $scripts, $tempDirectory) {
        $this->styles = $styles;
        $this->scripts = $scripts;
        $this->tempDirectory = $tempDirectory;
    }

    public function renderStyles() {
        $files = new WebLoader\FileCollection();
        $files->addFiles($this->styles);
        $compiler = WebLoader\Compiler::createCssCompiler($files, $this->tempDirectory);
        $compiler->addFilter(function($css) {
            return str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', str_replace(': ', ':', preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css)));
        });
        $source = new WebLoader\Nette\CssLoader($compiler, $this->template->basePath . '/temp');
        return $source->render();
    }

    public function renderScripts() {
        $files = new WebLoader\FileCollection();
        $files->addFiles($this->scripts);
        $compiler = WebLoader\Compiler::createJsCompiler($files, $this->tempDirectory);
        $compiler->addFilter(function($js) {
            $packer = new JavaScriptPacker($js);
            return $packer->pack();
        });
        $source = new WebLoader\Nette\JavaScriptLoader($compiler, $this->template->basePath . '/temp');
        return $source->render();
    }

}
