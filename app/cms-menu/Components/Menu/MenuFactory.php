<?php

namespace CMS\Menu\Component\Menu;

interface MenuFactory {

    /** @return MenuControl */
    function create();
}