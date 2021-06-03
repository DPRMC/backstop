<?php

namespace DPRMC\Backstop\ResponseObjects;

use Carbon\Carbon;

class HedgeFundProduct {

    public $id;

    // Attributes
    public $fees;
    public $returnCalculationMethodology;
    public $configuration;
    public $regularCustomFieldValues;
    public $createdTimestamp;
    public $investment;
    public $description;
    public $liquidity;
    public $defaultProductCurrency;
    public $riskFreeRate;
    public $inceptionDate;
    public $name;
    public $modifiedTimestamp;
    public $location;
    public $serviceProviders;
    public $productType;

    // Relationships
    public $relationships;


    public function __construct( array $row ) {
        $this->id = $row[ 'id' ];

        // Set attributes.
        foreach ( $row[ 'attributes' ] as $key => $value ):
            $this->{$key} = $value;
        endforeach;

        // Convert date/times to Carbon objects.
        $this->createdTimestamp                     = Carbon::parse( $this->createdTimestamp );
        $this->investment[ 'performanceAuditDate' ] = Carbon::parse( $this->investment[ 'performanceAuditDate' ] );
        $this->investment[ 'closedDate' ]           = isset($this->investment[ 'closedDate' ]) ? Carbon::parse( $this->investment[ 'closedDate' ] ) : null;
        $this->inceptionDate                        = Carbon::parse( $this->inceptionDate );
        $this->modifiedTimestamp                    = Carbon::parse( $this->modifiedTimestamp );

        // Set relationships
        $this->relationships = $row['relationships'];
    }

}