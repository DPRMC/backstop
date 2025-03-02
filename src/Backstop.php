<?php

namespace DPRMC\Backstop;


use DPRMC\Backstop\BackstopTraits\API\HedgeFundAccountRedemptions;
use DPRMC\Backstop\BackstopTraits\API\InitClient;
use DPRMC\Backstop\BackstopTraits\API\InterestLevels;
use DPRMC\Backstop\BackstopTraits\API\People;
use DPRMC\Backstop\BackstopTraits\API\PrivateEquityProducts;
use DPRMC\Backstop\BackstopTraits\API\Products;
use DPRMC\Backstop\BackstopTraits\API\HedgeFundProducts;
use DPRMC\Backstop\BackstopTraits\API\Reports;

class Backstop {


    use InitClient,
        Products,
        HedgeFundProducts,
        PrivateEquityProducts,
        InterestLevels,
        People,
        Reports,
        HedgeFundAccountRedemptions;


    /**
     * @var string The response from the above login request is an API access authentication token valid for 24 hours. You will need to pass the authorization token for your subsequent API calls
     */
    protected $apiAccessAuthenticationToken;

    public function __construct( string $myCompanySubdomain, string $user, string $password, bool $debug = FALSE, float $timeout = 300 ) {
        $this->baseURI  = 'https://' . $myCompanySubdomain . '.backstopsolutions.com/backstop/';
        $this->user     = $user;
        $this->password = $password;
        $this->debug    = $debug;

        $this->initClient($timeout);
    }


}