<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class extends the core Encrypt class, and allows you
 * to use encrypted strings in your URLs.
 */
class My_encrypt extends CI_Encrypt {
    function btc_encode($text) {

        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $key = "TYEHDJHDHDYJDIDIUJDOIDUJ";
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv));

    }
    function btc_decode($text) {

        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $key = "TYEHDJHDHDYJDIDIUJDOIDUJ";
        //I used trim to remove trailing spaces
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($text), MCRYPT_MODE_ECB, $iv));

    }
    /**
 * Encodes a string.
 *
 * @param string $string The string to encrypt.
 * @param string $key[optional] The key to encrypt with.
 * @param bool $url_safe[optional] Specifies whether or not the
 *                returned string should be url-safe.
 * @return string
 */
    function encode($string, $key="", $url_safe=TRUE) {
        $ret = parent::encode($string, $key);
        // $ret =$this->btc_encode($string);
        if ($url_safe) {
            $ret = strtr(
                $ret,
                array(
                '+' => '.',
                '=' => '-',
                '/' => '~'
                )
            );
        }

        return $ret;
    }

    /**
     * Decodes the given string.
     *
     * @access public
     * @param string $string The encrypted string to decrypt.
     * @param string $key[optional] The key to use for decryption.
     * @return string
     */
    function decode($string, $key="") {
        $string = strtr(
            $string,
            array(
            '.' => '+',
            '-' => '=',
            '~' => '/'
            )
        );

        return parent::decode($string, $key);
        // return $this->btc_decode($string);
    }
}