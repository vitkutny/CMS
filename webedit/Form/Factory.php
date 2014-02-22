<?php

namespace WebEdit\Form;

use Nette\Object,
    Nette\Application\UI\Form,
    Nette\Application\UI\Presenter;
use Kdyby\Translation\Translator;
use WebEdit\Form\Renderer,
    WebEdit\Model;

abstract class Factory extends Object {

    /**
     * @var Presenter
     */
    protected $presenter;

    /**
     * @var Form
     */
    protected $form;

    /**
     * @inject
     * @var \Kdyby\Translation\Translator
     */
    public $translator;

    /**
     * @var Renderer
     */
    protected $renderer;

    public function create($row = NULL, $delete = NULL) {
        $this->renderer = new Renderer();
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
        $self = $this;
        $form->onSuccess[] = function($form) use ($self, $row) {
            try {
                $self->success($form, $row);
            } catch (Model\Exception $ex) {
                $self->presenter->flashMessage($ex->getMessage(), 'warning');
                $self->presenter->redirect('this');
            }
        };
        return $form;
    }

    protected function addForm() {
        $this->form->addSubmit('add', 'form.button.add')->setAttribute('class', 'btn btn-primary');
    }

    protected function editForm($row) {
        $this->form->addSubmit('edit', 'form.button.save')->setAttribute('class', 'btn btn-warning');
    }

    protected function deleteForm($row) {
        $this->form->addSubmit('delete', 'form.button.delete')->setAttribute('class', 'btn btn-danger');
    }

    public function setPresenter(Form $form) {
        $this->presenter = $form->getPresenter(TRUE);
    }

    public function success(Form $form, $row = NULL) {
        $data = $form->getValues(TRUE);
        if ($row) {
            if ($form->isSubmitted()->getHtmlName() === 'delete') {
                $this->delete($row);
            } else {
                $this->edit($row, $data);
            }
        } else {
            $this->add($data);
        }
    }

}
