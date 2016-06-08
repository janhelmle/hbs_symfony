<?php

namespace AppBundle\Entity;

/**
 * RoomTypeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RoomTypeRepository extends \Doctrine\ORM\EntityRepository {

    public function findAllWhereCapacityGreaterZeroOrderedByPositionInSubMenu() { // returns array of RoomType objects
        return $this->getEntityManager()
                        ->createQuery('
                SELECT 
                
                r 

                FROM AppBundle:RoomType r
                
                WHERE r.capacity > 0
                
                AND r.enabled = TRUE
                
                ORDER BY r.positionInSubMenu ASC
                '
                        )
                        ->getResult();
    }
    
//    public function findAll() { // returns array of RoomType objects
//        return $this->getEntityManager()
//                        ->createQuery('
//                SELECT 
//                    rt
//                FROM
//                    AppBundle:RoomType rt
//                '
//                        )
//                        ->getResult();
//    }

}
