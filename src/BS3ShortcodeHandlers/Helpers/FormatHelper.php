<?php

namespace BS3ShortcodeHandlers\Helpers;

class FormatHelper
{
    /**
     * Escaping for HTML attributes.
     *
     * @param $text
     * @return string
     */
    public function esc_attr($text)
    {
        $safeText = $this->check_invalid_utf8($text);
        return $this->specialchars($safeText, ENT_QUOTES);
    }

    /**
     * Checks for invalid UTF8 in a string.
     *
     * @param $string
     * @param bool $strip
     * @param string $charset
     * @return string
     */
    public function check_invalid_utf8($string, $strip = false, $charset = 'utf8')
    {
        $string = (string)$string;
        if (0 === strlen($string)) {
            return '';
        }

        $is_utf8 = in_array($charset, array('utf8', 'utf-8', 'UTF8', 'UTF-8'));

        if (!$is_utf8) {
            return $string;
        }
        // Check for support for utf8 in the installed PCRE library once and store the result in a static
        $utf8_pcre = null;
        if (!isset($utf8_pcre)) {
            $utf8_pcre = @preg_match('/^./u', 'a');
        }
        // We can't demand utf8 in the PCRE installation, so just return the string in those cases
        if (!$utf8_pcre) {
            return $string;
        }
        // preg_match fails when it encounters invalid UTF8 in $string
        if (1 === @preg_match('/^./us', $string)) {
            return $string;
        }
        // Attempt to strip the bad chars if requested (not recommended)
        if ($strip && function_exists('iconv')) {
            return iconv('utf-8', 'utf-8', $string);
        }
        return '';
    }

    /**
     * Converts a number of special characters into their HTML entities.
     *
     * Specifically deals with: &, <, >, ", and '.
     *
     * $quote_style can be set to ENT_COMPAT to encode " to
     * &quot;, or ENT_QUOTES to do both. Default is ENT_NOQUOTES where no quotes are encoded.
     *
     * @param string $string The text which is to be encoded.
     * @param int|string $quote_style Optional. Converts double quotes if set to ENT_COMPAT,
     *                                   both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES.
     *                                   Also compatible with old values; converting single quotes if set to 'single',
     *                                   double if set to 'double' or both if otherwise set.
     *                                   Default is ENT_NOQUOTES.
     * @param string $charset Optional. The character encoding of the string. Default is false.
     * @param bool $double_encode Optional. Whether to encode existing html entities. Default is false.
     * @return string The encoded text with HTML entities.
     */
    function specialchars($string, $quote_style = ENT_NOQUOTES, $charset = 'utf8', $double_encode = false)
    {
        $string = (string)$string;
        if (0 === strlen($string)) {
            return '';
        }
        // Don't bother if there are no specialchars - saves some processing
        if (!preg_match('/[&<>"\']/', $string)) {
            return $string;
        }
        // Account for the previous behaviour of the function when the $quote_style is not an accepted value
        if (empty($quote_style)) {
            $quote_style = ENT_NOQUOTES;
        } elseif (!in_array($quote_style, array(0, 2, 3, 'single', 'double'), true)) {
            $quote_style = ENT_QUOTES;
        }
        if (in_array($charset, array('utf8', 'utf-8', 'UTF8'))) {
            $charset = 'UTF-8';
        }
        $_quote_style = $quote_style;
        if ($quote_style === 'double') {
            $quote_style = ENT_COMPAT;
            $_quote_style = ENT_COMPAT;
        } elseif ($quote_style === 'single') {
            $quote_style = ENT_NOQUOTES;
        }
        $string = @htmlspecialchars($string, $quote_style, $charset, $double_encode);
        // Back-compat.
        if ('single' === $_quote_style) {
            $string = str_replace("'", '&#039;', $string);
        }
        return $string;
    }

    /**
     * Escaping for HTML blocks.
     *
     * @param $text
     * @return string
     */
    public function esc_html($text)
    {
        $safeText = $this->check_invalid_utf8($text);
        return $this->specialchars($safeText, ENT_QUOTES);
    }
}
