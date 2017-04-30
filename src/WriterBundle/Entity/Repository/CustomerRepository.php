<?php
namespace WriterBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CustomerRepository
 *
 * @author Osama Abufara <oabufara@gmail.de>
 */
class CustomerRepository extends EntityRepository
{

     /**
     * @return []
     */
    public function findAll()
    {
        return $this->findBy(array(), array('name' => 'ASC'));
    }
}