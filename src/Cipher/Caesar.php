<?php

namespace Cipher;

require_once __DIR__ . '/CiphersContract.php';

class Caesar implements CiphersContract
{
    const SHIFT = 3; //shift number for Caesar cipher

    /**
     * Encrypt the provided plaintext to Caesar cipher.
     */
    public function encrypt(string $input): string {
        return $this->shiftString($input, self::SHIFT);
    }

    /**
     * Decrypt the provided Caesar cipher back to plaintext.
     */
    public function decrypt(string $input): string {
        return $this->shiftString($input, -self::SHIFT);
    }

    /**
     * Shift the entire string by a given number
     */
    private function shiftString(string $input, int $shift): string {
        $output = '';

        for ($i = 0; $i < strlen($input); $i++) {
            $output .= $this->shiftChar($input[$i], $shift);
        }

        return $output;
    }

    /**
     * Shift a single character by a given number
     */
    private function shiftChar(string $char, int $shift): string {
        if (!ctype_alpha($char)) {
            return $char;
        }

        $asciiOffset = ctype_upper($char) ? ord('A') : ord('a');

        return chr((ord($char) - $asciiOffset + $shift + 26) % 26 + $asciiOffset);
    }
}