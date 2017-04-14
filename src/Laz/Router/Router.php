<?php
namespace LAZ\Router;

use Laz\Router\Exception\NotFoundException;

abstract class Router extends AbstractRoute {

	/** @var AbstractRoute[] */
	private $routes = [];
	
	public function __construct($middleware, $method, $path) {
		parent::__construct($middleware, $method, $path);
	}

	protected function doRoute(RouteRequest $request, RouteResponse $response, $params) {
		foreach($routes as $route) {
			if($route->matches($request) {
				return $route->run($request, $response, $params);
			}
		}	

		throw new NotFoundException( $request->unwrapRequest() );
	}
}
