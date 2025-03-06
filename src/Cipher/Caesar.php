<?php

namespace Cipher;

require_once __DIR__ . '/CiphersContract.php';

class Caesar implements CiphersContract
{
    const SHIFT = 3; // shift number for Caesar cipher

    /**
     * Encrypt input string using Caesar cipher
     */
    public function encrypt(string $input): string {
        $output = '';

        //loop through each character
        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];

            if (ctype_alpha($char)) {
                //check if uppercase
                $isUpper = ctype_upper($char);

                //convert character to ASCII code
                $asciiOffset = $isUpper ? ord('A') : ord('a');

                //shift character by constant SHIFT
                $char = chr((ord($char) - $asciiOffset + self::SHIFT) % 26 + $asciiOffset);
            }

            //add processed/non-processed char to output string
            $output .= $char;
        }

        return $output;
    }

    /**
     * Decrypt input string using Caesar cipher
     */
    public function decrypt(string $input): string {
        $output = '';

        //loop through each character
        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];

            if (ctype_alpha($char)) {
                //check if uppercase
                $isUpper = ctype_upper($char);

                //convert character to ASCII code
                $asciiOffset = $isUpper ? ord('A') : ord('a');

                //reverse shift character by constant SHIFT
                $char = chr((ord($char) - $asciiOffset - self::SHIFT + 26) % 26 + $asciiOffset);
            }

            //add processed/non-processed char to output string
            $output .= $char;
        }

        return $output;
    }
}