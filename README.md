# Symfony Locale Bundle
With this bundle you can get the country names of locales.

## 1) Installation
First you have to add the folowing lines to your `composer.json` file:
```javascript
{
    "require": {
        "connectsb/localebundle": "dev-master"
    }
}
```
You also have to add the LocaleBundle to your AppKernel.php:
```php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            ...
            new ConnectSB\TranslationBundle\ConnectSBLocaleBundle()
        );
    }
}
```
## 2) Usage
In the controller you can get the country of the language with the following method:
```php      
    $this->get('connect_sb_locale_service')->getCountryOfLocale('en');
```

In Twig you can use the `locale_to_country` filter. 
