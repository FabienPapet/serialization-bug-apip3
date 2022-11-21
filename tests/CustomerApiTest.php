<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use Hautelook\AliceBundle\PhpUnit\RecreateDatabaseTrait;

class CustomerApiTest extends ApiTestCase
{
    use RecreateDatabaseTrait;

    public function testSomething(): void
    {
        $response = static::createClient()->request('GET', '/api/customers', [
            'headers' => [
                'accept' => 'application/json'
            ]
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertCount(2, $response->toArray());

        self::assertJsonContains([
            [
                'name' => 'foo',
                'telephone' => null,
            ],

            [
                'name' => 'bar',
                'telephone' => '0147200001',
            ]
        ]);
    }
}
