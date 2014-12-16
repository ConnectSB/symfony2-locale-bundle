<?php

namespace ConnectSB\LocaleBundle\Twig;

class LocaleExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('locale_to_country', array($this, 'localeToCountryFilter')),
        );
    }

    public function localeToCountryFilter($locale, $language = null)
    {
        $country = \Locale::getDisplayLanguage($locale);

        if (!$country) {
            return $locale;
        }

        if (!$language) {
            return $country;
        }

        return \Locale::getDisplayLanguage($locale, $language);
    }

    public function getName()
    {
        return 'locale_extension';
    }
}
