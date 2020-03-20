<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Filter;

/**
 * Class for normalize text before the stemming process
 */
class TextNormalizer
{
    /**
     * Removes symbols & characters other than alphabetics
     *
     * @param  string $text
     * @return string normalized text
     */
    public static function normalizeText($text)
    {
		
        $text = preg_replace('|([\w\d]*)\s?(https?://([\d\w\.-]+\.[\w\.]{2,6})[^\s\]\[\<\>]*/?)|i','', $text);
		$text = preg_replace('|((https?://)?([\d\w\.-]+\.[\w\.]{2,6})[^\s\]\[\<\>]*/?)|i','', $text);
		$text = preg_replace('/[0-9]/',"", $text);
        //$text = preg_replace('/( +)/im', ' ', $text);
		$text = preg_replace('/[!-,]/',"", $text);
		$text = preg_replace('/[.-@]/',"", $text);
		//$text = preg_replace('/[!-@]/','', $text);
		$text = preg_replace('/[[-`]/',"", $text);
		$text = preg_replace('/(^| ).( |$)/', '$1', $text); 
		
		$words = explode(' ', $text);

        foreach ($words as $i => $word) {
            if ($words[$i]=='') {
                unset($words[$i]);
            }
        }

        return trim(implode(' ', $words));
  }
}
?>