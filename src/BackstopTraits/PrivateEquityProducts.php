<?php
namespace DPRMC\Backstop\BackstopTraits;

trait PrivateEquityProducts {

    use Client;

    private $uri = 'private-equity-products';

    public function hedge_fund_products() {
        $response = $this->guzzle->request( 'GET', $this->uri, [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        var_dump( (string)$response->getBody() );

        return (string)$response->getBody();
    }
}