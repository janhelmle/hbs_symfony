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

class GetPricesAndAvailabilitiesController extends Controller {

    /**
     * @Route("/api/v0/getpricesandavailabilities", name="getpricesandavailabilities")
     */
    public function getPricesAndAvailabilitiesAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
                SELECT 
                
                p.identifier
                
                FROM AppBundle:Product p
                
                ');

        $products = $query->getResult();

        dump($products);







        $resp = new Response("<body></body>");
        // $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
