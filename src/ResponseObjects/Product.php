<?php

namespace DPRMC\Backstop\ResponseObjects;

use Carbon\Carbon;

class Product {

    public $id;

    // Attributes
    public $returnCalculationMethodology;
    public $configuration;
    public $regularCustomFieldValues;
    public $createdTimestamp;
    public $specificResource;
    public $description;
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

        foreach ( $row[ 'attributes' ] as $key => $value ):
            $this->{$key} = $value;
        endforeach;

        // Convert date/times to Carbon objects.
        $this->createdTimestamp  = Carbon::parse( $this->createdTimestamp );
        $this->inceptionDate     = Carbon::parse( $this->inceptionDate );
        $this->modifiedTimestamp = Carbon::parse( $this->modifiedTimestamp );

        // Set relationships
        $this->relationships = $row['relationships'];
    }

}