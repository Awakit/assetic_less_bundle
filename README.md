Installation instruction
===================

### Composer
#composer.json
Add those lines to your composer.json

    "require": {
        ...
      "awakit/assetic_less_bundle": "~1.0"
    },

    "repositories": [
        ...
        { "type": "composer", "url": "http://packages.awakit:8000/" }
    ],


### config
#config.yml
Change your config.yml to look like:

    assetic:
        filters:
            lessphp:
                file: %kernel.root_dir%/../vendor/oyejorge/less.php/lessc.inc.php
     
You can also add a sourcemap for less files, add these lines and configure if needed
    
    assetic:
        filters:
            lessphp:
                options:
                    sourceMap: true
                    sourceMapWriteTo: %kernel.root_dir%/../web/less.map
                    sourceMapURL: '/less.map'
                    sourceRoot: '/'
                    sourceMapBasepath: %kernel.root_dir%/../web
            

### Kernel

Add this bundle to your AppKernel.php

```
    new Awakit\AsseticLessBundle\AwakitAsseticLessBundle(),
```