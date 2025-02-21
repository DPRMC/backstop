<?php

namespace DPRMC\Backstop\ResponseObjects;

use Carbon\Carbon;

class HedgeFundAccountRedemption {
    public readonly int    $id;
    public readonly string $type;
    public readonly float  $amount;
    public readonly array  $regularCustomFieldValues;
    public readonly Carbon $noticeDate;
    public readonly Carbon  $createdTimestamp;
    public readonly ?string $description;
    public readonly string  $specificResourceType;
    public readonly int    $specificResourceId;
    public readonly bool   $liquidating;
    public readonly Carbon $modifiedTimestamp;
    public readonly Carbon $transactionDate;
    public readonly string $legacyTransactionType;
    public readonly string $status;
    public readonly array  $relationships;
    public readonly string $selfLink;

    public function __construct( array $data ) {
        $this->id                       = $data[ 'id' ];
        $this->type                     = $data[ 'type' ];
        $this->amount                   = $data[ 'attributes' ][ 'amount' ];
        $this->regularCustomFieldValues = $data[ 'attributes' ][ 'regularCustomFieldValues' ];
        $this->noticeDate               = Carbon::parse( $data[ 'attributes' ][ 'noticeDate' ] );
        $this->createdTimestamp         = Carbon::parse( $data[ 'attributes' ][ 'createdTimestamp' ] );
        $this->description              = $data[ 'attributes' ][ 'description' ] ?? null;
        $this->specificResourceType     = $data[ 'attributes' ][ 'specificResource' ][ 'resourceType' ];
        $this->specificResourceId       = $data[ 'attributes' ][ 'specificResource' ][ 'resourceId' ];
        $this->liquidating              = isset( $data[ 'attributes' ][ 'liquidating' ] );
        $this->modifiedTimestamp        = Carbon::parse( $data[ 'attributes' ][ 'modifiedTimestamp' ] );
        $this->transactionDate          = Carbon::parse( $data[ 'attributes' ][ 'transactionDate' ] );
        $this->legacyTransactionType    = $data[ 'attributes' ][ 'legacyTransactionType' ];
        $this->status                   = $data[ 'attributes' ][ 'status' ];
        $this->relationships            = $data[ 'relationships' ];
        $this->selfLink                 = $data[ 'links' ][ 'self' ];
    }
}