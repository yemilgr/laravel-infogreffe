<?php

namespace Yemilgr\Infogreffe\Facades;

use Illuminate\Support\Facades\Facade;

class Infogreffe extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'infogreffe';
    }
}