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

class GetPricesAndAvailabilitiesController extends Controller {

    /**
     * @Route("/api/v0/getpricesandavailabilities", name="getpricesandavailabilities")
     */
    public function getPricesAndAvailabilitiesAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
                SELECT 
                
                    prod.identifier ,
                    pri.value 
                
                FROM AppBundle:Price pri
                
                JOIN pri.product prod
                
                WHERE prod INSTANCE OF \AppBundle\Entity\AdditionalProduct
                
                ');

        $additionalproducts = $query->getResult();
        

        $query = $em->createQuery('
            
                SELECT 
                
                    rt.identifier ,
                    av.quantity ,
                    pr.value AS price
                
                FROM AppBundle:RoomType rt
                
                JOIN rt.availabilities av
                
                JOIN rt.prices pr 
                
                ');
        
        $roomtypes = $query->getResult();
        
        $out = array_merge($roomtypes , $additionalproducts);
        

        $resp = new Response(json_encode($out));
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
