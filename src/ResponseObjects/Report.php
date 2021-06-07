<?php

namespace DPRMC\Backstop\ResponseObjects;

class Report {

    public $id;
    public $included;
    public $meta;


    // Attributes
    public $header;
    public $values;


    public function __construct( array $rawReport ) {

        $this->meta = $rawReport['meta'];
        $this->included = $rawReport['included'];

        $data = $rawReport['data'][0];
        $this->id = $data[ 'id' ];

        $this->header = $data['attributes']['result']['header'];
        $this->values = $data['attributes']['result']['values'];
    }

}