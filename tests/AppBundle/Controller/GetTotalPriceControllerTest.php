<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetTotalPriceControllerTest extends WebTestCase {

    //  /api/v0/getTotalPrice //

    public function testJsonContent_v0() {
        $client = static::createClient();

        $crawler = $client->request(
                'POST', '/api/v0/getTotalPrice', array(), array(), array(), '{
	"checkInDate": "2016.01.14, 12:00",
	"checkOutDate": "2016.01.16, 12:00",
	"items": [{
		"roomTypeIdentifier": "singleroom",
		"roomTypeQuantity": 1,
		"boardingIdentifier": "noboarding",
		"specialsIdentifier": "champagnebreakfast"
	}, {
		"roomTypeIdentifier": "doubleroom",
		"roomTypeQuantity": 1,
		"boardingIdentifier": "halfpension",
		"specialsIdentifier": "raftingtour"
	}, {
		"roomTypeIdentifier": "doubleroom",
		"roomTypeQuantity": 2,
		"boardingIdentifier": "fullpension",
		"specialsIdentifier": "champagnebreakfast"
	}]
        }'
        );


        $expected = '1200';

        $this->assertJsonStringEqualsJsonString($client->getResponse()->getContent(), $expected);
    }

}
