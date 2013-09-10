<?php

namespace CMS\Form;

use Nette\Object;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;

abstract class BaseFormFactory extends Object {

    /**
     * @var Presenter
     */
    protected $presenter;

    public function create($row = NULL) {
        if ($row) {
            return $this->editForm($row);
        } else {
            return $this->addForm();
        }
    }

    protected function baseForm() {
        $form = new Form();
        $form->setRenderer(new FormRenderer());
        $form->onValidate[] = $this->setPresenter;
        $form->onSuccess[] = $this->success;
        $form->onError[] = $this->error;
        $form->onSubmit[] = $this->submit;
        return $form;
    }

    protected function addForm() {
        $form = $this->baseForm();
        $form->onSuccess[] = $this->addFormSuccess;
        $form->onError[] = $this->addFormError;
        $form->onSubmit[] = $this->addFormSubmit;
        return $form;
    }

    protected function editForm($row) {
        $form = $this->baseForm();
        $that = $this;
        $form->onSuccess[] = function($form) use ($that, $row) {
            $that->editFormSuccess($form, $row);
        };
        $form->onError[] = function($form) use ($that, $row) {
            $that->editFormError($form, $row);
        };
        $form->onSubmit[] = function($form) use ($that, $row) {
            $that->editFormSubmit($form, $row);
        };
        return $form;
    }

    public function setPresenter(Form $form) {
        $this->presenter = $form->getPresenter(TRUE);
    }

    public function success(Form $form) {
        
    }

    public function error(Form $form) {
        
    }

    public function submit(Form $form) {
        
    }

    public function addFormSuccess(Form $form) {
        
    }

    public function editFormSuccess(Form $form, $row) {
        
    }

    public function addFormError(Form $form) {
        
    }

    public function editFormError(Form $form, $row) {
        
    }

    public function addFormSubmit(Form $form) {
        
    }

    public function editFormSubmit(Form $form, $row) {
        
    }

}
