<?php

namespace DPRMC\Backstop\BackstopTraits\API;

use DPRMC\Backstop\ResponseObjects\HedgeFundAccountRedemption;

trait HedgeFundAccountRedemptions {

    use Client;


    /**
     * @param string $filterField
     * @param string $filterOperator
     * @param string $filterValue
     * @param string $sortField
     *
     * @return HedgeFundAccountRedemption[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function hedge_fund_redemptions_by_filter( string $filterField,
                                                      string $filterOperator,
                                                      string $filterValue,
                                                      string $sortField ): array {

        $validFilterFields = [
            'createdTimestamp',
            'modifiedTimestamp',
            'otherId',
            'transactionDate',
        ];

        $dateFilterFields = [
            'createdTimestamp',
            'modifiedTimestamp',
            'transactionDate',
        ];

        $validFilterOperators = [
            'eq',
            'neq',
            'gt',
            'ge',
            'lt',
            'le',
        ];

        $validSortFields = [
            'createdTimestamp',
            'id',
            'modifiedTimestamp',
            'otherId',
            'transactionDate',
            '-createdTimestamp',
            '-id',
            '-modifiedTimestamp',
            '-otherId',
            '-transactionDate',
        ];

        if ( !in_array( $filterField, $validFilterFields ) ):
            throw new \Exception( 'Invalid filter field.  Valid filter fields are: ' . implode( ', ', $validFilterFields ) );
        endif;

        if ( !in_array( $filterOperator, $validFilterOperators ) ):
            throw new \Exception( 'Invalid filter operator.  Valid filter operators are: ' . implode( ', ', $validFilterOperators ) );
        endif;

        if ( !in_array( $sortField, $validSortFields ) ):
            throw new \Exception( 'Invalid sort field.  Valid sort fields are: ' . implode( ', ', $validSortFields ) );
        endif;

        if ( in_array( $filterField, $dateFilterFields ) ):
            $pattern = '/^\d{4}-\d{2}-\d{2}$/';
            if ( 1 !== preg_match( $pattern, $filterValue ) ):
                throw new \Exception( 'Date filter values must be in the format YYYY-MM-DD, and you passed in ' . $filterValue );
            endif;
        endif;


        $queryArray = [
            'filter[' . $filterField . '][' . $filterOperator . ']' => $filterValue,
            'sort'                                                  => $sortField,
        ];

        $uri = '/backstop/api/hedge-fund-account-redemptions/';

        // The UnencodedUrl object requires just the host.
        // Not the schema or part of the path.
        // Admittedly a bit of a kludge here.
        $baseUri = str_replace( 'https://', '', $this->baseURI );
        $baseUri = str_replace( '/backstop/', '', $baseUri );

        $UnencodedURL = new UnencodedUrl( $baseUri, $uri, $queryArray );

        $response = $this->guzzle->request( 'GET', $UnencodedURL, [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
        ] );

        $jsonArray = json_decode( (string)$response->getBody(), TRUE );

        $redemptions = [];
        foreach ( $jsonArray[ 'data' ] as $row ):
            $redemptions[] = new HedgeFundAccountRedemption( $row );
        endforeach;

        return $redemptions;
    }
}