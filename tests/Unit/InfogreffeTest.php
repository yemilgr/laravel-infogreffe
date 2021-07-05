<?php


namespace Yemilgr\Infogreffe\Tests\Unit;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Yemilgr\Infogreffe\Entity\Address;
use Yemilgr\Infogreffe\Entity\Enterprise;
use Yemilgr\Infogreffe\Infogreffe;
use Yemilgr\Infogreffe\Tests\TestCase;

class InfogreffeTest extends TestCase
{

    /** @test */
    public function throws_error_if_token_is_missing()
    {
        $this->expectException(InvalidArgumentException::class);
        app('infogreffe');
    }

    /** @test */
    public function returns_instance_if_token_is_set()
    {
        // set token config
        Config::set('services.infogreffe.token', Str::random(64));

        $this->assertInstanceOf(Infogreffe::class, app('infogreffe'));
    }
    
    /** @test */
    public function return_valid_enterprice_fiche()
    {
        Config::set('services.infogreffe.token', 'AXfBH56aWQcdCKRHkUAd9UcT1zsydYfQajOGeDfjmE3ztMBNbwWxxfu0xWi2');

        /** @var Infogreffe $infogreffe */
        $infogreffe = app('infogreffe');
        $enterpriseFiche = $infogreffe->getEnterpriceFiche('123456789');

        $this->assertInstanceOf(Enterprise::class, $enterpriseFiche);
        $this->assertInstanceOf(Address::class, $enterpriseFiche->Adresse);
        $this->assertEquals('123456789', $enterpriseFiche->Siren);
    }
}