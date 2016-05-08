<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;
use AppBundle\Entity\RoomType;
use AppBundle\Entity\AdditionalProduct;
use AppBundle\Entity\AdditionalProductCategory;
use stdClass;

class GetInitialDataController extends Controller {

    /**
     * @Route("/api/v0.1/getinitialdata", name="getinitialdata_v_0.1")
     */
    public function getInitialDataAction_v_01(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
                SELECT 
                
                r 

                FROM AppBundle:RoomType r
                
                WHERE r.capacity > 0
                
                ORDER BY r.positionInSubMenu ASC
                
                ');

        $roomtypesQueryResult = $query->getResult();

        
        $dto = new stdClass();

        $dto->typeofrooms = new stdClass();
        foreach ($roomtypesQueryResult as $rt) {
            $dto->typeofrooms->{$rt->getidentifier()} = new stdClass();
            $dto->typeofrooms->{$rt->getidentifier()}->subMenuText = $rt->getSubMenuText();
            $dto->typeofrooms->{$rt->getidentifier()}->listText = $rt->getListText();
            $dto->typeofrooms->{$rt->getidentifier()}->pricingBasisText = $rt->getPricingBasisText();
            $dto->typeofrooms->{$rt->getidentifier()}->capacity = $rt->getCapacity();
        }

        $query = $em->createQuery("
                SELECT 
                
                ap
                
                FROM AppBundle:AdditionalProduct ap
                JOIN ap.additionalproductcategory apc
                WHERE apc.identifier = 'boardings'
		
		ORDER BY ap.positionInList ASC
                
                ");

        $boardings = $query->getResult();
        
        $dto->boardings = new stdClass();
        $dto->boardings->subMenuText = $boardings[0]->getAdditionalProductCategory()->getSubMenuText();
        foreach ($boardings as $b) {
            $dto->boardings->{$b->getidentifier()} = new stdClass();
            $dto->boardings->{$b->getidentifier()}->listText = $b->getListText();
            $dto->boardings->{$b->getidentifier()}->pricingBasisText = $b->getpricingBasisText();
        }

        
        $query = $em->createQuery("
                SELECT 
                
                ap
                
                FROM AppBundle:AdditionalProduct ap
                JOIN ap.additionalproductcategory apc
                WHERE apc.identifier = 'specials'
		
		ORDER BY ap.positionInList ASC
                
                ");

        $specials = $query->getResult();
        
        $dto->specials = new stdClass();
        $dto->specials->subMenuText = $specials[0]->getAdditionalProductCategory()->getSubMenuText();
        foreach ($specials as $s) {
            $dto->specials->{$s->getidentifier()} = new stdClass();
            $dto->specials->{$s->getidentifier()}->listText = $s->getListText();
            $dto->specials->{$s->getidentifier()}->pricingBasisText = $s->getpricingBasisText();
        }


        $productsJSON = json_encode($dto, 320); // 320 : 0000000101000000 = 256 + 64 : JSON_UNESCAPED_SLASHES => 64 + JSON_UNESCAPED_UNICODE => 256

        $resp = new Response($productsJSON);
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }
    
    
    /**
     * @Route("/api/v0/getinitialdata", name="getinitialdata_v_0")
     */
    public function getInitialDataAction_v_0(Request $request) {

	$em = $this->getDoctrine()->getManager();

	$query = $em->createQuery('
                SELECT 
                
                p.identifier , 
                p.subMenuText , 
                p.listText , 
                p.pricingBasisText , 
                p.capacity 
                 
                FROM AppBundle:RoomType p
		
		ORDER BY p.positionInSubMenu ASC
                
                ');

	$roomtypes = $query->getResult();

	$query = $em->createQuery("
                SELECT 
                
                a.identifier , 
                
                a.listText , 
                a.pricingBasisText  
                
                FROM AppBundle:AdditionalProduct a
                JOIN a.additionalproductcategory p
                WHERE p.identifier = 'boardings'
		
		ORDER BY a.positionInList ASC
                
                ");

	$boardings = $query->getResult();

	$query = $em->createQuery("
                SELECT 
                
                a.identifier , 
                
                a.listText , 
                a.pricingBasisText
                
                FROM AppBundle:AdditionalProduct a
                JOIN a.additionalproductcategory p
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
