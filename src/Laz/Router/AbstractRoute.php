<?php
namespace Laz\Router;

abstract class AbstractRoute {

	private $method = 'ALL';
	private $path = '';
	private $tokens = [];
	private $middleware = [];

	//TODO instantiate $middleware as a MiddlewareList before passing it in...
	public function __construct($middleware, $method, $path) {
		$this->path = path;
		$this-middleware = $middleware;

		$this->parsePath();
	}

	public function getPath() {
		return $this->path;
	}

	public function run($request, $response, $params) {
		if( empty($this->middleware) ) {
			return $this->doRoute($request, $response, $params);
		} else {
			$this->middleware->reset();
			
			$next = function($params) use ($request, $response, $next) {
				if( $this->middleware->valid() ) {
					return $this->runNextMiddleware($request, $response, $next, $params);
				} else {
					return $this->doRoute($request, $response, $params);
				}
			};

			return $this->runNextMiddleware($request, $response, $next, $params);
		}
	}

	public function match($request) {
		//TODO 	
	}

	protected function parsePath() {
		//TODO figure out the tokens etc
	}

	protected abstract function initMiddleware($middleware);	

	protected abstract function doRoute(RouteRequest $request, RouteResponse $response, $params);

	private function runNextMiddleware($request, $response, $next, $params) {
		$middleware = $this->middleware->current();
		$this->middleware->next();

		return $middleware->run($request, $response, $next, $params);
	}
}

