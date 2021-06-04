<?php
namespace DPRMC\Backstop\BackstopTraits\API;

use DPRMC\Backstop\ResponseObjects\PrivateEquityProduct;

trait PrivateEquityProducts {

    use Client;

    public function private_equity_products() {
        $response = $this->guzzle->request( 'GET', 'api/private-equity-products', [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        $jsonArray = json_decode( (string)$response->getBody(), TRUE );
        print_r($jsonArray);
        die();

//        $this->included           = $jsonArray[ 'included' ];
//        $this->meta               = $jsonArray[ 'meta' ];
//        $this->totalResourceCount = $jsonArray[ 'meta' ][ 'totalResourceCount' ];
//        $data = $jsonArray[ 'data' ];
        $products = [];

//        foreach($data as $row):
//            $products[] = new PrivateEquityProduct($row);
//        endforeach;

        return $products;
    }
}