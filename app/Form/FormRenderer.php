<?php

namespace CMS\Form;

use Nette\Forms\Rendering\DefaultFormRenderer;
use Nette\Forms\Form;
use Nette\Forms\IControl;
use Nette\Utils\Html;

class BaseFormRenderer extends DefaultFormRenderer {
    /**
      public function __construct() {
      $this->wrappers['form']['container'] = NULL;
      $this->wrappers['form']['class'] = 'form-class';
      $this->wrappers['controls']['container'] = NULL;
      $this->wrappers['pair']['container'] = 'div class="form-group"';
      $this->wrappers['label']['container'] = NULL;
      $this->wrappers['label']['class'] = '';
      $this->wrappers['label']['suffix'] = ':';
      $this->wrappers['control']['container'] = NULL;
      $this->wrappers['control']['errorcontainer'] = 'small class="error"';
      }

      public function render(Form $form) {
      $form->getElementPrototype()->addClass($this->getValue('form class'));
      return parent::render($form);
      }

      public function renderLabel(IControl $control) {
      if ($control instanceof Nette\Forms\Controls\Checkbox) {
      return $this->getWrapper('label container');
      }

      $suffix = $this->getValue('label suffix') . ($control->isRequired() ? $this->getValue('label requiredsuffix') : '');
      $label = $control->getLabel();
      if ($label instanceof Html) {
      $label->add($suffix);
      $class = $this->getValue('label class');
      $label->addAttributes(array('class' => $class));
      if ($control->isRequired()) {
      $label->addAttributes(array('class' => $class . ' ' . $this->getValue('control .required')));
      }
      } elseif ($label != NULL) {
      $label .= $suffix;
      }
      return $this->getWrapper('label container')->setHtml($label);
      }
     */
}