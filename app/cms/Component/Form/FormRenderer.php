<?php

namespace CMS\Component\Form;

use Nette\Forms\Rendering\DefaultFormRenderer;

final class FormRenderer extends DefaultFormRenderer {

    public function __construct() {
        $this->wrappers['controls']['container'] = 'table class="responsive"';
    }

}