<?php

namespace DPRMC\Backstop\Tests;

use DPRMC\Backstop\BackstopTraits\PrivateEquityProducts;
use DPRMC\Backstop\ResponseObjects\PrivateEquityProduct;
use DPRMC\Backstop\ResponseObjects\Product;
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
     *
     */
    public function productsShouldReturn() {
        $products = self::$client->products();
        $this->assertIsArray($products);
        $firstProduct = reset($products);
        $this->assertInstanceOf(Product::class, $firstProduct);
    }


    /**
     * @TODO
     */
    public function privateEquityProducts() {
        $privateEquityProducts = self::$client->private_equity_products();
        $this->assertIsArray($privateEquityProducts);
        $firstProduct = reset($privateEquityProducts);
        $this->assertInstanceOf(PrivateEquityProduct::class, $firstProduct);
    }


    /**
     * @test
     */
    public function hedgeFundProductsShouldReturn() {
        $products = self::$client->hedge_fund_products();
        $this->assertIsArray($products);
        $firstProduct = reset($products);
        $this->assertInstanceOf(Product::class, $firstProduct);
    }


    /**
     * @test
     */
//    public function hedgeFundProductsShouldReturn() {
//        $products = self::$client->hedge_fund_products();
//    }
}