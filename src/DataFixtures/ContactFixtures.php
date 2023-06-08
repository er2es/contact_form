<?php
namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // 1 teszt adatsor
        $contactData = new Contact();
        $contactData->setName("Szabó József");
        $contactData->setEmail("szabo.jozsef.acc@gmail.com");
        $contactData->setMessage("inicializálós adatok");
        $manager->persist($contactData);
        $manager->flush();
    }
}