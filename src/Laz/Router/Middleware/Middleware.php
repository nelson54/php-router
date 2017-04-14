<?php
namespace LAZ\Router\Middleware;

use LAZ\Router\RouteRequest;
use LAZ\Router\RouteResponse; 

interface Middleware {

	/**
	 * An interceptor that runs in a chain before a route endpoint is processed
	 *
	 * Implementations receive a $params object that contains information from the previous step in the chain (ie. route tokens etc)
	 * and are expected to return a value that can be propagated back for rendering (ie. an array to turn into JSON)
	 *
	 * Call the provided $next function to invoke the next step in the chain (either more middleware or the route). The $next function
	 * takes the "new" $params as its only argument and returns the result of the next step.
	 *
	 * A "noop" middleware implementation would look like:
	 *
	 * class NoopMiddleware implements Middleware {
	 *     
	 *     public function run($request, $response, $next, $params) {
	 *	       return $next($params);
	 *	   }
	 * }
	 *
	 * @param RouteRequest $request
	 * @param RouteResponse $response
	 * @param callable $next
	 * @param array $params
	 *
	 * @return mixed  
	 */
	public function run(
		RouterRequest $request, 
		RouteResponse $response, 
		callable $next, 
		array $params
	);
}

