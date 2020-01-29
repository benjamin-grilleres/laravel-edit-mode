<?php

namespace BenWecom4U\Editor\Tests;

class TestRoute extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    // Use annotation @test so that PHPUnit knows about the test
    /** @test */
    public function visit_test_route()
    {
        $router = $this->getRouter();
        // Visit /test and see "Test Laravel package isolated" on it
        $response = $router->get('editor');
        $response->assertStatus(200);

    }

    protected function getRouter()
    {
        return app('router');
    }
}
