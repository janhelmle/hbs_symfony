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

class PostOrderController extends Controller {

    /**
     * @Route("/api/v0/postOrder", name="getTotalPrice_v_0")
     */
    public function postOrderAction_v_0(Request $request) {

        $input = $request->getContent();

        $em = $this->getDoctrine()->getManager();

//        $input = '
//            {
//	"checkInDate": "2016.01.10, 12:00",
//	"checkOutDate": "2016.01.16, 12:00",
//        
//        "userFirstName": "Anton",
//        "userLastName": "Anders",
//        "userBirthDate": "11.01.1991",
//        "userAddress": "Antonstrasse 11",
//        "userPLZ": "12345",
//        "userEmail": "a@a.com",
//        
//        "alternateCheck": true,
//        
//        "userFirstName": "Bernd",
//        "userLastName": "Bartel",
//        "userBirthDate": "11.01.1991",
//        "userAddress": "Antonstrasse 11",
//        "userPLZ": "12345",
//
//
//
//	"items": [{
//		"roomTypeIdentifier": "singleroom",
//		"roomTypeQuantity": 1,
//		"boardingIdentifier": "noboarding",
//		"specialsIdentifier": "champagnebreakfast"
//	}, {
//		"roomTypeIdentifier": "doubleroom",
//		"roomTypeQuantity": 1,
//		"boardingIdentifier": "halfpension",
//		"specialsIdentifier": "raftingtour"
//	}, {
//		"roomTypeIdentifier": "doubleroom",
//		"roomTypeQuantity": 2,
//		"boardingIdentifier": "fullpension",
//		"specialsIdentifier": "champagnebreakfast"
//	}]
//}
// ';

        if (
                (!$input)
        ) {


            $resp = new Response(
                    "Malformed request syntax. "
                    . " "
            );
            $resp->setStatusCode(Response::HTTP_BAD_REQUEST);
            $resp->headers->set('Content-Type', 'Content-Type: text/html; charset=utf-8');
            return $resp;
        }

        $input_sanitized = str_replace(array("\n", "\t", "\r"), '', $input); // remove newlines , tabs , carriage return

        $json_decoded = json_decode($input_sanitized, false); // false -> object , true -> array
        
        $c = new Cart();
        
        $c->setCheckInDate($json_decoded->checkInDate);
        $c->setCheckOutDate($json_decoded->checkOutDate);
        
        $c->setUserFirstName($json_decoded->userFirstName);
        $c->setUserLastName($json_decoded->userLastName);
        $c->setUserBirthDate($json_decoded->userBirthDate);
        $c->setUserAddress($json_decoded->userAddress);
        $c->setUserPLZ($json_decoded->userPLZ);
        $c->setUserEMail($json_decoded->userEMail);
        
        $c->setAlternateCheck($json_decoded->alternateCheck);
        
        $c->setUserFirstNameAlternate($json_decoded->userFirstNameAlternate);
        $c->setUserLastNameAlternate($json_decoded->userLastNameAlternate);
        $c->setUserBirthDateAlternate($json_decoded->userBirthDateAlternate);
        $c->setUserAddressAlternate($json_decoded->userAddressAlternate);
        $c->setUserPLZAlternate($json_decoded->userPLZAlternate);
        
        foreach ($json_decoded->items as $item) {
            $i = new Item();
            $i->setRoomTypeIdentifier($item->roomTypeIdentifier);
            $i->setRoomTypeQuantity($item->roomTypeQuantity);
            $i->setBoardingIdentifier($item->boardingIdentifier);
            $i->setSpecialIdentifier($item->specialsIdentifier);
            $c->addItem($i);
        }

        // $totalPrice = $em->getRepository('AppBundle:Cart')->calculateTotalPrice($c); // Zugriff über EntityRepository

        // $totalPriceJSON = json_encode($totalPrice, 320); // 320 : 0000000101000000 = 256 + 64 : JSON_UNESCAPED_SLASHES => 64 + JSON_UNESCAPED_UNICODE => 256

        $resp = new Response($totalPriceJSON);
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
