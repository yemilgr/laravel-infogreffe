<?php

namespace Yemilgr\Infogreffe\Tests;

use Orchestra\Testbench\TestCase as TestbenchTestCase;
use Yemilgr\Infogreffe\InfogreffeServiceProvider;

class TestCase extends TestbenchTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function getPackageProviders($app): array
    {
        return [
            InfogreffeServiceProvider::class
        ];
    }

    public function getEnviromentSetUp($app): void
    {
       // perform environment setup
    }
}
