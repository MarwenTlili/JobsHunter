<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class JobFixtures extends Fixture implements DependentFixtureInterface{
    public function load(ObjectManager $manager){
        $symfony1 = new Job();
        $symfony1->setTitle("dev symfony")
        ->setAddress("sousse, 2315")
        ->setCreatedAt(new \DateTimeImmutable())
        ->setExpireAt(new \DateTimeImmutable())
        ->setPostsNumber(3)
        ->setType("CDI")
        ->setExperienceMin(0)
        ->setExperienceMax(3)
        ->setEducationLevel("DESS, DEA, Master, Bac + 5, Grandes Ecoles")
        ->setSalaryMin(1000)
        ->setSalayMax(1500)
        ->setRequiredLanguages("Français, anglais")
        ->setDescription("
            Votre mission si vous l’acceptez :
            Développement du backend / bases de données
            Mise en production des nouvelles versions des applications et bases de données
            Traitement des demandes de services (WebServices)
            Maintenance en condition opérationnelle (MCO) des environnements
            Résolution d’incidents / problèmes
            Métrologie, analyse de performances, optimisations
            Veille tehnologique
        ")
        ->setRequirements("
            Compétences  techniques :
            Vous avez une première expérience significative à un poste similaire
            Les environnements Symfony 2/ Laravel / Doctrine / PHP 7 / API Rest Webservice / JSON / API Google maps n’ont aucun secret pour vous
            Vous maîtrisez à la perfection : NodeJs / AngularJs / Socket / Stripe / Google maps API / Amazon Web Services
            L’environnement startup ne vous fait pas peur 
            Evidemment vous avez un côté geek et le souci du détail 
            Vous savez vous adapter et être flexible
            Vous êtes autonome tout en ayant l’esprit d’équipe
            Aptitudes relationnelles et comportementales 
            Rigueur, autonomie, compétences rédactionnelles
            Capacité à travailler en équipe
            Travail en équipe et en transverse
            Curiosité, ambition, dynamisme & goût pour les challenges
            Autonomie et travail en équipe
        ")
        ->setCompany($this->getReference(CompanyFixtures::INSODEV_REF))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::PHP_REF))
        ->addTag($this->getReference(TagFixtures::SYMFONY_REF));

        $jee1 = new Job();
        $jee1->setTitle("dev JEE")
        ->setAddress("sousse, 4032")
        ->setCreatedAt(new \DateTimeImmutable())
        ->setExpireAt(new \DateTimeImmutable())
        ->setPostsNumber(3)
        ->setType("CDI")
        ->setExperienceMin(0)
        ->setExperienceMax(1)
        ->setEducationLevel("Ingénieur")
        ->setSalaryMin(1500)
        ->setSalayMax(2000)
        ->setRequiredLanguages("Français, anglais")
        ->setDescription("
            Satoripop est une entreprise de services numériques basée à Sousse depuis 2014, qui intervient dans tout le cycle de vie d’un projet IT. Forte de ses 6 départements (UX/UI, Web, Mobile, Web marketing, Cloud et R&D) et de ses 120 collaborateurs, Satoripop a su attirer une multitude de clients et partenaires basés principalement en Europe et Afrique et comprenant
            - Des startups
            - Des grands comptes
            - Des associations et organisations non gouvernementales
            - Des gouvernements 
            Dans le cadre de développement de ses activités et renforcement de ses équipes, nous cherchons à recruter un Développeur JAVA
        ")
        ->setRequirements("
            Activités principales

            Rédiger des spécifications techniques et fonctionnelles
            Concevoir et modéliser
            Développement
            Participer aux phases d'intégration
            Intervenir sur les phases de tests
            Assurer la maintenance et les évolutions correctives
            EXIGENCES DE L'EMPLOI
            
            De formation ingénieur ou technicien en informatique/Telecom, vous avez au minimum 3 ans d'expérience dans un domaine équivalent
            
            Compétences métiers / techniques
            
            Maîtrise d'une ou plusieurs de ces technologies : JAVA, HIBERNATE, MAVEN, STRUTS, JQuery, Javascript, XML, MySQL, Tomcat. La maîtrise des technologies : REST, SOAP seraient un plus
            Aptitudes relationnelles et comportementales 
            
            Rigueur, autonomie,
            Capacité à travailler en équipe
        ")
        ->setCompany($this->getReference(CompanyFixtures::SATORIPOP_REF))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->addTag($this->getReference(TagFixtures::JAVA_REF))
        ->addTag($this->getReference(TagFixtures::JEE_REF));

        $manager->persist($symfony1);
        $manager->persist($jee1);

        $manager->flush();
    }

    public function getDependencies(){
        return [
            CompanyFixtures::class,
            CountryFixtures::class,
            TagFixtures::class
        ];
    }
}
