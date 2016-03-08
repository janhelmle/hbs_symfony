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

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('
                SELECT a.priority , a.title , a.data , a.type , a.image , a.background_color
                FROM AppBundle:AppMenu a
                WHERE a.enabled = TRUE
                ORDER BY a.priority ASC
                ');
        $menu = $query->getResult();
        
        $jsonContent = $serializer->serialize($menu , 'json');
        
        $resp = new Response($jsonContent);
        $resp->headers->set('Content-Type', 'application/json');

        return $resp;
    }

}
