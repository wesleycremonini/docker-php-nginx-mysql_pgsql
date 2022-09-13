<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

final class RoutingTest extends TestCase
{
  private $router;

  protected function setUp(): void
  {
    // we have a slim app object as router
    $this->router = AppFactory::create();
    $this->router->addBodyParsingMiddleware();
  }

  public function test_that_routes_are_being_correctly_registered(): void
  {
    // assert there are no routes before route register
    $expectedRouteCount = 0;
    $actualRouteCount = count($this->router->getRouteCollector()->getRoutes());
    $this->assertEquals($expectedRouteCount, $actualRouteCount);

    // we register a get route inside a route group
    $this->router->group('/test', function (RouteCollectorProxy $group) {
      $group->get('/getroute', 'test');
    });

    // assert there is only one registered route
    $expectedRouteCount = 1;
    $actualRouteCount = count($this->router->getRouteCollector()->getRoutes());
    $this->assertEquals($expectedRouteCount, $actualRouteCount);

    // assert registered route pattern
    $expectedPattern = "/test/getroute";
    $actualPattern = $this->router->getRouteCollector()->getRoutes()['route0']->getPattern();
    $this->assertEquals($expectedPattern, $actualPattern);

    // assert registered route method
    $expectedMethod = "GET";
    $actualMethod = $this->router->getRouteCollector()->getRoutes()['route0']->getMethods()[0];
    $this->assertEquals($expectedMethod, $actualMethod);

    // assert registered route callable
    $expectedCallable = "test";
    $actualCallable = $this->router->getRouteCollector()->getRoutes()['route0']->getCallable();
    $this->assertEquals($expectedCallable, $actualCallable);
  }
}
