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
     * @TODO
     */
    public function hedgeFundProductsShouldReturn() {
        $products = self::$client->hedge_fund_products();
        $this->assertIsArray($products);
        $firstProduct = reset($products);
        $this->assertInstanceOf(Product::class, $firstProduct);
    }



    /**
     * @TODO
     */
    public function interestLevelsShouldReturn() {
        $interest_levels = self::$client->interest_levels();
        $this->assertIsArray($interest_levels);
//        $firstProduct = reset($interest_levels);
//        $this->assertInstanceOf(Product::class, $firstProduct);
    }


    /**
     * @TODO
     */
    public function peopleShouldReturn() {
        $filter = [
            'lastName' => [
                'eq' => 'Mueller'
            ]
        ];



        $filter = [
            'id' => [
                'eq' => 303455683
            ]
        ];

//        $people = self::$client->people(0, 10, $filter);

        $people = self::$client->people(null, null, $filter);

//        $people = self::$client->people(0, 10);
        $this->assertIsArray($people);
//        $firstProduct = reset($interest_levels);
//        $this->assertInstanceOf(Product::class, $firstProduct);
    }


    /**
     * @test
     */
    public function queryServiceShouldReturn() {

        $reportDefinition = '{"4":{"majorGroup":"Investor","minorGroup":"General","title":"Investor","availabilityKey":"show_cfieldOpportunityBean.investor.PartyBean.name","parameters":{},"isVisible":1,"elType":"text","displayOrder":0,"definition":"Organization name or full name of the person.","popular":1,"conf":0,"totalStrategy":1,"totalableType":0,"returnType":1,"path":"Investor > General > Investor","entityType":"OpportunityBean","benchmarkable":0},"19":{"majorGroup":"Investor","minorGroup":"General","title":"Representative","availabilityKey":"show_cfieldOpportunityBean.investor.PartyBean.representative_user_id","parameters":{},"isVisible":1,"elType":"select","displayOrder":1,"definition":"The employee responsible for this contact","popular":0,"conf":0,"totalStrategy":1,"totalableType":5,"returnType":1,"path":"Investor > General > Representative","entityType":"OpportunityBean","benchmarkable":0},"12":{"majorGroup":"Opportunity","minorGroup":"General","title":"Probability","availabilityKey":"show_cfieldOpportunityBean.odds","parameters":{},"isVisible":1,"elType":"number","displayOrder":2,"validatorMethodName":"isPercent isPercentZeroToHundred","definition":"","popular":0,"conf":0,"totalStrategy":1,"totalableType":1,"returnType":3,"path":"Opportunity > General > Probability","entityType":"OpportunityBean","benchmarkable":0},"30":{"majorGroup":"Opportunity","minorGroup":"Shared Standard Fields","title":"Amount","availabilityKey":"show_cfieldOpportunityBean.amount","parameters":{},"isVisible":1,"elType":"number","displayOrder":3,"validatorMethodName":"isCurrency","definition":"","popular":0,"conf":0,"totalStrategy":2,"totalableType":1,"returnType":4,"path":"Opportunity > Shared Standard Fields > Amount","entityType":"OpportunityBean","benchmarkable":0},"23":{"majorGroup":"Opportunity","minorGroup":"General","title":"Expected Investment Date","availabilityKey":"show_cfieldOpportunityBean.closed","parameters":{},"isVisible":1,"elType":"date","displayOrder":4,"validatorMethodName":"isShortDate","definition":"","popular":0,"conf":0,"totalStrategy":1,"totalableType":5,"returnType":1,"path":"Opportunity > General > Expected Investment Date","entityType":"OpportunityBean","benchmarkable":0},"21":{"majorGroup":"Investor","minorGroup":"Interest Level > Interest Level > Prospect Details","title":"Level of Interest","availabilityKey":"show_cfieldOpportunityBean.investor.442635","parameters":{"displayFormat":"displayValue"},"isVisible":0,"elType":"select","displayOrder":5,"definition":"Client-Defined Field","popular":0,"conf":1,"totalStrategy":1,"totalableType":5,"returnType":1,"path":"Investor > Interest Level > Interest Level > Prospect Details > Level of Interest","entityType":"OpportunityBean","benchmarkable":0},"14":{"majorGroup":"Investor","minorGroup":"General","title":"Categories","availabilityKey":"show_cfieldOpportunityBean.investor.PartyBean.categoriesAsString","parameters":{},"isVisible":0,"elType":"selectcollection","displayOrder":6,"definition":"All categories for this contact, separated by commas.","popular":0,"conf":0,"totalStrategy":1,"totalableType":5,"returnType":1,"path":"Investor > General > Categories","entityType":"OpportunityBean","benchmarkable":0},"22":{"majorGroup":"Opportunity","minorGroup":"General","title":"Description","availabilityKey":"show_cfieldOpportunityBean.description","parameters":{},"isVisible":1,"elType":"textarea","displayOrder":7,"validatorMethodName":"isLessThan4000Long","definition":"","popular":0,"conf":0,"totalStrategy":1,"totalableType":5,"returnType":1,"path":"Opportunity > General > Description","entityType":"OpportunityBean","benchmarkable":0},"29":{"majorGroup":"Opportunity","minorGroup":"Shared Standard Fields","title":"Stage","availabilityKey":"show_cfieldOpportunityBean.stage","parameters":{},"isVisible":1,"elType":"select","displayOrder":8,"definition":"","popular":0,"conf":0,"totalStrategy":1,"totalableType":5,"returnType":1,"path":"Opportunity > Shared Standard Fields > Stage","entityType":"OpportunityBean","benchmarkable":0}}';
        $restrictionExpression = '${(report.field12 > 0) && (in(report.field29, "[\"Prospecting\"]"))}';

        $interest_levels = self::$client->query_service();
//        $this->assertIsArray($interest_levels);
//        $firstProduct = reset($interest_levels);
//        $this->assertInstanceOf(Product::class, $firstProduct);
    }



    /**
     * @test
     */
//    public function hedgeFundProductsShouldReturn() {
//        $products = self::$client->hedge_fund_products();
//    }
}