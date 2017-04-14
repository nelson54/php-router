<?php
namespace Laz\Router\Middleware;

use Laz\DI\Container;

class ContainerAwareMiddlewareList extends AbstractMiddlewareList {

	/** @var Container */
	private $container;

	public function __construct(Container $container, $middlewares) {
		parent::__construct($middlewares);
		$this->container = $container;
	}

	protected function initMiddleware($config) {
		$middleware = $container->get($config); 
		//TODO handle configuration blobs?

		return $middleware;
	}
}

