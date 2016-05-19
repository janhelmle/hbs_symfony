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
use AppBundle;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();

        $input = '
            {
	"checkInDate": "2016.08.07, 12:00",
	"checkOutDate": "2016.09.02, 12:00",
	"items": [{
		"roomTypeIdentifier": "singleroom",
		"quantity": 1,
		"boardingIdentifier": "noboarding",
		"specialsIdentifier": 
			"champagnebreakfast"
			
		
	}, {
		"roomTypeIdentifier": "doubleroom",
		"quantity": 1,
		"boardingIdentifier": "halfpension",
		"specialsIdentifier": 
			"raftingtour"
		
	}, {
		"roomTypeIdentifier": "doubleroom",
		"quantity": 2,
		"boardingIdentifier": "fullpension",
		"specialsIdentifier": 
			"champagnebreakfast"
		
	}]
}
';


        $input_sanitized = str_replace(array("\n", "\t", "\r"), '', $input);

        

        $json_decoded = json_decode($input_sanitized, false);
        //$json_decoded = json_decode(json_encode($json_decoded),true);
        dump($json_decoded);
        
        $test = new Cart();
        dump(get_class($json_decoded));

//        echo "<br> checkInDate: " . $json_decoded["checkInDate"];
//        echo "<br> checkOutDate: " . $json_decoded["checkOutDate"];
//        echo "<br> rooms...: " . $json_decoded["items"][0]["roomTypeIdentifier"];
//
//        $rooms = $json_decoded["items"];


//        foreach($json_decoded['rooms'] as $k => $v) {
//            dump($k);
//        }
        //dump(get_object_vars($json_decoded->rooms));
//        $em->persist($deserialized);
//        $em->flush();


        $resp = new Response('<body></body>');
        //$resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
