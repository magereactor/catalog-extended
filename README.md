# MageReactor CatalogExtended (Split Configurables With Color) For Magento 2

Magento 2 module that Split Configurables with color attribute.



## Features

Under Stores -> Configuration -> MageReactor -> Catalog Extended -> General

+ Enabled -> Yes/No
+ Group By -> This is the product's attribute code (default value is "color")
+ Store configuration is used to enable to module storewise
+ To make it working on a desired category, set the category attribute named "Split Configurable" under Catalog -> Categories -> Display Settigs -> Split Configurable to Yes

## Limitations

Currently only simple products of configruables' prodcuts can be assigned to a category. These products will be grouped according to the attribute defined in the aftorementioned store configuration. 

### Compatiblity
Currently this module is compatible with Magento 2.4.x

## Install

### Composer

```bash
composer require magereactor/catalog-extended
```

### Enable Module

The package comes with the MageReactor_Base module. This Base module contains necessary configurations for all MageReactor's extensions

```php
php bin/magento module:enable MageReactor_Base
php bin/magento module:enable MageReactor_CatalogExtended
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f | php bin/magento setup:static-content:deploy
```

You may need to Flush Magento Cache after installation.
