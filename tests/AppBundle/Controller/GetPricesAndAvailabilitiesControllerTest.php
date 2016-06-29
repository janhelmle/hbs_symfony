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

    public function testJsonContent_v0() { // TODO
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getpricesandavailabilities');

        $expected = '[{
	"identifier": "singleroom",
	"quantity": "5",
	"price": "130.00"
        }, {
	"identifier": "doubleroom",
	"quantity": "4",
	"price": "120.00"
        }, {
	"identifier": "twinroom",
	"quantity": "3",
	"price": "130.00"
        }, {
	"identifier": "tripleroom",
	"quantity": "2",
	"price": "140.00"
        }, {
	"identifier": "familyroom",
	"quantity": "1",
	"price": "150.00"
        }, {
	"identifier": "apartmentsingle",
	"quantity": "1",
	"price": "160.00"
        }, {
	"identifier": "apartmentdouble",
	"quantity": "5",
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

        $this->assertJsonStringEqualsJsonString($expected, $client->getResponse()->getContent());
    }

    //  /api/v0.1/getpricesandavailabilities //

    public function testHeader_v0_1() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0.1/getpricesandavailabilities');

        $this->assertTrue(
                $client->getResponse()->headers->contains(
                        'Content-Type', 'application/json ; charset=utf-8'
                )
        );
    }

    public function testStatusCode_v0_1() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0.1/getpricesandavailabilities');

        $this->assertEquals(
                200, // or Symfony\Component\HttpFoundation\Response::HTTP_OK
                $client->getResponse()->getStatusCode()
        );
    }

    public function testContentNotEmpty_v0_1() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0.1/getpricesandavailabilities');

        $this->assertNotEmpty($client->getResponse()->getContent());
    }

    public function testJsonContent_v0_1() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0.1/getpricesandavailabilities');

        $expected = '{
	"checkInDate": "2016.04.26, 12:00",
	"checkOutDate": "2016.04.27, 12:00",
	"roomTypes": [{
		"identifier": "singleroom",
		"price": "110.00",
		"quantity": 5
	}, {
		"identifier": "doubleroom",
		"price": "120.00",
		"quantity": 4
	}, {
		"identifier": "twinroom",
		"price": "130.00",
		"quantity": 3
	}, {
		"identifier": "tripleroom",
		"price": "140.00",
		"quantity": 2
	}, {
		"identifier": "familyroom",
		"price": "150.00",
		"quantity": 1
	}, {
		"identifier": "apartmentsingle",
		"price": "160.00",
		"quantity": 1
	}, {
		"identifier": "apartmentdouble",
		"price": "170.00",
		"quantity": 5
	}],
	"boardings": [{
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
	}],
	"specials": [{
		"identifier": "champagnebreakfast",
		"price": "12.50"
	}, {
		"identifier": "rosesinrooms",
		"price": "30.00"
	}, {
		"identifier": "raftingtour",
		"price": "25.00"
	}]
        }';

        $this->assertJsonStringEqualsJsonString($expected, $client->getResponse()->getContent());
    }

    //  /api/v0.2/getpricesandavailabilities //

    public function testResponseHeaderValidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2016.01.14, 12:00',
                    'HTTP_checkOutDate' => '2016.01.16, 12:00'
        ));


        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertTrue(
                $client->getResponse()->headers->contains(
                        'Content-Type', 'application/json ; charset=utf-8'
                )
        );
    }

    public function testResponseStatusCodeValidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.14, 12:00',
                    'HTTP_checkOutDate' => '2099.01.16, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertEquals(
                200, 
                $client->getResponse()->getStatusCode()
        );
    }

    public function testResponseNotEmptyValidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.14, 12:00',
                    'HTTP_checkOutDate' => '2099.01.16, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertNotEmpty($client->getResponse()->getContent());
    }
    
    public function testResponseValidJsonValidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.14, 12:00',
                    'HTTP_checkOutDate' => '2099.01.16, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');
        
        $content = $client->getResponse()->getContent() ;
        
        $jsonDecodedContent = json_decode($content); 

        $this->assertTrue(json_last_error() == 'JSON_ERROR_NONE');
    }

    public function testResponseJsonContentValidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2016.01.14, 12:00',
                    'HTTP_checkOutDate' => '2016.01.16, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $expected = '{
	"checkInDate": "2016.01.14, 12:00",
	"checkOutDate": "2016.01.16, 12:00",
	"roomTypes": [{
		"identifier": "singleroom",
		"price": 115,
		"quantity": 5
	}, {
		"identifier": "doubleroom",
		"price": 120,
		"quantity": 6
	}, {
		"identifier": "twinroom",
		"price": 130,
		"quantity": 7
	}, {
		"identifier": "tripleroom",
		"price": 140,
		"quantity": 8
	}, {
		"identifier": "familyroom",
		"price": 150,
		"quantity": 4
	}, {
		"identifier": "apartmentsingle",
		"price": 160,
		"quantity": 3
	}, {
		"identifier": "apartmentdouble",
		"price": 170,
		"quantity": 2
	}],
	"boardings": [{
		"identifier": "halfpension",
		"price": 12.5
	}, {
		"identifier": "fullpension",
		"price": 25
	}, {
		"identifier": "breakfast",
		"price": 8
	}, {
		"identifier": "noboarding",
		"price": 0
	}],
	"specials": [{
		"identifier": "champagnebreakfast",
		"price": 12.5
	}, {
		"identifier": "rosesinrooms",
		"price": 30
	}, {
		"identifier": "raftingtour",
		"price": 25
	}]
        }';

        $this->assertJsonStringEqualsJsonString($expected, $client->getResponse()->getContent());
    }

    public function testResponseHeaderInvalidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.14, 12:0',
                    'HTTP_checkOutDate' => '2099.01.16, 12:00'
        ));


        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertTrue(
                $client->getResponse()->headers->contains(
                        'Content-Type', 'Content-Type: text/html; charset=utf-8'
                )
        );
    }

    public function testResponseStatusCodeInvalidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.14, 12:0',
                    'HTTP_checkOutDate' => '2099.01.16, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertEquals(
                400, // or Symfony\Component\HttpFoundation\Response::HTTP_OK
                $client->getResponse()->getStatusCode()
        );
    }

    public function testResponseNotEmptyInvalidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.14, 12:0',
                    'HTTP_checkOutDate' => '2099.01.16, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertNotEmpty($client->getResponse()->getContent());
    }

    public function testResponseContainsErrorInvalidInput_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.14, 12:0',
                    'HTTP_checkOutDate' => '2099.01.16, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertContains('Error', $client->getResponse()->getContent());
    }

    public function testResponseContainsErrorCheckInDateGreaterCheckOutDate_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.16, 12:00',
                    'HTTP_checkOutDate' => '2099.01.14, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertContains('Error', $client->getResponse()->getContent());
    }

    public function testResponseContainsErrorCheckInDateEqualsCheckOutDate_v0_2() {
        $client = static::createClient(array(), array(
                    'HTTP_checkInDate' => '2099.01.16, 12:00',
                    'HTTP_checkOutDate' => '2099.01.16, 12:00'
        ));

        $crawler = $client->request('GET', '/api/v0.2/getpricesandavailabilities');

        $this->assertContains('Error', $client->getResponse()->getContent());
    }

}
