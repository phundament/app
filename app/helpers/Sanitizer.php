<?php
/**
 * Feb 2014
 * @author Pascal Brewing
 * @email <pascalbrewing@gmail.com>
 * @package app\helpers
 * Class Sanitizer
 */

namespace app\helpers;


class Sanitizer
{
    /**
     * Returns a url-sanitized string
     * @static
     * @param string $string
     * @return string
     */
    public static function getSanitizedValue($string)
    {
        $staticReplace = self::getSpecialCharMapping();

        $string = (string)$string;

        $string = str_replace(array_keys($staticReplace), array_values($staticReplace), $string);
        $string = strtolower($string);
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('#[^a-z0-9-_]#i', '', $string);

        if (ctype_digit(substr($string, 0, 1))) {
            $string .= '_' . $string;
        }

        $string = preg_replace('#\-+#i', '-', $string);
        return $string;
    }

    /**
     * @param $string
     * @return mixed|string
     */
    public static function getUnsanitizedValue($string){
        $string = (string) $string;
        $string = str_replace('-',' ', $string);
        $string = str_replace('_',' ', $string);
        $string = preg_replace('#[^a-z0-9-_]#i', ' ', $string);
        $string = preg_replace('#\-+#i', ' ', $string);
        return $string;
    }

    /**
     * @static
     * @return array
     */
    public static function getSpecialCharMapping()
    {
        return array(

            // upper- lower- case
            'Á' => 'A', 'á' => 'a',
            'À' => 'A', 'à' => 'a',
            'Â' => 'A', 'â' => 'a',
            'Ä' => 'AE', 'ä' => 'ae',
            'Å' => 'A', 'å' => 'a',
            'Ã' => 'A', 'ã' => 'a',
            'Ā' => 'A', 'ā' => 'a',
            'Ą' => 'A', 'ą' => 'a',
            'Ă' => 'A', 'ă' => 'a',

            'Æ' => 'AE', 'æ' => 'ae',

            'Ć' => 'C', 'ć' => 'c',
            'Ĉ' => 'C', 'ĉ' => 'c',
            'Č' => 'C', 'č' => 'c',
            'Ç' => 'C', 'ç' => 'c',

            'Đ' => 'D', 'đ' => 'd',
            'Ď' => 'D', 'ď' => 'd',

            'É' => 'E', 'é' => 'e',
            'È' => 'E', 'è' => 'e',
            'Ê' => 'E', 'ê' => 'e',
            'Ě' => 'E', 'ě' => 'e',
            'Ë' => 'E', 'ë' => 'e',
            'Ē' => 'E', 'ē' => 'e',
            'Ę' => 'E', 'ę' => 'e',

            'Ĝ' => 'G', 'ĝ' => 'g',
            'Ğ' => 'G', 'ğ' => 'g',
            'Ģ' => 'G', 'ģ' => 'g',

            'Ĥ' => 'H', 'ĥ' => 'h',

            'Í' => 'I', 'í' => 'i',
            'Ì' => 'I', 'ì' => 'i',
            'Î' => 'I', 'î' => 'i',
            'Ï' => 'I', 'ï' => 'i',
            'Ī' => 'I', 'ī' => 'i',
            'İ' => 'I', 'ı' => 'i',

            'Ĵ' => 'J', 'ĵ' => 'j',

            'Ķ' => 'K', 'ķ' => 'k',

            'Ļ' => 'L', 'ļ' => 'l',
            'Ł' => 'L', 'ł' => 'l',
            'Ĺ' => 'L', 'ĺ' => 'l',
            'Ľ' => 'L', 'ľ' => 'l',

            'Ń' => 'N', 'ń' => 'n',
            'Ň' => 'N', 'ň' => 'n',
            'Ņ' => 'N', 'ņ' => 'n',
            'Ñ' => 'N', 'ñ' => 'n',

            'Ó' => 'O', 'ó' => 'o',
            'Ò' => 'O', 'ò' => 'o',
            'Ô' => 'O', 'ô' => 'o',
            'Ö' => 'OE', 'ö' => 'oe',
            'Ő' => 'OE', 'ő' => 'oe',
            'Õ' => 'OE', 'õ' => 'oe',
            'Ø' => 'O', 'ø' => 'o',

            'Œ' => 'OE', 'œ' => 'oe',

            'Ř' => 'R', 'ř' => 'r',
            'Ŗ' => 'R', 'ŗ' => 'r',
            'Ŕ' => 'R', 'ŕ' => 'r',

            'Ś' => 'S', 'ś' => 's',
            'Ŝ' => 'S', 'ŝ' => 's',
            'Š' => 'S', 'š' => 's',
            'Ş' => 'S', 'ş' => 's',

            'Ť' => 'T', 'ť' => 't',
            'Ţ' => 'T', 'ţ' => 't',

            'Ú' => 'U', 'ú' => 'u',
            'Ù' => 'U', 'ù' => 'u',
            'Û' => 'U', 'û' => 'u',
            'Ŭ' => 'U', 'ŭ' => 'u',
            'Ü' => 'UE', 'ü' => 'ue',
            'Ű' => 'UE', 'ű' => 'ue',
            'Ů' => 'UE', 'ů' => 'ue',
            'Ū' => 'UE', 'ū' => 'ue',

            'Ý' => 'Y', 'ý' => 'y',
            'Ÿ' => 'Y', 'ÿ' => 'y',

            'Ź' => 'Z', 'ź' => 'z',
            'Ž' => 'Z', 'ž' => 'z',
            'Ż' => 'Z', 'ż' => 'z',

            'Þ' => 'Th', 'þ' => 'th',

            'ª' => 'a',
            'º' => 'o',
            'ß' => 'ss',

        );
    }
} 