<?php

namespace ConnectSB\LocaleBundle\Service;

class LocaleService
{
    public function getCountryOfLocale($locale, $language = null)
    {
        if (!$language) {
            return \Locale::getDisplayLanguage($locale);
        }

        return \Locale::getDisplayLanguage($locale, $language);
    }
}
