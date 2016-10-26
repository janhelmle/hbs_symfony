<?php

namespace AppBundle\Controller\MamInternal;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use stdClass;

class GetInitialDataController extends Controller {

    /**
     * @Route("/api/v0.1/getinitialdata", name="getinitialdata_v_0.1")
     */
    public function getInitialData_v_01_Action(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $dto = new stdClass(); // neues Data Transfer Object


        $roomTypes = $em->getRepository('AppBundle:RoomType')->findAllWhereCapacityGreaterZeroOrderedByPositionInSubMenu(); // array of RoomType objects

        $dto->roomTypes = new stdClass();
        foreach ($roomTypes as $rt) {
            $dto->roomTypes->{$rt->getidentifier()} = new stdClass();
            $dto->roomTypes->{$rt->getidentifier()}->subMenuText = $rt->getSubMenuText();
            $dto->roomTypes->{$rt->getidentifier()}->listText = $rt->getListText();
            $dto->roomTypes->{$rt->getidentifier()}->pricingBasisText = $rt->getPricingBasisText();
            $dto->roomTypes->{$rt->getidentifier()}->capacity = $rt->getCapacity();
        }


        $boardings = $em->getRepository('AppBundle:AdditionalProduct')->findAllBoardingsOrderedByPositionInList(); // array of Boarding objects

        $dto->boardings = new stdClass();
        $dto->boardings->subMenuText = $boardings[0]->getAdditionalProductCategory()->getSubMenuText(); // 'Verpflegung'
        foreach ($boardings as $b) {
            $dto->boardings->{$b->getidentifier()} = new stdClass();
            $dto->boardings->{$b->getidentifier()}->listText = $b->getListText();
            $dto->boardings->{$b->getidentifier()}->pricingBasisText = $b->getpricingBasisText();
        }


        $specials = $em->getRepository('AppBundle:AdditionalProduct')->findAllSpecialsOrderedByPositionInList(); // array of Special objects

        $dto->specials = new stdClass();
        $dto->specials->subMenuText = $specials[0]->getAdditionalProductCategory()->getSubMenuText(); // 'Specials (optional)'
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
    public function getInitialData_v_0_Action(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
                SELECT 
                
                p.identifier , 
                p.subMenuText , 
                p.listText , 
                p.pricingBasisText , 
                p.capacity 
                 
                FROM AppBundle:RoomType p
                
                WHERE p.enabled = TRUE
		
		ORDER BY p.positionInSubMenu ASC
                
                ');

        $roomtypes = $query->getResult();

        $query = $em->createQuery("
                SELECT 
                
                a.identifier , 
                
                a.listText , 
                a.pricingBasisText  
                
                FROM AppBundle:AdditionalProduct a
                JOIN a.additionalProductCategory p
                WHERE p.identifier = 'boardings'
                AND a.enabled = TRUE
		
		ORDER BY a.positionInList ASC
                
                ");

        $boardings = $query->getResult();

        $query = $em->createQuery("
                SELECT 
                
                a.identifier , 
                
                a.listText , 
                a.pricingBasisText
                
                FROM AppBundle:AdditionalProduct a
                JOIN a.additionalProductCategory p
                WHERE p.identifier = 'specials'
                AND a.enabled = TRUE
		
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
