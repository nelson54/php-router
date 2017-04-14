<?php
namespace Laz\Router\Middleware;

abstract class AbstractMiddlewareList implements MiddlewareList {

	private $index = 0;
	private $middlewares;

	public function __construct($middlewares) {
		$this->middlewares = $middlewares;
	}

	public function reset() { $this->index = 0; }
	public function key() { return $this->index; }
	public function next() { $this->index++; }
	public function valid() { return isset($this->middlewares[$this->index]); }

	public function current() {
		$middleware = $this->middlewares[$this->index];
		
		if(!($middleware instanceof Middleware)) {
			$middleware = $this->initMiddleware($middleware);
			$this->middlewares[$this->index] = $middleware;			
		} 
	
		return $middleware;
	}

	protected abstract function initMiddleware($config);
}
