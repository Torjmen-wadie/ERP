<?php
namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $client1= new Client();
        $client2= new Client();
        $client3= new Client();
        $client4= new Client();
        $client1->setNom("Torjmen")
        ->setPrenom("wadie")
        ->setNumTel(638115219)
        ->setAdresse("4 Rue emile zola")
        ->setAdresseMail("wadietorjmane20@gmail.com");
        
        $client2->setNom("K. LANGLOIS")
        ->setPrenom("Marvin")
        ->setNumTel(7515219)
        ->setAdresse("La défense")
        ->setAdresseMail("marvin@gmail.com");

        $client3->setNom("JEGUIRIM")
        ->setPrenom("Imen")
        ->setNumTel(3658412)
        ->setAdresse("Paris")
        ->setAdresseMail("imen@gmail.com");

        $client4->setNom("El Kaada")
        ->setPrenom("Jihane")
        ->setNumTel(59874123)
        ->setAdresse("Le Kremlin-bicetre")
        ->setAdresseMail("jihane@gmail.com");
        

        $manager->persist($client1);
        $manager->persist($client2);
        $manager->persist($client3);
        $manager->persist($client4);
        $manager->flush();


    }
}