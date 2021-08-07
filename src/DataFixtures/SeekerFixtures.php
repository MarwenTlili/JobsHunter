<?php
namespace App\DataFixtures;

use App\Entity\Seeker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeekerFixtures extends Fixture implements DependentFixtureInterface{
    public function load(ObjectManager $manager){
        $angela = new Seeker();
        $angela->setFirstName("vladik")
        ->setLastName("angela")
        ->setCivility("Mss")
        ->setBirthDate(new \DateTimeImmutable('1989-03-24'))
        ->setCity("Bajzë")
        ->setCountry($this->getReference(CountryFixtures::ALBANIA_REF))
        ->setUser($this->getReference(UserFixtures::ANGELA_USER));

        $amira = new Seeker();
        $amira->setFirstName("maarouf")
        ->setLastName("amira")
        ->setCivility("Mss")
        ->setBirthDate(new \DateTimeImmutable('1990-12-23'))
        ->setCity("Sétif")
        ->setCountry($this->getReference(CountryFixtures::ALGERIA_REF))
        ->setUser($this->getReference(UserFixtures::AMIRA_USER));

        $manager->persist($angela);
        $manager->persist($amira);
        $manager->flush();
    }

    public function getDependencies(){
        return [
            CountryFixtures::class,
            UserFixtures::class
        ];
    }
}