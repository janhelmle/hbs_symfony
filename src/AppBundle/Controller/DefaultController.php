<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('
                SELECT 
                
                p

                FROM AppBundle:Product p
                
                WHERE p INSTANCE OF \AppBundle\Entity\RoomType
                
                ');

        $roomTypesQueryResult = $query->getResult();

        $pr = $em->getRepository('AppBundle:Price')
                ->findLatestPricePerProductAndDate($roomTypesQueryResult[0], new \DateTime('2016-01-15'));

        $pr = $em->getRepository('AppBundle:Price')
                ->calculatePriceAveragePerProductAndDateInterval($roomTypesQueryResult[0], new \DateTime('2016-01-10'), new \DateTime('2016-01-16'));

        dump($pr);
        
        $resp = new Response('<body></body>');

        return $resp;
    }

}
