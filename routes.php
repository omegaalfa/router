<?php

declare(strict_types = 1);

use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
use Omegaalfa\Wrouter\Wrouter;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

$request = ServerRequestFactory::fromGlobals();
$response = new Response();
$router = new Wrouter($response);

$router->group('/api', function() use ($router) {
	$router->get('/user', function(RequestInterface $request, ResponseInterface $response) {
		echo 'chamou group  api/user';
		return $response;
	});
});
$router->get('/home', function(RequestInterface $request, ResponseInterface $response) {
	echo 'chamou /home';
	return $response;
});
$router->dispatcher($request);
