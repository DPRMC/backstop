<?php

namespace DPRMC\Backstop\Tests;

use PHPUnit\Framework\TestCase;

use DPRMC\Backstop\Backstop;

class BackstopTest extends TestCase {

    protected static $client;

    protected static $debug = true;


    public static function setUpBeforeClass(): void {

        self::$client = new \DPRMC\Backstop\Backstop( $_ENV[ 'MYCOMPANY_SUBDOMAIN' ],
                                                      $_ENV[ 'BACKSTOP_USER' ],
                                                      $_ENV[ 'BACKSTOP_PASS' ],
                                                      self::$debug );
    }


    public function tearDown(): void {

    }


    /**
     * Of course in the set up code a client is already created, but that constructor
     * code isn't shown as being covered in the coverage report.
     * @test
     */
    public function constructorShouldCreateClient() {
        $client = new \DPRMC\Backstop\Backstop( $_ENV[ 'MYCOMPANY_SUBDOMAIN' ],
                                                $_ENV[ 'BACKSTOP_USER' ],
                                                $_ENV[ 'BACKSTOP_PASS' ],
                                                self::$debug );
        $this->assertInstanceOf( Backstop::class, $client );
    }


    /**
     * @test
     */
    public function productsShouldReturn() {
        $products = self::$client->products();
    }


    /**
     * @test
     */
    public function hedgeFundProductsShouldReturn() {
        $products = self::$client->hedge_fund_products();
    }
}