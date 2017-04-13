<?php
namespace Laz\Router;

abstract class AbstractRoute {

    abstract function exec(RouteRequest $request, RouteResponse $response, array $params);
}