<?php

namespace Cipher;

require_once __DIR__ . '/CiphersContract.php';

class Baconian implements CiphersContract
{
    /**
     * Alphabet letters mapped to Baconian cipher codes.
     * I/J and U/V share the same Baconian cipher codes.
     */
    private array $baconianMap = [
        'A' => 'aaaaa', 'B' => 'aaaab', 'C' => 'aaaba', 'D' => 'aaabb',
        'E' => 'aabaa', 'F' => 'aabab', 'G' => 'aabba', 'H' => 'aabbb',
        'I' => 'abaaa', 'J' => 'abaaa', 'K' => 'abaab', 'L' => 'ababa',
        'M' => 'ababb', 'N' => 'abbaa', 'O' => 'abbab', 'P' => 'abbba',
        'Q' => 'abbbb', 'R' => 'baaaa', 'S' => 'baaab', 'T' => 'baaba',
        'U' => 'baabb', 'V' => 'baabb', 'W' => 'babaa', 'X' => 'babab',
        'Y' => 'babba', 'Z' => 'babbb'
    ];

    /**
     * Encrypt the provided plaintext to Baconian cipher.
     */
    public function encrypt(string $input): string {
        $input = strtoupper($input);
        $cipher = '';

        //iterate through each character in the input
        for ($i = 0, $len = strlen($input); $i < $len; $i++) {
            $char = $input[$i];
            //append cipher equivalent if character is alphabetic
            if (isset($this->baconianMap[$char])) {
                $cipher .= $this->baconianMap[$char];
            }
        }

        return $cipher;
    }

    /**
     * Decrypt the provided Baconian cipher back to plaintext.
     */
    public function decrypt(string $input): string {
        $plaintext = '';
        $mapFlip = array_flip($this->baconianMap);
        $input = strtolower($input);
        //split cipher text to chunks of 5 characters
        $chunks = str_split($input, 5);

        foreach ($chunks as $chunk) {
            if (isset($mapFlip[$chunk])) {
                $plaintext .= $mapFlip[$chunk];
            }
        }

        return strtolower($plaintext);
    }
}