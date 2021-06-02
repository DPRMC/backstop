<?php
namespace DPRMC\Backstop\BackstopTraits;

trait InitClient {
 use Client;


    public function initClient(){
        $this->guzzle = new \GuzzleHttp\Client( [
                                                    // Base URI is used with relative requests
                                                    'base_uri' => $this->baseURI,
                                                    // You can set any number of default request options.
                                                    'timeout'  => 60.0,
                                                ] );

        $stringToEncode      = ( $this->user . ':' . $this->password );
        $basicAuthentication = base64_encode( $stringToEncode );
        $additionalHeaders   = [
            'Authorization' => "Basic " . $basicAuthentication,
            'Accept'        => 'application/vnd.api+json, application/json',
        ];
        $headers             = array_merge( $this->defaultHeaders, $additionalHeaders );


        $response = $this->guzzle->request( 'POST', 'login', [
            'debug'       => $this->debug,
            'headers'     => $headers,
            'form_params' => [
                'username' => $this->user,
                'password' => $this->password,
            ] ] );

        $this->apiAccessAuthenticationToken = (string)$response->getBody();

        $authenticationString = $this->user . ':' . $this->apiAccessAuthenticationToken;
        // Default
        $this->defaultHeaders = [
            'token'         => TRUE,
            'Authorization' => 'Basic ' . base64_encode( $authenticationString ),
            'Accept'        => 'application/vnd.api+json, application/json',
        ];
    }


}