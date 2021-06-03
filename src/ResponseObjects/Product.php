<?php

namespace DPRMC\Backstop\ResponseObjects;

use Carbon\Carbon;
use Cassandra\RetryPolicy\DefaultPolicy;

class Product {

    public $id;

    // Attributes
    /**
     * @var string Ex: TWRR_MV_MR
     */
    public $returnCalculationMethodology;

    /**
     * @var array
     */
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


    public function __construct( array $row ) {
        $this->id = $row[ 'id' ];

        foreach ( $row[ 'attributes' ] as $key => $value ):
            $this->{$key} = $value;
        endforeach;

        // Convert datetimes to Carbon objects.
        $this->createdTimestamp  = Carbon::parse( $this->createdTimestamp );
        $this->inceptionDate     = Carbon::parse( $this->inceptionDate );
        $this->modifiedTimestamp = Carbon::parse( $this->modifiedTimestamp );
    }

}