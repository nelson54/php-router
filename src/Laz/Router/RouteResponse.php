<?php
namespace Laz\Router;

use Psr\Http\Message\ResponseInterface;

class RouteResponse {

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * RouteResponse constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }




}