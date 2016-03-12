<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class AppMenuController extends Controller {

    /**
     * @Route("/api/v0/appmenu", name="appmenu")
     */
    public function appMenuAction(Request $request) {

        // Symfony Components : The Serializer Component 
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        // End Symfony Components

        // Symfony Book : Databases and Doctrine , S 107
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('
                SELECT 
                
                a.identification , 
                a.title_de , 
                a.title_en , 
                a.data_url , 
                a.data_type , 
                a.image_source ,
                a.image_background_color ,
                a.image_background_alpha 
                
                FROM AppBundle:AppMenu a
                
                WHERE a.enabled = TRUE
                
                ORDER BY 
                
                a.priority ASC , 
                a.title_en ASC , 
                a.title_de ASC 
                ');
        $menu = $query->getResult();
        // End Symfony Book

        // Symfony Components : The Serializer Component
        $jsonContent = $serializer->serialize($menu, 'json');
        // End Symfony Components
        
        $resp = new Response($jsonContent);
        //$resp = new Response(str_replace("\\", "", $jsonContent));
        
        $resp->headers->set('Content-Type', 'application/json');

        return $resp;
    }

}
