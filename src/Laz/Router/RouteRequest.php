<?php
namespace Laz\Router;

use Psr\Http\Message\RequestInterface;

class RouteRequest {

    private $matchedPath;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * RouteRequest constructor.
     * @param $matchedPath
     * @param $request
     */
    public function __construct($matchedPath, $request)
    {
        $this->matchedPath = $matchedPath;
        $this->request = $request;
    }

    public function incrementMatchedPath() {

    }

    /**
     * @return string
     */
    public function getMatchedPath()
    {
        return $this->matchedPath;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }




}