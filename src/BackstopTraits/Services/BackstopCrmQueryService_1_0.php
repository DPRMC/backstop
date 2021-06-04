<?php

namespace DPRMC\Backstop\BackstopTraits\Services;


use DPRMC\Backstop\BackstopTraits\API\Client;

trait BackstopCrmQueryService_1_0 {

    use Client;

    public function query_service() {
        $response = $this->guzzle->request( 'GET', 'services/BackstopCrmQueryService_1_0?wsdl', [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        var_dump((string)$response->getBody());
        die();
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