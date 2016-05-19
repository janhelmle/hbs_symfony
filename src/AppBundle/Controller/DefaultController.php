<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Item;
use AppBundle;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $input = '
            {
	"checkInDate": "2016.01.10, 12:00",
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
}
';

        $input_sanitized = str_replace(array("\n", "\t", "\r"), '', $input); // remove newlines , tabs , carriage return

        $json_decoded = json_decode($input_sanitized, false); // false -> object , true -> array
        // dump($json_decoded);

        $c = new Cart();
        $c->setCheckInDate($json_decoded->checkInDate);
        $c->setCheckOutDate($json_decoded->checkOutDate);
        foreach ($json_decoded->items as $item) {
            $i = new Item();
            $i->setRoomTypeIdentifier($item->roomTypeIdentifier);
            $i->setRoomTypeQuantity($item->roomTypeQuantity);
            $i->setBoardingIdentifier($item->boardingIdentifier);
            $i->setSpecialIdentifier($item->specialsIdentifier);
            $c->addItem($i);
        };

        $totalPrice = $em->getRepository('AppBundle:Cart')->calculateTotalPrice($c);
        
        // dump($totalPrice);

        $resp = new Response('<body></body>');
        //$resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
