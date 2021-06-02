<?php
namespace DPRMC\Backstop\BackstopTraits;

trait HedgeFundProducts {

    use Client;

    private $uri = 'hedge-fund-products';

    public function hedge_fund_products() {
        $response = $this->guzzle->request( 'GET', 'hedge-fund-products', [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        var_dump( (string)$response->getBody() );

        return (string)$response->getBody();
    }
}