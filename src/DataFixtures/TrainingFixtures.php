<?php
namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TrainingFixtures extends Fixture implements DependentFixtureInterface{
    public const INSODEV_REF = "insodev-ref";

    public function load(ObjectManager $manager){
        $dev_jee = new Training();
        $dev_jee->setTitle("Concepteur/Développeur Java/J2EE et Certifications OCAJP8 et OCPJP8 [1Z0-808, 1Z0-809]")
            ->setAddress(" 04 Rue Elgazez IMM «Jasmin1» 2ème étage App N°5 Menzah1-1004 Tunis (En face de la pharmacie centrale de Tunis)")
            ->setCreatedAt(new \DateTimeImmutable)
            ->setDescription("
            Java Class Design, Advanced Class Design, Generics and Collections, 
            Lambda Built-in Functional Interfaces, Java Stream API, Exceptions and Assertions, Date/Time API, 
            Java I/O Fundamentals, Java File I/O, Java Concurrency, Building Database Applications with JDBC, 
            Localization, …
                Volume horaire : 55H
                Coût : 1300DT
            ")
            ->setAbout("")
            ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
            ->setCompany($this->getReference(CompanyFixtures::CIFOP_IMS))
        ;

        $istqb = new Training();
        $istqb->setTitle("Certification ISTQB, Test et validation")
            ->setAddress(" 04 Rue Elgazez IMM «Jasmin1» 2ème étage App N°5 Menzah1-1004 Tunis (En face de la pharmacie centrale de Tunis)")
            ->setCreatedAt(new \DateTimeImmutable())
            ->setDescription("
                Fondamentaux des tests, Test de cycle de vie logiciel, Techniques statiques, Gestion des tests, Outils de support, Préparation à la certification internationale …
                Volume horaire : 25H
                Coût : 700DT
            ")
            ->setAbout("")
            ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
            ->setCompany($this->getReference(CompanyFixtures::CIFOP_IMS))
        ;

        $manager->persist($dev_jee);
        $manager->persist($istqb);

        $manager->flush();
    }

    public function getDependencies(){
        return [
            CountryFixtures::class,
            CompanyFixtures::class,
        ];
    }
}