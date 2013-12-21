<?php

namespace CMS\Gallery\Component\Gallery;

use CMS\Component\BaseControl;
use CMS\Gallery\Model\PhotoFacade;
use CMS\Gallery\Model\VideoFacade;

final class GalleryControl extends BaseControl {

    private $photoFacade;
    private $videoFacade;

    public function __construct(PhotoFacade $photoFacade, VideoFacade $videoFacade) {
        $this->photoFacade = $photoFacade;
        $this->videoFacade = $videoFacade;
    }

    public function render($gallery) {
        $template = $this->template;
        $template->setFile(__DIR__ . '/templates/gallery.latte');
        $template->render();
    }

    public function renderPhoto($gallery) {
        $template = $this->template;
        $template->setFile(__DIR__ . '/templates/photo.latte');
        $template->render();
    }

    public function renderVideo($gallery) {
        $template = $this->template;
        $template->setFile(__DIR__ . '/templates/video.latte');
        $template->render();
    }

}
