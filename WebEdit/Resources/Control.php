<?php

namespace WebEdit\Resources;

use WebEdit;
use WebLoader\FileCollection,
    WebLoader\Compiler,
    WebLoader\Nette\CssLoader,
    WebLoader\Nette\JavaScriptLoader;
use \JavaScriptPacker;

final class Control extends WebEdit\Control {

    /**
     * @var array
     */
    private $styles;

    /**
     * @var array 
     */
    private $scripts;

    /**
     * @var string 
     */
    private $tempDirectory;

    public function __construct($styles, $scripts, $tempDirectory) {
        $this->styles = $styles;
        $this->scripts = $scripts;
        $this->tempDirectory = $tempDirectory;
    }

    public function renderStyles() {
        $files = new FileCollection();
        $files->addFiles($this->styles);
        $compiler = Compiler::createCssCompiler($files, $this->tempDirectory);
        $compiler->addFilter(function($css) {
            return str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', str_replace(': ', ':', preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css)));
        });
        $source = new CssLoader($compiler, $this->template->basePath . '/temp');
        return $source->render();
    }

    public function renderScripts() {
        $files = new FileCollection();
        $files->addFiles($this->scripts);
        $compiler = Compiler::createJsCompiler($files, $this->tempDirectory);
        $compiler->addFilter(function($js) {
            $packer = new JavaScriptPacker($js);
            return $packer->pack();
        });
        $source = new JavaScriptLoader($compiler, $this->template->basePath . '/temp');
        return $source->render();
    }

}
