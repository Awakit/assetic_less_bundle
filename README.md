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