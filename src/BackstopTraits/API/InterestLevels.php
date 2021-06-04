<?php

namespace DPRMC\Backstop\BackstopTraits\API;

use DPRMC\Backstop\ResponseObjects\HedgeFundProduct;

/**
 * @TODO
 * Trait InterestLevels
 * @package DPRMC\Backstop\BackstopTraits
 */
trait InterestLevels {

    use Client;

    public function interest_levels() {
        $response = $this->guzzle->request( 'GET', 'api/interest-levels', [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        $jsonArray = json_decode( (string)$response->getBody(), TRUE );

        print_r($jsonArray);
        die();

//        $this->included           = $jsonArray[ 'included' ];
//        $this->meta               = $jsonArray[ 'meta' ];
//        $this->totalResourceCount = $jsonArray[ 'meta' ][ 'totalResourceCount' ];
//        $data                     = $jsonArray[ 'data' ];
//        $hedgeFundProducts        = [];

//        foreach ( $data as $row ):
//            $hedgeFundProducts[] = new HedgeFundProduct( $row );
//        endforeach;

        return [];
//        return $hedgeFundProducts;
    }
}