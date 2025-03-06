<?php

namespace Cipher;

require_once __DIR__ . '/../../src/Cipher/Caesar.php';

use PHPUnit\Framework\TestCase;

class CaesarTest extends TestCase
{
    /**
     * @dataProvider encryptProvider
     */
    public function testEncrypt(string $input, string $expected) {
        $caesar = new Caesar();
        $this->assertEquals($expected, $caesar->encrypt($input));
    }

    /**
     * @dataProvider decryptProvider
     */
    public function testDecrypt(string $input, string $expected) {
        $caesar = new Caesar();
        $this->assertEquals($expected, $caesar->decrypt($input));
    }

    public static function encryptProvider(): array {
        return [
            ["Hello", "Khoor"],
            ["world", "zruog"],
            ["HELLO", "KHOOR"],
            ["WORLD", "ZRUOG"],
            ["Caesar Cipher", "Fdhvdu Flskhu"],
            ["abcXYZ", "defABC"],
            ["XYZabc", "ABCdef"],
            [" ", " "],
            ["  ", "  "],
            ["!@#$", "!@#$"],
            ["12345", "12345"],
            ["Hello World!", "Khoor Zruog!"],
            ["", ""],
            ["a", "d"],
            ["z", "c"],
            ["Z", "C"],
        ];
    }

    public static function decryptProvider(): array{
        return [
            ["Khoor", "Hello"],
            ["zruog", "world"],
            ["KHOOR", "HELLO"],
            ["ZRUOG", "WORLD"],
            ["Fdhvdu Flskhu", "Caesar Cipher"],
            ["defABC", "abcXYZ"],
            ["ABCdef", "XYZabc"],
            [" ", " "],
            ["  ", "  "],
            ["!@#$", "!@#$"],
            ["12345", "12345"],
            ["Khoor Zruog!", "Hello World!"],
            ["", ""],
            ["d", "a"],
            ["c", "z"],
            ["C", "Z"]
        ];
    }
}