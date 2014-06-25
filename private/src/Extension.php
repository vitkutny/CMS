<?php

namespace WebEdit;

use WebEdit\Application;

final class Extension extends Application\Extension {

    private $defaults = [
        'mapping' => ['*' => 'WebEdit\*\*']
    ];

    public function loadConfiguration() {
        $builder = $this->getContainerBuilder();
        $config = $this->getConfig($this->defaults);
        $builder->getDefinition('nette.presenterFactory')
                ->addSetup('setMapping', [$config['mapping']]);
    }

}
