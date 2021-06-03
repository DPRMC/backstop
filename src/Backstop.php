<?php

namespace DPRMC\Backstop;


use DPRMC\Backstop\BackstopTraits\InitClient;
use DPRMC\Backstop\BackstopTraits\PrivateEquityProducts;
use DPRMC\Backstop\BackstopTraits\Products;
use DPRMC\Backstop\BackstopTraits\HedgeFundProducts;

class Backstop {


    use InitClient,
        Products;
        //HedgeFundProducts,
        //PrivateEquityProducts;


    /**
     * @var string The response from the above login request is an API access authentication token valid for 24 hours. You will need to pass the authorization token for your subsequent API calls
     */
    protected $apiAccessAuthenticationToken;

    public function __construct( string $myCompanySubdomain, string $user, string $password, bool $debug = FALSE ) {
        $this->baseURI  = 'https://' . $myCompanySubdomain . '.backstopsolutions.com/backstop/api/';
        $this->user     = $user;
        $this->password = $password;
        $this->debug    = $debug;

        $this->initClient();
    }


}