<?php

namespace AppBundle\Entity;

use DateTime;

/**
 * CartRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CartRepository extends \Doctrine\ORM\EntityRepository {

    public function calculateTotalPrice(Cart $c) {

        if (is_string($c->getCheckInDate()) && is_string($c->getCheckOutDate())) { // eventuell in DateTime Objekt konvertieren
            $checkInDateTime = DateTime::createFromFormat('Y.m.d, H:i', $c->getCheckInDate());
            $checkOutDateTime = DateTime::createFromFormat('Y.m.d, H:i', $c->getCheckOutDate());
        }

        $em = $this->getEntityManager();

        $sum = 0;

        foreach ($c->getItems() as $item) {

            $query = $em->createQuery(
                    'SELECT prod FROM AppBundle:Product prod WHERE prod.identifier = ?1'
            );
            $query->setParameter(1, $item->getRoomTypeIdentifier());

            $roomTypeObject = $query->getOneOrNullResult(); // 0 or 1 RoomType object

            if (!$roomTypeObject) {
                throw new \Exception('Error. No RoomType Found: ' . $item->getRoomTypeIdentifier());
            }

            $roomTypePrice = $em->getRepository('AppBundle:Price')->calculateTotalAmountPerProductAndDateInterval($roomTypeObject, $checkInDateTime, $checkOutDateTime);


            $sum += $roomTypePrice * $item->getRoomTypeQuantity();



            $query = $em->createQuery(
                    'SELECT prod FROM AppBundle:Product prod WHERE prod.identifier = ?1'
            );
            $query->setParameter(1, $item->getBoardingIdentifier());

            $boardingObject = $query->getOneOrNullResult(); // 0 or 1 AdditionalProduct Object (boarding)

            if (!$boardingObject) {
                throw new \Exception('Error. No Boarding Found: ' . $item->getBoardingIdentifier());
            }

            $boardingPrice = $em->getRepository('AppBundle:Price')->calculateTotalAmountPerProductAndDateInterval($boardingObject, $checkInDateTime, $checkOutDateTime);


            $sum += $boardingPrice * $roomTypeObject->getQuantityOfPersons();



            $query = $em->createQuery(
                    'SELECT prod FROM AppBundle:Product prod WHERE prod.identifier = ?1'
            );
            $query->setParameter(1, $item->getSpecialIdentifier());

            $specialObject = $query->getOneOrNullResult(); // 1 AdditionalProduct Object (special)

            if (!$specialObject) {
                throw new \Exception('Error. No Special Found: ' . $item->getSpecialIdentifier());
            }

            $specialPrice = $em->getRepository('AppBundle:Price')->calculateTotalAmountPerProductAndDateInterval($specialObject, $checkInDateTime, $checkOutDateTime);

            $sum += $specialPrice;
        }

        return round($sum, 2);
    }

}
