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

    public function create($row = NULL) {
        $this->form = $this->baseForm($row);
        if ($row) {
            $this->editForm($row);
        } else {
            $this->addForm();
        }
        return $this->form;
    }

    private function baseForm($row = NULL) {
        $form = new Form();
        $form->setRenderer(new BaseFormRenderer());
        $form->onValidate[] = $this->setPresenter;
        $that = $this;
        $form->onSuccess[] = function($form) use ($that, $row) {
            $that->success($form, $row);
        };
        return $form;
    }

    public function setPresenter(Form $form) {
        $this->presenter = $form->getPresenter(TRUE);
    }

    public function success(Form $form, $row = NULL) {
        if ($row) {
            if ($form->isSubmitted()->getHtmlName() == 'delete') {
                $this->delete($row);
            } else {
                $this->edit($row, $form->getValues(TRUE));
            }
        } else {
            $this->add($form->getValues(TRUE));
        }
    }

}
