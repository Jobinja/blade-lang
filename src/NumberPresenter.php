<?php

namespace JobinjaTeam\BladeLang;

class NumberPresenter
{
    protected static $decPoints = [
        'fa' => '/'
    ];

    protected static $thousandSeps = [
        'fa' => ','
    ];

    public static function present($number, $locale = null)
    {
        $locale = $locale ?: \App::getLocale();

        switch ($locale) {
            case 'fa':
                return static::toFarsi($number);

            default:
                return $number;
        }
    }

    public static function toFarsi($number)
    {
        $farsiChars = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $latinChars = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($latinChars, $farsiChars, $number);
    }

    public static function format($number , $decimals = 0 , $decPoint = null, $thousandsSep = null, $locale = null)
    {
        $locale = $locale ?: \App::getLocale();

        if ($decPoint === null) {
            $decPoint = array_key_exists($locale, static::$decPoints) ? static::$decPoints[$locale] : '.';
        }

        if ($thousandsSep === null) {
            $thousandsSep = array_key_exists($locale, static::$thousandSeps) ? static::$thousandSeps[$locale] : ',';
        }

        return number_format(
            static::present($number, $locale),
            $decimals,
            $decPoint,
            $thousandsSep
        );
    }
}