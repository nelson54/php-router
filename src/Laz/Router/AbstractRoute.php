<?php
namespace Laz\Router;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRoute {

    abstract function exec(RequestInterface, ResponseInterface, )
}