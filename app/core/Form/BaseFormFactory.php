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
            return $this->createEdit($row);
        } else {
            return $this->createAdd();
        }
    }

    protected function createBase() {
        $form = new Form();
        $form->setRenderer(new FormRenderer());
        $form->onValidate[] = $this->validate;
        $form->onSuccess[] = $this->success;
        $form->onError[] = $this->error;
        $form->onSubmit[] = $this->submit;
        return $form;
    }

    protected function createAdd() {
        $form = $this->createBase();
        $form->onSuccess[] = $this->successAdd;
        $form->onError[] = $this->errorAdd;
        $form->onSubmit[] = $this->submitAdd;
        return $form;
    }

    protected function createEdit($row) {
        $form = $this->createBase();
        $that = $this;
        $form->onSuccess[] = function($form) use ($that, $row) {
            $that->successEdit($form, $row);
        };
        $form->onError[] = function($form) use ($that, $row) {
            $that->errorEdit($form, $row);
        };
        $form->onSubmit[] = function($form) use ($that, $row) {
            $that->submitEdit($form, $row);
        };
        return $form;
    }

    public function validate(Form $form) {
        $this->presenter = $form->getPresenter(TRUE);
    }

    public function success(Form $form) {
        
    }

    public function error(Form $form) {
        
    }

    public function submit(Form $form) {
        
    }

    public function successAdd(Form $form) {
        
    }

    public function successEdit(Form $form, $row) {
        
    }

    public function errorAdd(Form $form) {
        
    }

    public function errorEdit(Form $form, $row) {
        
    }

    public function submitAdd(Form $form) {
        
    }

    public function submitEdit(Form $form, $row) {
        
    }

}
