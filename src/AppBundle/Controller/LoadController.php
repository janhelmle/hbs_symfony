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

class LoadController extends Controller {

    /**
     * @Route("/load", name="load")
     */
    public function loadAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
                SELECT 
                
                p.identifier , 
                p.displayShort , 
                p.displayLong , 
                p.pricingBasisDisplay , 
                p.capacity , 
                p.quantityOfPersons ,
                p.positionInSubMenu 
                 
                FROM AppBundle:RoomType p
                
                ');

        $products = $query->getResult();

        // dump($products);

        $products = array(
            'roomtypes' => $products
        );

        $jsonout = json_encode($products, 320);

        $resp = new Response($jsonout);
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
