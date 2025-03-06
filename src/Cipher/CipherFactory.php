<?php

namespace Cipher;

require_once __DIR__ . '/CiphersContract.php';
require_once __DIR__ . '/Atbash.php';
require_once __DIR__ . '/Baconian.php';
require_once __DIR__ . '/Caesar.php';

class CipherFactory
{
    public static function create(string $cipher): CiphersContract {
        switch ($cipher) {
            case 'atbash':
                return new Atbash();
            case 'baconian':
                return new Baconian();
            case 'caesar':
                return new Caesar();
            default:
                throw new \InvalidArgumentException('Unknown cipher');
        }
    }
}