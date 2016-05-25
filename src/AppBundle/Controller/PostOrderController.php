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

        $input = '
            {
	"checkInDate": "2016.01.10, 12:00",
	"checkOutDate": "2016.01.16, 12:00",
        
        "userFirstName": "Anton",
        "userLastName": "Anders",
        "userBirthDate": "11.01.1991",
        "userAddress": "Antonstrasse 11",
        "userPlz": "12345 Astadt",
        "userEmail": "a@a.com",
        
        "alternateCheck": true,
        
        "userFirstNameAlternate": "Bernd",
        "userLastNameAlternate": "Bartel",
        "userBirthDateAlternate": "22.02.1992",
        "userAddressAlternate": "Berndstrasse 22",
        "userPlzAlternate": "54321 Bstadt",
        "userEmailAlternate": "a@a.com",

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
        $c->setUserPlz($json_decoded->userPlz);
        $c->setUserEmail($json_decoded->userEmail);

        $c->setAlternateCheck($json_decoded->alternateCheck);

        $c->setUserFirstNameAlternate($json_decoded->userFirstNameAlternate);
        $c->setUserLastNameAlternate($json_decoded->userLastNameAlternate);
        $c->setUserBirthDateAlternate($json_decoded->userBirthDateAlternate);
        $c->setUserAddressAlternate($json_decoded->userAddressAlternate);
        $c->setUserPlzAlternate($json_decoded->userPlzAlternate);
        $c->setUserEmailAlternate($json_decoded->userEmailAlternate);

        foreach ($json_decoded->items as $item) {
            $i = new Item();
            $i->setRoomTypeIdentifier($item->roomTypeIdentifier);
            $i->setRoomTypeQuantity($item->roomTypeQuantity);
            $i->setBoardingIdentifier($item->boardingIdentifier);
            $i->setSpecialIdentifier($item->specialsIdentifier);
            $c->addItem($i);
        }

        dump($c);
        
        // $totalPrice = $em->getRepository('AppBundle:Cart')->calculateTotalPrice($c); // Zugriff über EntityRepository
        // $totalPriceJSON = json_encode($totalPrice, 320); // 320 : 0000000101000000 = 256 + 64 : JSON_UNESCAPED_SLASHES => 64 + JSON_UNESCAPED_UNICODE => 256
        
        $destinationEmailAddress = $em->getRepository('AppBundle:Hotel')->getEmail();
        $sourceEmailAddress = "test@mam.de";
        $eMailSubject = "Neue Reservierung";
        
        $message = \Swift_Message::newInstance()
                ->setSubject($eMailSubject)
                ->setFrom($sourceEmailAddress)
                ->setTo($destinationEmailAddress)
                ->setBody('Body') 
        ;
        
        $this->get('mailer')->send($message);
        
        $resp = new Response('<body></body>');
        // $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
