<?php

namespace Cipher;

require_once __DIR__ . '/../../src/Cipher/Baconian.php';

use PHPUnit\Framework\TestCase;

class BaconianTest extends TestCase
{
    /**
     * @dataProvider encryptProvider
     */
    public function testEncrypt(string $input, string $expected) {
        $caesar = new Baconian();
        $this->assertEquals($expected, $caesar->encrypt($input));
    }

    /**
     * @dataProvider decryptProvider
     */
    public function testDecrypt(string $input, string $expected) {
        $caesar = new Baconian();
        $this->assertEquals($expected, $caesar->decrypt($input));
    }

    public static function encryptProvider(): array {
        return [
            ['a', 'aaaaa'],
            ['b', 'aaaab'],
            ['c', 'aaaba'],
            ['z', 'babbb'],
            ['abc', 'aaaaaaaaabaaaba'],
            ['xyz', 'bababbabbababbb'],
            ['', ''],
            ['Hello World', 'aabbbaabaaababaababaabbabbabaaabbabbaaaaababaaaabb'],
            ['ABC XYZ', 'aaaaaaaaabaaababababbabbababbb'],
            ['TEST', 'baabaaabaabaaabbaaba'],
            ['123', ''],
            ['.', ''],
            ['ij', 'abaaaabaaa'],
            ['uv', 'baabbbaabb']
        ];
    }

    public static function decryptProvider(): array {
        return [
            ['aaaaa', 'a'],
            ['aaaab', 'b'],
            ['aaaba', 'c'],
            ['babbb', 'z'],
            ['aaaaaaaaabaaaba', 'abc'],
            ['bababbabbababbb', 'xyz'],
            ['', ''],
            ['aabbbaabaaababaababaabbabbabaaabbabbaaaaababaaaabb', 'helloworld'],
            ['aaaaaaaaabaaababababbabbababbb', 'abcxyz'],
            ['baabaaabaabaaabbaaba', 'test'],
            ['aaaabbaaab', 'bs'],
            ['aaaa', ''],
            ['babbbbbbbb', 'z'],
            ['abaaaabaaa', 'jj'],
            ['baabbbaabb', 'vv']
        ];
    }
}