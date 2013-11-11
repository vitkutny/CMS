<?php

namespace CMS\Form;

use Nette\Object;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use CMS\Form\BaseFormRenderer;

abstract class FormFactory extends Object {

    /**
     * @var Presenter
     */
    protected $presenter;
    protected $form;

    /**
     * @inject
     * @var \Kdyby\Translation\Translator
     */
    public $translator;
    protected $renderer;

    public function create($row = NULL, $delete = NULL) {
        $this->renderer = new BaseFormRenderer();
        $this->form = $this->baseForm($row);
        if ($row) {
            if ($delete) {
                $this->deleteForm($row);
            } else {
                $this->editForm($row);
            }
        } else {
            $this->addForm();
        }
        return $this->form;
    }

    private function baseForm($row = NULL) {
        $form = new Form();
        $form->setRenderer($this->renderer);
        $form->setTranslator($this->translator);
        $form->onValidate[] = $this->setPresenter;
        $that = $this;
        $form->onSuccess[] = function($form) use ($that, $row) {
            $that->success($form, $row);
        };
        return $form;
    }

    protected function addForm() {
        $this->form->addSubmit('add', $this->translator->translate('form.add'))->setAttribute('class', 'btn btn-primary');
    }

    protected function editForm($row) {
        $this->form->addSubmit('edit', $this->translator->translate('form.save'))->setAttribute('class', 'btn btn-warning');
    }

    protected function deleteForm($row) {
        $this->form->addSubmit('delete', $this->translator->translate('form.delete'))->setAttribute('class', 'btn btn-danger');
    }

    public function setPresenter(Form $form) {
        $this->presenter = $form->getPresenter(TRUE);
    }

    public function success(Form $form, $row = NULL) {
        if ($row) {
            if ($form->isSubmitted()->getHtmlName() === 'delete') {
                $this->delete($row);
            } else {
                $this->edit($row, $form->getValues(TRUE));
            }
        } else {
            $this->add($form->getValues(TRUE));
        }
    }

}
