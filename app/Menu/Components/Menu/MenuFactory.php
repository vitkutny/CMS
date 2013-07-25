<?php

namespace CMS\Menu\Component;

interface MenuFactory {

    /** @return MenuControl */
    function create();
}