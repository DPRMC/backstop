<?php
namespace DPRMC\Backstop\BackstopTraits;

trait Products {

    use Client;

    private $uri = 'products';

    public function products() {
        $response = $this->guzzle->request( 'GET', $this->uri, [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        var_dump( (string)$response->getBody() );

        return (string)$response->getBody();
    }
}