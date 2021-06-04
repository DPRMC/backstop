<?php

namespace DPRMC\Backstop\BackstopTraits\API;

use DPRMC\Backstop\ResponseObjects\HedgeFundProduct;

trait HedgeFundProducts {

    use Client;

    public function hedge_fund_products() {
        $response = $this->guzzle->request( 'GET', 'api/hedge-fund-products', [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        $jsonArray = json_decode( (string)$response->getBody(), TRUE );

        $this->included           = $jsonArray[ 'included' ];
        $this->meta               = $jsonArray[ 'meta' ];
        $this->totalResourceCount = $jsonArray[ 'meta' ][ 'totalResourceCount' ];
        $data                     = $jsonArray[ 'data' ];
        $hedgeFundProducts        = [];

        foreach ( $data as $row ):
            $hedgeFundProducts[] = new HedgeFundProduct( $row );
        endforeach;

        return $hedgeFundProducts;
    }
}