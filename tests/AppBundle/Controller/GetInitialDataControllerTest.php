<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetInitialDataTest extends WebTestCase {

    public function testHeader_v0() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getinitialdata');

        $this->assertTrue(
                $client->getResponse()->headers->contains(
                        'Content-Type', 'application/json ; charset=utf-8'
                )
        );
    }

    public function testStatusCode_v0() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getinitialdata');

        $this->assertEquals(
                200, // or Symfony\Component\HttpFoundation\Response::HTTP_OK
                $client->getResponse()->getStatusCode()
        );
    }

    public function testHeader_v0_1() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0.1/getinitialdata');

        $this->assertTrue(
                $client->getResponse()->headers->contains(
                        'Content-Type', 'application/json ; charset=utf-8'
                )
        );
    }

    public function testStatusCode_v0_1() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0.1/getinitialdata');

        $this->assertEquals(
                200, // or Symfony\Component\HttpFoundation\Response::HTTP_OK
                $client->getResponse()->getStatusCode()
        );
    }

}
