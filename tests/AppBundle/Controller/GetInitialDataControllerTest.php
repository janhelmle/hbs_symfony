<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetInitialDataControllerTest extends WebTestCase {

    //  /api/v0/getinitialdata //

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

    public function testContentNotEmpty_v0() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getinitialdata');

        $this->assertNotEmpty($client->getResponse()->getContent());
    }

    public function testJsonContent_v0() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0/getinitialdata');

        $expected = '{
    "roomtypes": [{
        "identifier": "singleroom",
        "subMenuText": "Einzel",
        "listText": "Einzelzimmer",
        "pricingBasisText": "/Nacht",
        "capacity": 11
            }, {
        "identifier": "doubleroom",
        "subMenuText": "Doppel",
        "listText": "Doppelzimmer",
        "pricingBasisText": "/Nacht",
        "capacity": 10
            }, {
        "identifier": "twinroom",
        "subMenuText": "Zweibett",
        "listText": "Zweibettzimmer",
        "pricingBasisText": "/Nacht",
        "capacity": 9
            }, {
        "identifier": "tripleroom",
        "subMenuText": "Dreibett",
        "listText": "Dreibettzimmer",
        "pricingBasisText": "/Nacht",
        "capacity": 8
            }, {
        "identifier": "familyroom",
        "subMenuText": "Familie",
        "listText": "Familien-/Vierbettzimmer",
        "pricingBasisText": "/Nacht",
        "capacity": 7
            }, {
        "identifier": "apartmentsingle",
        "subMenuText": "Apartm. EZ",
        "listText": "Apartment als Einzelzimmer",
        "pricingBasisText": "/Nacht",
        "capacity": 6
            }, {
        "identifier": "apartmentdouble",
        "subMenuText": "Apartm. DZ",
        "listText": "Apartment als Doppelzimmer",
        "pricingBasisText": "/Nacht",
        "capacity": 5
            }],
    "boardings": [{
        "identifier": "halfpension",
        "listText": "Halbpension (mit Frühstück)",
        "pricingBasisText": "/Pers. u. Nacht"
            }, {
        "identifier": "fullpension",
        "listText": "Vollpension (3 Mahlzeiten)",
        "pricingBasisText": "/Pers. u. Nacht"
            }, {
        "identifier": "breakfast",
        "listText": "Nur Frühstück",
        "pricingBasisText": "/Pers. u. Nacht"
            }, {
        "identifier": "noboarding",
        "listText": "Ohne Verpflegung",
        "pricingBasisText": ""
            }],
    "specials": [{
        "identifier": "champagnebreakfast",
        "listText": "Sektfrühstück",
        "pricingBasisText": "/Pers. u. Nacht"
            }, {
        "identifier": "rosesinrooms",
        "listText": "Rosen auf das Zimmer",
        "pricingBasisText": ""
            }, {
        "identifier": "raftingtour",
        "listText": "Rafting-Tour",
        "pricingBasisText": "/Person"
            }]
}';

        $this->assertJsonStringEqualsJsonString($client->getResponse()->getContent(), $expected);
    }

    //  /api/v0.1/getinitialdata //

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

    public function testContentNotEmpty_v0_1() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0.1/getinitialdata');

        $this->assertNotEmpty($client->getResponse()->getContent());
    }

    public function testJsonContent_v0_1() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v0.1/getinitialdata');

        $expected = '{
  "roomTypes": {
    "singleroom": {
      "subMenuText": "Einzel",
      "listText": "Einzelzimmer",
      "pricingBasisText": "/Nacht",
      "capacity": 11
    },
    "doubleroom": {
      "subMenuText": "Doppel",
      "listText": "Doppelzimmer",
      "pricingBasisText": "/Nacht",
      "capacity": 10
    },
    "twinroom": {
      "subMenuText": "Zweibett",
      "listText": "Zweibettzimmer",
      "pricingBasisText": "/Nacht",
      "capacity": 9
    },
    "tripleroom": {
      "subMenuText": "Dreibett",
      "listText": "Dreibettzimmer",
      "pricingBasisText": "/Nacht",
      "capacity": 8
    },
    "familyroom": {
      "subMenuText": "Familie",
      "listText": "Familien-/Vierbettzimmer",
      "pricingBasisText": "/Nacht",
      "capacity": 7
    },
    "apartmentsingle": {
      "subMenuText": "Apartm. EZ",
      "listText": "Apartment als Einzelzimmer",
      "pricingBasisText": "/Nacht",
      "capacity": 6
    },
    "apartmentdouble": {
      "subMenuText": "Apartm. DZ",
      "listText": "Apartment als Doppelzimmer",
      "pricingBasisText": "/Nacht",
      "capacity": 5
    }
  },
  "boardings": {
    "subMenuText": "Verpflegung",
    "halfpension": {
      "listText": "Halbpension (mit Frühstück)",
      "pricingBasisText": "/Pers. u. Nacht"
    },
    "fullpension": {
      "listText": "Vollpension (3 Mahlzeiten)",
      "pricingBasisText": "/Pers. u. Nacht"
    },
    "breakfast": {
      "listText": "Nur Frühstück",
      "pricingBasisText": "/Pers. u. Nacht"
    },
    "noboarding": {
      "listText": "Ohne Verpflegung",
      "pricingBasisText": ""
    }
  },
  "specials": {
    "subMenuText": "Specials (optional)",
    "champagnebreakfast": {
      "listText": "Sektfrühstück",
      "pricingBasisText": "/Pers. u. Nacht"
    },
    "rosesinrooms": {
      "listText": "Rosen auf das Zimmer",
      "pricingBasisText": ""
    },
    "raftingtour": {
      "listText": "Rafting-Tour",
      "pricingBasisText": "/Person"
    }
  }
}';

        $this->assertJsonStringEqualsJsonString($client->getResponse()->getContent(), $expected);
    }

}
