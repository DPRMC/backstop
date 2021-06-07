<?php

namespace DPRMC\Backstop\BackstopTraits\API;

use Carbon\Carbon;
use DPRMC\Backstop\ResponseObjects\Report;

trait Reports {

    use Client;


    /**
     * Can't send both a reportDefinition and a reportName.
     * @param Carbon|null $asOfDate
     * @param string|null $asOfDateOperator
     * @param string|null $reportDefinition
     * @param string|null $restrictionExpression
     * @param string|null $reportName
     * @return Report
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function reports( Carbon $asOfDate = NULL,
                             string $asOfDateOperator = NULL,
                             string $reportDefinition = NULL,
                             string $restrictionExpression = NULL,
                             string $reportName = NULL ): Report {

        $query = [
            'filter[asOfDate][' . $asOfDateOperator . ']' => $asOfDate->toDateString(),
        ];

        if ( $restrictionExpression ):
            $query[ 'filter[restrictionExpression][eq]' ] = $restrictionExpression;
        endif;

        if ( $reportDefinition ):
            $query[ 'filter[reportDefinition][eq]' ] = $reportDefinition;
        elseif ( $reportName ):
            $query[ 'filter[reportName][eq]' ] = $reportName;
        else:
            throw new \Exception( 'You need to pass either a $reportDefinition or $reportName' );
        endif;

        $response = $this->guzzle->request( 'GET', 'api/reports', [
            'debug'   => $this->debug,
            'headers' => $this->defaultHeaders,
            'query' => $query
        ] );

        $jsonArray = json_decode( (string)$response->getBody(), TRUE );

        return new Report($jsonArray);
    }
}