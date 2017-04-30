<?php

namespace WriterBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WriterBundle\Entity\Customer;

/**
 * LoadCustomers
 *
 * @author Osama Abufara <oabufara@gmail.com>
 */
class LoadCustomers implements FixtureInterface{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {

        $categories = array(
            0 => array('name' => 'Osama Abufara', 'email' => 'oabufara@gmail.com'),
            1 => array('name' => 'Test TestLastName', 'email' => 'test@gmail.com')
        );

        foreach ($categories as $cat) {
            $c = new Customer();
            $c->setName($cat['name']);
            $c->setEmail($cat['email']);
            $manager->persist($c);
            $manager->flush();
        }
    }

}
