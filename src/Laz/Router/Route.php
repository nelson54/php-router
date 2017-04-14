<?php
namespace Laz\Router;

abstract class AbstractRoute {

	private $method = 'ALL';
	private $path = '';
	private $tokens = [];
	private $middleware = [];

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
			$mWchain = new ArrayIterator($this->middleware);

			$next = function($params) use ($request, $response, $mwChain, $next) {
				if($mwChain->isValid()) {
					$middleware = $this->initMiddleware( $mwChain->current() );
					$mwChain->next();

					return $middleware->run($request, $response, $next, $params);
				} else {
					return $this->doRoute($request, $response, $params);
				}
			};

			$middleware = $this->initMiddleware( $mwChain->current() );
			$mwChain->next();

			return $middleware->run($request, $response, $next, $params);
		}
	}

	public function match($request) {
		//TODO 	
	}

	protected function parsePath() {
		//TODO figure out the tokens etc
	}

	protected abstract function initMiddleware($middleware);	

	protected abstract function doRoute($request, $response, $params);
}

