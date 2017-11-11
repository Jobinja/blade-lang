<?php

if (!function_exists('multilang_convert_number')) {

    function multilang_convert_number($number, $locale = null)
    {
        return \JobinjaTeam\BladeLang\NumberPresenter::present($number, $locale);
    }
}

if (!function_exists('multilang_format_number')) {

    function multilang_format_number($number, $decimals = 0, $decSep = null, $tSep = null, $locale = null)
    {
        return \JobinjaTeam\BladeLang\NumberPresenter::format($number, $decimals, $decSep, $tSep, $locale);
    }

}