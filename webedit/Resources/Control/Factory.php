<?php

namespace WebEdit\Resources\Control;

use WebEdit\Resources\Control;

interface Factory {

    /**
     * @return Control
     */
    public function create();
}
