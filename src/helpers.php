<?php

if (!function_exists('baseLang'))
{
    /**
     * Get iso 639-2 base lang from config file.
     *
     * @return string
     */
    function baseLang()
    {
        return config('quasar-admin.base_lang');
    }
}

if (!function_exists('baseLangUuid'))
{
    /**
     * Get base lang uuid from config file.
     *
     * @return string
     */
    function baseLangUuid()
    {
        $baseLang = config('quasar-admin.base_lang');
        $langs    = config('quasar-admin.langs');

        return $langs[$baseLang] ?? null;
    }
}


if (! function_exists('hasScout'))
{
    /**
     * function to know if scout is configured
     *
     * @return  boolean
     */
    function hasScout()
    {
        return  config('scout.driver') === 'algolia' || config('scout.driver') === 'quasar-search';
    }
}

if (! function_exists('accessToken'))
{
    /**
     * function to know if scout is configured
     *
     * @return  boolean
     */
    function accessToken()
    {
        $token = (array) \Quasar\OAuth\Services\JWTService::decode(request()->bearerToken());

        // get access token from database
        $accessToken = \Quasar\OAuth\Models\AccessToken::where('uuid', $token['jit'])
            ->where('is_revoked', false)
            ->first();

        return $accessToken;
    }
}

