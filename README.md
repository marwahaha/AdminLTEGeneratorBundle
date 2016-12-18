Installation instruction
===================
First, give credits to https://github.com/aleste/AdminLTEGeneratorBundle and https://github.com/julienhay/AdminLTEGeneratorBundle who started this bundle.

### Composer

Add those lines to your composer.json
```yaml
#composer.json
    "repositories": [
      {
        "url": "https://github.com/Donjohn/AdminLTEGeneratorBundle.git",
        "type": "git"
      }
    ],
```

then type:
```
composer require donjohn/adminlte-generator-bundle
```

### Kernel

Add thoses bundles to your AppKernel.php

```PHP
    new Symfony\Bundle\AsseticBundle\AsseticBundle(),
    new Knp\Bundle\MenuBundle\KnpMenuBundle(),
    new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
    new Avanzu\AdminThemeBundle\AvanzuAdminThemeBundle(),
    new Lexik\Bundle\FormFilterBundle\LexikFormFilterBundle(),
    new Donjohn\AdminLTEGeneratorBundle\DonjohnAdminLTEGeneratorBundle(),
```

### Routing

Add this route to your routing.yml

```yaml
#app/config/routing.yml
donjohn_admin:
    resource: "@DonjohnAdminLTEGeneratorBundle/Resources/config/routing.yml"
```

### AdminLTE Configuration

You need to initialize AdminLTE before using generator
Type

```
php bin/console assets:install web [--symlink|--relative]
php bin/console avanzu:admin:initialize [--symlink|--relative]
```

### Usage

Create a new doctrine entity
Then type

```
php bin/console donjohn:generate:crud --entity=Namespace:Entity
```

Command line options are the same as generate:doctrine:crud command from SensionGeneratorbundle, see the official documentation to learn more.

### Translation
The bundle is fully compatible with KNP Doctrine Behaviour and A2Lix Translation Form
Follow each bundle documentation to know how to use them before using this bundle

### Media
The bundle is fully compatible with Donjohn Media Bundle, install it before using this bundle.