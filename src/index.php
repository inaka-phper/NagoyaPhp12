<?php
/**
 * Created by PhpStorm.
 * User: okuda
 * Date: 2018/03/31
 * Time: 16:31
 */

use InakaPhper\NagoyaPhp\NagoyaPhp;

require __DIR__.'/../vendor/autoload.php';

echo (new NagoyaPhp($argv[1]))->getPrice() . "\n";
