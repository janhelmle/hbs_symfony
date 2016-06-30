<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use stdClass;
use DateTime;
use AppBundle\Entity\CheckInOutDateTime;

class GetPricesAndAvailabilitiesController extends Controller {

    /**
     * @Route("/api/v0.3/getpricesandavailabilities", name="getpricesandavailabilities_v_0.3")
     */
    public function getPricesAndAvailabilitiesAction_v_03(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $dto = new stdClass(); // new Data Transfer Object

        $checkInDateFromApp = $request->headers->get('checkInDate'); // 2016.04.26, 12:00
        $checkOutDateFromApp = $request->headers->get('checkOutDate'); // 2016.04.27, 12:00

        // $checkInDateFromApp = '2016.07.26, 12:00';
        // $checkOutDateFromApp = '2016.07.27, 12:00';

        $ciodt = new CheckInOutDateTime();
        $ciodt->setCheckInOutDateTime($checkInDateFromApp, $checkOutDateFromApp);

        $validator = $this->get('validator');
        $errors = $validator->validate($ciodt);

        if (count($errors) > 0) {
            return (new Response((string) $errors))->setStatusCode(Response::HTTP_BAD_REQUEST); // ->headers->set('Content-Type', 'text/html ; charset=utf-8');
        }

        $dto->checkInDate = $ciodt->getCheckInDateTime()->format('Y.m.d, H:i');
        $dto->checkOutDate = $ciodt->getCheckOutDateTime()->format('Y.m.d, H:i');


        $roomTypes = $em->getRepository('AppBundle:RoomType')->findAllWhereCapacityGreaterZeroOrderedByPositionInSubMenu(); // array of RoomType objects

        foreach ($roomTypes as $rt) {
            $i = new stdClass();
            $i->identifier = $rt->getIdentifier();
            $i->price = $em->getRepository('AppBundle:Price')
                    ->calculatePriceAveragePerProductAndDateInterval($rt, $ciodt->getCheckInDateTime(), $ciodt->getCheckOutDateTime());
            $i->quantity = $em->getRepository('AppBundle:Availability')->findAvailability($ciodt, $rt);
            $dto->roomTypes[] = $i;
        }


        $boardings = $em->getRepository('AppBundle:AdditionalProduct')->findAllBoardingsOrderedByPositionInList(); // array of AdditionalProduct objects

        foreach ($boardings as $b) {
            $i = new stdClass();
            $i->identifier = $b->getIdentifier();
            $i->price = $em->getRepository('AppBundle:Price')
                    ->calculatePriceAveragePerProductAndDateInterval($b, $ciodt->getCheckInDateTime(), $ciodt->getCheckOutDateTime());
            $dto->boardings[] = $i;
        }


        $specials = $em->getRepository('AppBundle:AdditionalProduct')->findAllSpecialsOrderedByPositionInList(); // array of AdditionalProduct objects

        foreach ($specials as $s) {
            $i = new stdClass();
            $i->identifier = $s->getIdentifier();
            $i->price = $em->getRepository('AppBundle:Price')
                    ->calculatePriceAveragePerProductAndDateInterval($s, $ciodt->getCheckInDateTime(), $ciodt->getCheckOutDateTime());
            $dto->specials[] = $i;
        }

        $pandaJSON = json_encode($dto, 320); // 320 : 0000000101000000 = 256 + 64 : JSON_UNESCAPED_SLASHES => 64 + JSON_UNESCAPED_UNICODE => 256
        $resp = new Response($pandaJSON);
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

    /**
     * @Route("/api/v0.2/getpricesandavailabilities", name="getpricesandavailabilities_v_0.2")
     */
    public function getPricesAndAvailabilitiesAction_v_02(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $dto = new stdClass(); // new Data Transfer Object

        $checkInDateFromApp = $request->headers->get('checkInDate'); // 2016.04.26, 12:00
        $checkOutDateFromApp = $request->headers->get('checkOutDate'); // 2016.04.27, 12:00

        $checkInDateTime = DateTime::createFromFormat('Y.m.d, H:i', $checkInDateFromApp);
        $checkOutDateTime = DateTime::createFromFormat('Y.m.d, H:i', $checkOutDateFromApp);

        if (
                (!$checkInDateTime) OR ( !$checkOutDateTime)
        ) {
            $resp = new Response(
                    "Error. Malformed request syntax. "
                    . "Please use header keys 'checkInDate' and 'checkOutDate' with values in this form : "
                    . "'Y.m.d, H:i' , e.g. '2016.04.26, 12:00'"
            );
            $resp->setStatusCode(Response::HTTP_BAD_REQUEST); // 400
            $resp->headers->set('Content-Type', 'Content-Type: text/html; charset=utf-8');
            return $resp;
        }

        if (
                $checkInDateTime >= $checkOutDateTime
        ) {
            $resp = new Response(
                    "Error: checkInDate >= checkOutDate. Please try again with the correct settings."
            );
            $resp->setStatusCode(Response::HTTP_BAD_REQUEST); // 400
            $resp->headers->set('Content-Type', 'Content-Type: text/html; charset=utf-8');
            return $resp;
        }

        $diff = $checkInDateTime->diff($checkOutDateTime);

        if (($diff->days) > 365) {
            $resp = new Response(
                    "Error: Interval too big."
            );
            $resp->setStatusCode(Response::HTTP_BAD_REQUEST); // 400
            $resp->headers->set('Content-Type', 'Content-Type: text/html; charset=utf-8');
            return $resp;
        };

        $ciodt = new \AppBundle\Entity\CheckInOutDateTime();
        $ciodt->setCheckInDateTime($checkInDateTime)->setCheckOutDateTime($checkOutDateTime);

        $validator = $this->get('validator');
        $errors = $validator->validate($ciodt);

        $dto->checkInDate = $checkInDateFromApp;
        $dto->checkOutDate = $checkOutDateFromApp;

        $roomTypes = $em->getRepository('AppBundle:RoomType')->findAllWhereCapacityGreaterZeroOrderedByPositionInSubMenu(); // array of RoomType objects

        foreach ($roomTypes as $rt) {
            $i = new stdClass();
            $i->identifier = $rt->getIdentifier();
            $i->price = $em->getRepository('AppBundle:Price')
                    ->calculatePriceAveragePerProductAndDateInterval($rt, $checkInDateTime, $checkOutDateTime);
            $i->quantity = $em->getRepository('AppBundle:Availability')->findAvailability($ciodt, $rt);
            $dto->roomTypes[] = $i;
        }

        $boardings = $em->getRepository('AppBundle:AdditionalProduct')->findAllBoardingsOrderedByPositionInList(); // array of AdditionalProduct objects

        foreach ($boardings as $b) {
            $i = new stdClass();
            $i->identifier = $b->getIdentifier();
            $i->price = $em->getRepository('AppBundle:Price')
                    ->calculatePriceAveragePerProductAndDateInterval($b, $checkInDateTime, $checkOutDateTime);
            $dto->boardings[] = $i;
        }

        $specials = $em->getRepository('AppBundle:AdditionalProduct')->findAllSpecialsOrderedByPositionInList(); // array of AdditionalProduct objects

        foreach ($specials as $s) {
            $i = new stdClass();
            $i->identifier = $s->getIdentifier();
            $i->price = $em->getRepository('AppBundle:Price')
                    ->calculatePriceAveragePerProductAndDateInterval($s, $checkInDateTime, $checkOutDateTime);
            $dto->specials[] = $i;
        }

        $pandaJSON = json_encode($dto, 320); // 320 : 0000000101000000 = 256 + 64 : JSON_UNESCAPED_SLASHES => 64 + JSON_UNESCAPED_UNICODE => 256

        $resp = new Response($pandaJSON);
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

    /**
     * @Route("/api/v0.1/getpricesandavailabilities", name="getpricesandavailabilities_v_0.1")
     */
    public function getPricesAndAvailabilitiesAction_v_01(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $checkInDate = $request->headers->get('checkInDate'); // 2016.04.26, 12:00
        $checkOutDate = $request->headers->get('checkOutDate'); // 2016.04.27, 12:00

        $checkInDate = '2016.04.26, 12:00';
        $checkOutDate = '2016.04.27, 12:00';

        $checkInDateTime = DateTime::createFromFormat('Y.m.d, H:i', $checkInDate);
        $checkOutDateTime = DateTime::createFromFormat('Y.m.d, H:i', $checkOutDate);

        if (
                !$checkInDateTime OR ! $checkOutDateTime
        ) {


            $resp = new Response(
                    "Error. Malformed request syntax. "
                    . "Please use header keys 'checkInDate' and 'checkOutDate' with values in this form : "
                    . "'Y.m.d, H:i'"
            );
            $resp->setStatusCode(Response::HTTP_BAD_REQUEST);
            $resp->headers->set('Content-Type', 'Content-Type: text/html; charset=utf-8');
            return $resp;
        }

        $dto = new stdClass();

        $dto->checkInDate = $checkInDate;
        $dto->checkOutDate = $checkOutDate;


        $query = $em->createQuery('

                SELECT
                    rt
                FROM
                    AppBundle:RoomType rt
                WHERE rt.enabled = TRUE

                ');

        $roomTypes = $query->getResult();

        foreach ($roomTypes as $rt) {
            $i = new stdClass();
            $i->identifier = $rt->getIdentifier();
            $i->price = $rt->getPrices()[0]->getValue(); // TODO
            $i->quantity = $rt->getAvailabilities()[0]->getQuantity(); // TODO
            $dto->roomTypes[] = $i;
        }

        $query = $em->createQuery("

                SELECT
                    ap
                FROM
                    AppBundle:AdditionalProduct ap
                JOIN
                    ap.additionalProductCategory apc
                WHERE
                    apc.identifier = 'boardings'
                AND ap.enabled = TRUE

                ");

        $additionalProducts = $query->getResult();

        foreach ($additionalProducts as $ap) {
            $i = new stdClass();
            $i->identifier = $ap->getIdentifier();
            $i->price = $ap->getPrices()[0]->getValue();
            $dto->boardings[] = $i;
        }

        $query = $em->createQuery("

                SELECT
                    ap
                FROM
                    AppBundle:AdditionalProduct ap
                JOIN
                    ap.additionalProductCategory apc
                WHERE
                    apc.identifier = 'specials'
                AND ap.enabled = TRUE

                ");

        $additionalProducts = $query->getResult();

        foreach ($additionalProducts as $ap) {
            $i = new stdClass();
            $i->identifier = $ap->getIdentifier();
            $i->price = $ap->getPrices()[0]->getValue();
            $dto->specials[] = $i;
        }

        $pandaJSON = json_encode($dto, 320); // 320 : 0000000101000000 = 256 + 64 : JSON_UNESCAPED_SLASHES => 64 + JSON_UNESCAPED_UNICODE => 256

        $resp = new Response($pandaJSON);
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

    /**
     * @Route("/api/v0/getpricesandavailabilities", name="getpricesandavailabilities_v_0")
     */
    public function getPricesAndAvailabilitiesAction_v_0(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("
                SELECT

                    ap.identifier ,
                    MAX(pri.value) AS price

                FROM AppBundle:AdditionalProduct ap

                JOIN ap.prices pri

                JOIN ap.additionalProductCategory apc

                WHERE ap.enabled = TRUE

                AND pri.date < '2099.01.01'

                GROUP BY ap.identifier

                ORDER BY apc.positionInSubMenu , ap.positionInList

                ");

        $additionalproducts = $query->getResult();


        $query = $em->createQuery("
                SELECT

                    rt.identifier ,
                    MIN(av.quantity) AS quantity ,
                    MAX(pr.value) AS price

                FROM AppBundle:RoomType rt

                JOIN rt.availabilities av

                JOIN rt.prices pr

                WHERE av.quantity > 0

                AND rt.enabled = TRUE

                AND av.date < '2099.01.01'

                AND pr.date < '2099.01.01'

                GROUP BY rt.identifier

                ORDER BY rt.positionInSubMenu

                ");

        $roomtypes = $query->getResult();

        $out = array_merge($roomtypes, $additionalproducts);


        $resp = new Response(json_encode($out));
        $resp->headers->set('Content-Type', 'application/json ; charset=utf-8');

        return $resp;
    }

}
