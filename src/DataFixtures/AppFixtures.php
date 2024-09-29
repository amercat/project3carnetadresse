<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $contacts = [
            $this->createContact('Dupont', 'Jean', '0491458788'),
            $this->createContact('Bouzifa', 'Djamila', '0145878987'),
            $this->createContact('Melvina', 'Sibylle', '0345789878'),
            ];

        foreach ($contacts as $contact) {
            $manager->persist($contact);
        }

        $manager->flush();
    }

    private function createContact(string $nom, string $prenom, string $telephone): Contact
    {
        $contact = new Contact();

        $contact
            ->setNom($nom)
            ->setPrenom($prenom)
            ->setTelephone($telephone);

        return $contact;
    }
}
