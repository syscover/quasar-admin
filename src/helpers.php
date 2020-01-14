<?php

if (!function_exists('base_lang'))
{
    /**
     * Get iso 639-2 base lang from config file.
     *
     * @return string
     */
    function base_lang()
    {
        return config('quasar-admin.base_lang');
    }
}

if (!function_exists('base_lang_uuid'))
{
    /**
     * Get base lang uuid from config file.
     *
     * @return string
     */
    function base_lang_uuid()
    {
        $baseLang = config('quasar-admin.base_lang');
        $langs    = config('quasar-admin.langs');

        return $langs[$baseLang] ?? null;
    }
}
