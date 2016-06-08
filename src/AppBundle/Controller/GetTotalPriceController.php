<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Item;

class GetTotalPriceController extends Controller {

    /**
     * @Route("/api/v0/getTotalPrice", name="getTotalPrice_v_0")
     */
    public function getTotalPriceAction_v_0(Request $request) {

        $input = $request->getContent();

        $em = $this->getDoctrine()->getManager();

//        $input = '
//            {
//	"checkInDate": "2016.01.10, 12:00",
//	"checkOutDate": "2016.01.16, 12:00",
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
                    "Error. Malformed request syntax. No Data."
                    . " "
            );
            $resp->setStatusCode(Response::HTTP_BAD_REQUEST); // 400
            $resp->headers->set('Content-Type', 'Content-Type: text/html; charset=utf-8');
            return $resp;
        }

        $input_sanitized = str_replace(array("\n", "\t", "\r"), '', $input); // remove newlines , tabs , carriage return

        $json_decoded = json_decode($input_sanitized, false); // false -> object , true -> array // NULL if not JSON

        if (!$json_decoded) {
            return (new Response("Error: input not json conform."))->setStatusCode('400'); // HTTP_BAD_REQUEST
        }

        try {
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
            }
        } catch (\Exception $e) {
            return (new Response("Error: input not accepted - schema not conform."))->setStatusCode('400'); // HTTP_BAD_REQUEST
        }

        $totalPrice = $em->getRepository('AppBundle:Cart')->calculateTotalPrice($c); // Zugriff über EntityRepository

        $totalPriceJSON = json_encode($totalPrice, 320); // 320 : 0000000101000000 = 256 + 64 : JSON_UNESCAPED_SLASHES => 64 + JSON_UNESCAPED_UNICODE => 256

        $resp = new Response($totalPriceJSON);
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
