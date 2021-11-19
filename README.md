OkaConstraintBundle
===================

This bundle provides custom constraints validator.

[![Latest Stable Version](https://poser.pugx.org/coka/constraint-bundle/v/stable)](https://packagist.org/packages/coka/constraint-bundle)
[![Total Downloads](https://poser.pugx.org/coka/constraint-bundle/downloads)](https://packagist.org/packages/coka/constraint-bundle)
[![Latest Unstable Version](https://poser.pugx.org/coka/constraint-bundle/v/unstable)](https://packagist.org/packages/coka/constraint-bundle)
[![License](https://poser.pugx.org/coka/constraint-bundle/license)](https://packagist.org/packages/coka/constraint-bundle)
[![Monthly Downloads](https://poser.pugx.org/coka/constraint-bundle/d/monthly)](https://packagist.org/packages/coka/constraint-bundle)
[![Daily Downloads](https://poser.pugx.org/coka/constraint-bundle/d/daily)](https://packagist.org/packages/coka/constraint-bundle)
[![Travis CI](https://travis-ci.org/CedrickOka/constraint-bundle.svg?branch=master)](https://travis-ci.org/CedrickOka/constraint-bundle)

Installation
============

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
$ composer require coka/constraint-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require coka/constraint-bundle
```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Oka\ConstraintBundle\OkaConstraintBundle::class => ['all' => true],
];
```
