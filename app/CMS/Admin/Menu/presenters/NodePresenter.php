<?php

namespace CMS\Admin\Menu;

final class NodePresenter extends BasePresenter {

    private $node;

    /**
     * @inject
     * @var \CMS\Model\NodeFacade
     */
    public $nodeFacade;

    /**
     * @inject
     * @var \CMS\Admin\Menu\Form\NodeFormFactory
     */
    public $nodeFormFactory;

    public function actionEdit($id) {
        $this->node = $this->nodeFacade->repository->getNode($id);
        if (!$this->node) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit list: ' . $this->node->tree->title, ':Admin:Menu:Tree:edit', $this->node->tree_id);
        $this->menu->breadcrumbAdd('Edit node: ' . $this->node->title);
    }

    protected function createComponentNodeFormEdit() {
        return $this->nodeFormFactory->create($this->node);
    }

}
