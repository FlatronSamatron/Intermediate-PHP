<?php

declare(strict_types=1);
namespace Tests\Unit;

use AllowDynamicProperties;
use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

use \Tests\DataProviders\RouterDataProvider;

#[AllowDynamicProperties]
class RouterTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    #[Test]
    public function it_registers_a_route(): void
    {
        //given - when - then

        //given that we have a router object
        //$router = new Router();

        //when we call a register method
        $this->router->register('GET', '/users', ['Users', 'index']);

        $expected = [
                'GET' => [
                        '/users' => ['Users', 'index'],
                ],
        ];

        //then we assert router was registered
        $this->assertEquals($expected, $this->router->routes());
    }

    #[Test]
    public function it_registers_a_get_route(): void
    {
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
                'GET' => [
                        '/users' => ['Users', 'index'],
                ],
        ];

        $this->assertEquals($expected, $this->router->routes());
    }

    #[Test]
    public function it_registers_a_post_route(): void
    {
        $this->router->post('/users', ['Users', 'store']);

        $expected = [
                'POST' => [
                        '/users' => ['Users', 'store'],
                ],
        ];

        $this->assertEquals($expected, $this->router->routes());
    }

    #[Test]
    public function there_are_no_routes_when_router_is_created(): void
    {
        $this->assertEmpty((new Router())->routes());
    }

    #[DataProviderExternal(RouterDataProvider::class, 'routeNotFoundCases')]
    #[Test]
    public function it_throws_route_not_found_exception(
            string $requestUri,
            string $requestMethod
    ): void {
        $users = new class() {
            public function delete(): bool
            {
                return true;
            }
        };

        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }

    #[Test]
    public function it_resolves_route_from_a_closure(): void
    {
        $this->router->get('/users', fn() => [1, 2, 3]);

        $this->assertSame([1, 2, 3], $this->router->resolve('/users', 'GET'));
    }

    #[Test]
    public function it_resolves_route(): void
    {
        $users = new class() {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };

        $this->router->get('/users', [$users::class, 'index']);
        $this->assertSame([1, 2, 3], $this->router->resolve('/users', 'GET'));
    }

}