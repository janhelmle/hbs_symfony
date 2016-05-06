<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;
use AppBundle\Entity\RoomType;
use AppBundle\Entity\AdditionalProduct;
use AppBundle\Entity\ProductCategory;

class GetInitialDataController extends Controller {

    /**
     * @Route("/api/v0/getinitialdata", name="getinitialdata")
     */
    public function getInitialDataAction(Request $request) {

	$em = $this->getDoctrine()->getManager();

	$query = $em->createQuery('
                SELECT 
                
                p.identifier , 
                p.displayShort , 
                p.displayLong , 
                p.pricingBasisDisplay , 
                p.capacity 
                 
                FROM AppBundle:RoomType p
		
		ORDER BY p.positionInSubMenu ASC
                
                ');

	$roomtypes = $query->getResult();

	$query = $em->createQuery("
                SELECT 
                
                a.identifier , 
                a.displayShort , 
                a.displayLong , 
                a.pricingBasisDisplay  
                
                FROM AppBundle:AdditionalProduct a
                JOIN a.productcategory p
                WHERE p.identifier = 'boarding'
		
		ORDER BY a.positionInList ASC
                
                ");

	$boardings = $query->getResult();

	$query = $em->createQuery("
                SELECT 
                
                a.identifier , 
                a.displayShort , 
                a.displayLong , 
                a.pricingBasisDisplay
                
                FROM AppBundle:AdditionalProduct a
                JOIN a.productcategory p
                WHERE p.identifier = 'specials'
		
		ORDER BY a.positionInList ASC
                
                ");

	$specials = $query->getResult();



	$products = array(
	    'roomtypes' => $roomtypes,
	    'boardings' => $boardings,
	    'specials' => $specials
	);

	$productsJSON = json_encode($products, 320);

	$resp = new Response($productsJSON);
	$resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

	return $resp;
    }

}
