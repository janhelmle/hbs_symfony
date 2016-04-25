<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\RoomType;

class LoadController extends Controller {

    /**
     * @Route("/load", name="load")
     */
    public function loadAction(Request $request) {

	$em = $this->getDoctrine()->getManager();
        
        $rt1 = new RoomType();
        $rt1->setIdentifier("singleroom");
        $rt1->setDisplayLong("Einzelzimmer");
        $rt1->setDisplayShort("Einzel");
        $rt1->setCapacity("5");
        $rt1->setPositionInSubMenu("1");
        $rt1->setPricingBasis("pernight");
        $rt1->setPricingBasisDisplay("/Nacht");
        $rt1->setQuantityOfPersons("1");
        
        
        
        // $em->persist($product);

	return new Response("<body></body>");
    }

}
