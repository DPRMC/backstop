<?php
namespace DPRMC\Backstop\BackstopTraits\API;

trait Client {

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * @var string
     */
    protected $baseURI;

    /**
     * @var string The user account that should have access to the Backstop API.
     */
    protected $user;

    /**
     * @var string The password for the above user account.
     */
    protected $password;

    /**
     * @var boolean Set to true to turn on debug mode for the Guzzle client. You get a lot more connection data useful for debugging.
     */
    protected $debug;

    /**
     * @var string The auth token returned from the API when you authenticate.
     */
    protected $apiAccessAuthenticationToken;

    /**
     * @var array
     */
    protected $defaultHeaders = [
        'Content-type' => 'application/vnd.api+json',
        'Accept'       => 'application/vnd.api+json, application/json',
    ];




}