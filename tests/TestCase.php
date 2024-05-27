<?php

namespace Ensi\LaravelOctaneStarter\Tests;

use Ensi\LaravelOctaneStarter\OctaneStarterServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            OctaneStarterServiceProvider::class,
        ];
    }
}
