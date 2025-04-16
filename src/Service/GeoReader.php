<?php

namespace App\Service;

use GeoIp2\Database\Reader;

class GeoReader
{
    private Reader $reader;

    public function __construct(string $path)
    {
        $this->reader = new Reader(realpath(__DIR__.'/../..'.$path));
    }

    public function readCurrentCity()
    {
        $ip = $_SERVER['REMOTE_ADDR'];

        return $this->reader->city($ip);
    }
}