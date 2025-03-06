<?php

namespace Cipher;

require_once __DIR__ . '/../../src/Cipher/Atbash.php';

use PHPUnit\Framework\TestCase;

class AtbashTest extends TestCase
{
    /**
     * @dataProvider encryptProvider
     */
    public function testEncrypt(string $input, string $expected) {
        $caesar = new Atbash();
        $this->assertEquals($expected, $caesar->encrypt($input));
    }

    /**
     * @dataProvider decryptProvider
     */
    public function testDecrypt(string $input, string $expected) {
        $caesar = new Atbash();
        $this->assertEquals($expected, $caesar->decrypt($input));
    }

    public static function encryptProvider(): array {
        return [
            ['hello', 'svool'],
            ['Hello, World!', 'Svool, Dliow!'],
            ['ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'ZYXWVUTSRQPONMLKJIHGFEDCBA'],
            ['abcdefghijklmnopqrstuvwxyz', 'zyxwvutsrqponmlkjihgfedcba'],
            ['12345', '12345'],
            ['Test123!', 'Gvhg123!'],
            ['', ''],
            ['A', 'Z'],
            ['z', 'a'],
        ];
    }

    public static function decryptProvider(): array {
        return [
            ['svool', 'hello'],
            ['Svool, Dliow!', 'Hello, World!'],
            ['ZYXWVUTSRQPONMLKJIHGFEDCBA', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'],
            ['zyxwvutsrqponmlkjihgfedcba', 'abcdefghijklmnopqrstuvwxyz'],
            ['12345', '12345'],
            ['Gvhg123!', 'Test123!'],
            ['', ''],
            ['Z', 'A'],
            ['a', 'z'],
        ];
    }
}