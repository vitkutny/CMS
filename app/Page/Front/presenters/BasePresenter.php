<?php

namespace CMS\Page;

use CMS\Front\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var \CMS\Page\Model\PageRepository
     */
    public $pageRepository;

}