<?php

namespace AppBundle\Entity;

use DateTime;
use DateInterval;
use DatePeriod;

/**
 * PriceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PriceRepository extends \Doctrine\ORM\EntityRepository { // returns price object

    public function findLatestPricePerProductAndDate(Product $prod, DateTime $date) {

        $em = $this->getEntityManager();

        $query = $em->createQuery(
                'SELECT pri FROM AppBundle:price pri JOIN pri.product prod WHERE prod.identifier = ?1 ORDER BY pri.date DESC'
        );
        $query->setParameter(1, $prod->getIdentifier());

        $result = $query->getResult(); // Array of Price Objects

        foreach ($result as $r) { // laufe durch ResultSet vom Neuesten zum Aeltesten
            if ($r->getDate() <= $date) {
                return $r;
            }
        }

        return $result[0]; // sollte hier nicht stehen 
    }

    public function calculateTotalAmountPerProductAndDateInterval(Product $prod, DateTime $checkIn, DateTime $checkOut) { // returns double

        $em = $this->getEntityManager();

        $sum = 0;

        $interval = new DateInterval('P1D'); // 1 Tag
        $daterange = new DatePeriod($checkIn, $interval, $checkOut); 

        foreach ($daterange as $date) {
            $sum += $em->getRepository('AppBundle:Price')->findLatestPricePerProductAndDate($prod, $date)->getValue();
        }
        
        return $sum;
    }

}
