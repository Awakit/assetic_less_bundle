Adding GitHub repository
========================

Setup new remote called 'github' :

git remote add github https://awakit:!awakit2k15!@github.com/Awakit/assetic_less_bundle.git

Push stuff :

git push github


Installation instruction
===================

### Composer

Add those lines to your composer.json

```yaml
#composer.json
    "require": {
        ...
      "awakit/assetic_less_bundle": "~1.0"
    },

    "repositories": [
        ...
        { "type": "composer", "url": "http://packages.awakit:8000/" }
    ],
```

### config

Change your config.yml to look like:

```yaml
assetic:
    filters:
        lessphp: ~
```



### Kernel

Add this bundle to your AppKernel.php

```PHP
    new Awakit\AsseticLessBundle\AwakitAsseticLessBundle(),
```