<?php

namespace DPRMC\Backstop\Tests;

use Carbon\Carbon;
use DPRMC\Backstop\ResponseObjects\PrivateEquityProduct;
use DPRMC\Backstop\ResponseObjects\Product;
use DPRMC\Backstop\ResponseObjects\Report;
use PHPUnit\Framework\TestCase;

use DPRMC\Backstop\Backstop;

class BackstopTest extends TestCase {

    protected static $client;

    protected static $debug = TRUE;


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
        $this->assertIsArray( $products );
        $firstProduct = reset( $products );
        $this->assertInstanceOf( Product::class, $firstProduct );
    }


    /**
     * @TODO
     */
    public function privateEquityProducts() {
        $privateEquityProducts = self::$client->private_equity_products();
        $this->assertIsArray( $privateEquityProducts );
        $firstProduct = reset( $privateEquityProducts );
        $this->assertInstanceOf( PrivateEquityProduct::class, $firstProduct );
    }


    /**
     * @TODO
     */
    public function hedgeFundProductsShouldReturn() {
        $products = self::$client->hedge_fund_products();
        $this->assertIsArray( $products );
        $firstProduct = reset( $products );
        $this->assertInstanceOf( Product::class, $firstProduct );
    }


    /**
     * @TODO
     */
    public function interestLevelsShouldReturn() {
        $interest_levels = self::$client->interest_levels();
        $this->assertIsArray( $interest_levels );
//        $firstProduct = reset($interest_levels);
//        $this->assertInstanceOf(Product::class, $firstProduct);
    }


    /**
     * @TODO
     */
    public function peopleShouldReturn() {
        $filter = [
            'lastName' => [
                'eq' => 'Mueller',
            ],
        ];


        $filter = [
            'id' => [
                'eq' => 303455683,
            ],
        ];

//        $people = self::$client->people(0, 10, $filter);

        $people = self::$client->people( NULL, NULL, $filter );

//        $people = self::$client->people(0, 10);
        $this->assertIsArray( $people );
//        $firstProduct = reset($interest_levels);
//        $this->assertInstanceOf(Product::class, $firstProduct);
    }


    /**
     * @test
     */
    public function reportsShouldReturn() {
        $asOfDate              = Carbon::now();
        $reportDefinition      = null;
        $restrictionExpression = null;
        $reportName            = 'Opportunities';

        $report = self::$client->reports( $asOfDate, 'eq', $reportDefinition, $restrictionExpression, $reportName );

        $this->assertInstanceOf(Report::class, $report);
    }



    /**
     * @test
     */
//    public function hedgeFundProductsShouldReturn() {
//        $products = self::$client->hedge_fund_products();
//    }
}