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
use stdClass;

class GetInitialDataController extends Controller {

    /**
     * @Route("/api/v0.1/getinitialdata", name="getinitialdatav0.1")
     */
    public function getInitialDataActionv01(Request $request) {

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


//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()} = new stdClass();
//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()}->subMenuText = $roomtypesQueryResult[0]->getSubMenuText();
//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()}->listText = $roomtypesQueryResult[0]->getListText();
//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()}->pricingBasisText = $roomtypesQueryResult[0]->getPricingBasisText();
//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()}->capacity = $roomtypesQueryResult[0]->getCapacity();
//        $test = array();
//
//        foreach ($roomtypesQueryResult as $rt) {
//            array_push($test, [
//            $rt->getIdentifier() => [
//                'capacity' => $rt->getCapacity(),
//                'subMenuText' => $rt->getSubMenuText()
//                ]
//            ]
//            );
//        }
//        ;
//        array_push($test, [
//            $roomtypesQueryResult[0]->getIdentifier() => [
//                'capacity' => $roomtypesQueryResult[0]->getCapacity() ,
//                'subMenuText' => $roomtypesQueryResult[0]->getSubMenuText()
//            ]
//        ]);
//        $test[1]=[
//            $roomtypesQueryResult[1]->getIdentifier() => [
//                'capacity' => $roomtypesQueryResult[1]->getCapacity() ,
//                'subMenuText' => $roomtypesQueryResult[1]->getSubMenuText()
//            ]
//        ];
        // echo(json_encode($test));
        // dump($test);
        // echo(json_encode($roomtypesQueryResult[0]));
//        $test = array();
//        
//        foreach($roomtypesQueryResult as $rt) {
//            array_push($test, json_serialize($rt));
//        }
//        
//        dump($test);
//        r.identifier ,
//                r.subMenuText ,
//                r.listText ,
//                r.capacity ,
//                r.pricingBasisText
//        $test = array(
//            $roomtypesQueryResult[0]['identifier'] => array(
//                "subMenuText"       => $roomtypesQueryResult[0]['subMenuText'] ,
//                "listText"          => $roomtypesQueryResult[0]['listText'] , 
//                "capacity"          => $roomtypesQueryResult[0]['capacity'] ,
//                "pricingBasisText"  => $roomtypesQueryResult[0]['pricingBasisText'] ,
//            )
//            
//        );
        // echo(json_encode($test));

        $query = $em->createQuery("
                SELECT 
                
                b 
                
                FROM AppBundle:AdditionalProduct b
                JOIN b.productcategory pc
                WHERE pc.identifier = 'boardings'
		
		ORDER BY b.positionInList ASC
                
                ");

        $boardings = $query->getResult();

        $dto->boardings = new stdClass();
        foreach ($boardings as $b) {
            $dto->boardings->{$b->getidentifier()} = new stdClass();
            $dto->boardings->{$b->getidentifier()}->listText = $b->getListText();
            $dto->boardings->{$b->getidentifier()}->pricingBasisText = $b->getpricingBasisText();
        }




        $query = $em->createQuery("
                SELECT 
                
                s
                
                FROM AppBundle:AdditionalProduct s
                JOIN s.productcategory pc
                WHERE pc.identifier = 'specials'
		
		ORDER BY s.positionInList ASC
                
                ");

        $specials = $query->getResult();
        $dto->specials = new stdClass();
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
     * @Route("/api/v0/getinitialdata", name="getinitialdatav0")
     */
    public function getInitialDataActionv0(Request $request) {

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
                JOIN a.productcategory p
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
