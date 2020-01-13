<?php

if (! function_exists('base_lang'))
{
    /**
     * Get base lang object from config file.
     *
     * @return string
     */
    function base_lang()
    {
        return config('quasar-admin.base_lang');
    }
}
