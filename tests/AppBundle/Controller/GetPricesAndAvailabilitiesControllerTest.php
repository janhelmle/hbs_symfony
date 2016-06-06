<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetPricesAndAvailabilitiesControllerTest extends WebTestCase {

    //  /api/v0/getpricesandavailabilities //

    public function testHeader_v0() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getpricesandavailabilities');

        $this->assertTrue(
                $client->getResponse()->headers->contains(
                        'Content-Type', 'application/json ; charset=utf-8'
                )
        );
    }

    public function testStatusCode_v0() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getpricesandavailabilities');

        $this->assertEquals(
                200, // or Symfony\Component\HttpFoundation\Response::HTTP_OK
                $client->getResponse()->getStatusCode()
        );
    }

    public function testContentNotEmpty_v0() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getpricesandavailabilities');

        $this->assertNotEmpty($client->getResponse()->getContent());
    }

    public function testJsonContent_v0() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getpricesandavailabilities');

        $expected = '[{
	"identifier": "singleroom",
	"quantity": 5,
	"price": "110.00"
        }, {
	"identifier": "singleroom",
	"quantity": 5,
	"price": "120.00"
        }, {
	"identifier": "singleroom",
	"quantity": 5,
	"price": "130.00"
        }, {
	"identifier": "doubleroom",
	"quantity": 4,
	"price": "120.00"
        }, {
	"identifier": "twinroom",
	"quantity": 3,
	"price": "130.00"
        }, {
	"identifier": "tripleroom",
	"quantity": 2,
	"price": "140.00"
        }, {
	"identifier": "familyroom",
	"quantity": 1,
	"price": "150.00"
        }, {
	"identifier": "apartmentsingle",
	"quantity": 1,
	"price": "160.00"
        }, {
	"identifier": "apartmentdouble",
	"quantity": 5,
	"price": "170.00"
        }, {
	"identifier": "halfpension",
	"price": "12.50"
        }, {
	"identifier": "fullpension",
	"price": "25.00"
        }, {
	"identifier": "breakfast",
	"price": "8.00"
        }, {
	"identifier": "noboarding",
	"price": "0.00"
        }, {
	"identifier": "champagnebreakfast",
	"price": "12.50"
        }, {
	"identifier": "rosesinrooms",
	"price": "30.00"
        }, {
	"identifier": "raftingtour",
	"price": "25.00"
        }]';

        $this->assertJsonStringEqualsJsonString($client->getResponse()->getContent(), $expected);
    }

    //  /api/v0.1/getinitialdata //
}
