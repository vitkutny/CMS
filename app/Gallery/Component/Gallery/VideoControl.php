<?php

namespace CMS\Gallery\Component\Gallery;

use CMS\Component\BaseControl;

final class VideoControl extends BaseControl {

    public function render($video) {
        $template = $this->template;
        $template->setFile(__DIR__ . '/templates/gallery.latte');
        $template->render();
    }

}
