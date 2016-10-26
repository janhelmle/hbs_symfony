<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller {

    /**
     * @Route("/api/getinitialdata", name="getinitialdata")
     */
    public function getInitialDataAction(Request $request) {
        return $this->forward('AppBundle\Controller\MamInternal\GetInitialDataController::getInitialData_v_01_Action');
    }

    /**
     * @Route("/api/getpricesandavailabilities", name="getpricesandavailabilities")
     */
    public function getPricesAndAvailabilitiesAction(Request $request) {
        return $this->forward('AppBundle\Controller\MamInternal\GetPricesAndAvailabilitiesController::getPricesAndAvailabilities_v_03_Action');
    }

    // dummy - needs to give parameters
    /**
     * @Route("/api/gettotalprice", name="gettotalprice")
     */
    public function getTotalPriceAction(Request $request) {
        return $this->forward('AppBundle\Controller\MamInternal\GetTotalPriceController::getTotalPrice_v_0_Action');
    }
    
    // dummy - needs to give parameters
    /**
     * @Route("/api/postorder", name="postorder")
     */
    public function postOrderAction(Request $request) {
        return $this->forward('AppBundle\Controller\MamInternal\PostOrderController::postOrder_v_0_Action');
    }

}
