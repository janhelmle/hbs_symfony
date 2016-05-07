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

        // dump($roomtypesQueryResult[0]->getPrices()[0]->getPrice());

        $dto = new stdClass();

        $dto->typeofrooms = new stdClass();
        foreach ($roomtypesQueryResult as $rt) {
            $dto->typeofrooms->{$rt->getidentifier()} = new stdClass();
            $dto->typeofrooms->{$rt->getidentifier()}->textSubMenu = $rt->getTextSubMenu();
            $dto->typeofrooms->{$rt->getidentifier()}->textList = $rt->getTextList();
            $dto->typeofrooms->{$rt->getidentifier()}->pricingBasisText = $rt->getPricingBasisText();
            $dto->typeofrooms->{$rt->getidentifier()}->capacity = $rt->getCapacity();
        }


//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()} = new stdClass();
//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()}->textSubMenu = $roomtypesQueryResult[0]->getTextSubMenu();
//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()}->textList = $roomtypesQueryResult[0]->getTextList();
//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()}->pricingBasisText = $roomtypesQueryResult[0]->getPricingBasisText();
//        $dto->typeofrooms->{$roomtypesQueryResult[0]->getidentifier()}->capacity = $roomtypesQueryResult[0]->getCapacity();
//        $test = array();
//
//        foreach ($roomtypesQueryResult as $rt) {
//            array_push($test, [
//            $rt->getIdentifier() => [
//                'capacity' => $rt->getCapacity(),
//                'textSubMenu' => $rt->getTextSubMenu()
//                ]
//            ]
//            );
//        }
//        ;
//        array_push($test, [
//            $roomtypesQueryResult[0]->getIdentifier() => [
//                'capacity' => $roomtypesQueryResult[0]->getCapacity() ,
//                'textSubMenu' => $roomtypesQueryResult[0]->getTextSubMenu()
//            ]
//        ]);
//        $test[1]=[
//            $roomtypesQueryResult[1]->getIdentifier() => [
//                'capacity' => $roomtypesQueryResult[1]->getCapacity() ,
//                'textSubMenu' => $roomtypesQueryResult[1]->getTextSubMenu()
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
//                r.textSubmenu ,
//                r.textList ,
//                r.capacity ,
//                r.pricingBasisText
//        $test = array(
//            $roomtypesQueryResult[0]['identifier'] => array(
//                "textSubmenu"       => $roomtypesQueryResult[0]['textSubmenu'] ,
//                "textList"          => $roomtypesQueryResult[0]['textList'] , 
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
            $dto->boardings->{$b->getidentifier()}->textList = $b->getTextList();
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
            $dto->specials->{$s->getidentifier()}->textList = $s->getTextList();
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
                p.textSubMenu , 
                p.textList , 
                p.pricingBasisText , 
                p.capacity 
                 
                FROM AppBundle:RoomType p
		
		ORDER BY p.positionInSubMenu ASC
                
                ');

	$roomtypes = $query->getResult();

	$query = $em->createQuery("
                SELECT 
                
                a.identifier , 
                
                a.textList , 
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
                
                a.textList , 
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
