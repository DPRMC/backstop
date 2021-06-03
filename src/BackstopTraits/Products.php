<?php

namespace DPRMC\Backstop\BackstopTraits;

use DPRMC\Backstop\ResponseObjects\Product;

trait Products {

    use Client;

    public $included; // No idea what goes in here. Just getting an empty array.

    public $meta;

    /**
     * @var int The number of Products returned.
     */
    public $totalResourceCount;

    public function products() {
        $response = $this->guzzle->request( 'GET', 'products', [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        $jsonArray = json_decode( (string)$response->getBody(), TRUE );

        $this->included           = $jsonArray[ 'included' ];
        $this->meta               = $jsonArray[ 'meta' ];
        $this->totalResourceCount = $jsonArray[ 'meta' ][ 'totalResourceCount' ];
        $data = $jsonArray[ 'data' ];
        $products = [];

        foreach($data as $row):
            $products[] = new Product($row);
        endforeach;

        return $products;
    }
}