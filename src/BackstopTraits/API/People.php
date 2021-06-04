<?php

namespace DPRMC\Backstop\BackstopTraits\API;

use DPRMC\Backstop\ResponseObjects\HedgeFundProduct;

/**
 * @TODO
 * Trait InterestLevels
 * @package DPRMC\Backstop\BackstopTraits
 */
trait People {

    use Client;

    public function people( int $offset = NULL, int $limit = NULL, array $filter = [] ) {

        $query = [];
        if ( $offset ):
            $query[ 'page[offset]' ] = $offset;
        endif;

        if ( $limit ):
            $query[ 'page[limit]' ] = $limit;
        endif;

        if ( !empty( $filter ) ):



            foreach ( $filter as $field => $params ):


                $operator  = array_key_first( $params );
                $parameter = reset( $params );

//                var_dump($field);
//                var_dump($operator);
//                var_dump($parameter);
//                die();
                $query[ 'field[' . $field . '][' . $operator . ']' ] = $parameter;
            endforeach;
        endif;

        $response = $this->guzzle->request( 'GET', 'api/people?field[lastName][eq]=Ventrudo', [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
//            'query'   => $query,
        ] );

        $jsonArray = json_decode( (string)$response->getBody(), TRUE );

        print_r( $jsonArray );
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