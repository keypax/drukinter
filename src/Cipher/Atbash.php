<?php

namespace Cipher;

require_once __DIR__ . '/CiphersContract.php';

class Atbash implements CiphersContract
{
    private function transform(string $input): string {
        return preg_replace_callback('/[a-z]/i', function ($matches) {
            $char = $matches[0];
            //check if uppercase
            if (ctype_upper($char)) {
                //uppercase transformation
                return chr(ord('Z') - (ord($char) - ord('A')));
            } else {
                //lowercase transformation
                return chr(ord('z') - (ord($char) - ord('a')));
            }
        }, $input);
    }

    /**
     * Encrypt the provided plaintext to Atbash cipher.
     */
    public function encrypt(string $input): string{
        return $this->transform($input);
    }

    /**
     * Decrypt the provided Atbash cipher back to plaintext.
     */
    public function decrypt(string $input): string{
        return $this->transform($input);
    }
}