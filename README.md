Adding GitHub repository
========================

Setup new remote called 'github' :

git remote add github https://github.com/Awakit/assetic_less_bundle.git

Push stuff :

git push github


Installation instruction
===================

### Composer
#composer.json
Add those lines to your composer.json

    "require": {
        ...
      "awakit/assetic_less_bundle": "~2.0"
    },

    "repositories": [
        ...
        { "type": "vcs", "url": "git@github.com:Awakit/assetic_less_bundle.git" }
    ],
    "config": {
        ...
        "secure-http": false
    },


### config
#config.yml
Change your config.yml to look like:

    assetic:
        filters:
            lessphp: ~
     
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