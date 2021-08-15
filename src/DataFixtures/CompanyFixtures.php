<?php
namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CompanyFixtures extends Fixture implements DependentFixtureInterface{
    public const INSODEV_REF = "insodev-ref";
    public const SATORIPOP_REF = "satoripop-ref";
    public const CIFOP_IMS = "cifop-ims";

    public function load(ObjectManager $manager){
        $insodev = new Company();
        $insodev->setFirstName("nom1")
        ->setLastName("prenom1")
        ->setName("Insodev")
        ->setAddress("Sousse, Tunisie")
        ->setPhone("XX XXX XXX")
        ->setWebsite("www.insodev.com")
        ->setDescription("...")
        ->setTrn("O4/FKSJ/G4DSF/45")
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::INSODEV_COMP));

        $satoripop = new Company();
        $satoripop->setFirstName("nom2")
        ->setLastName("prenom2")
        ->setName("Satoripop")
        ->setAddress("Sousse, Tunisie")
        ->setPhone("XX XXX XXX")
        ->setWebsite("www.satoripop.com")
        ->setDescription("...")
        ->setTrn("D2/GRSZR3/5F2254/99")
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::PROXYM_COMP));

        $smooth_algo = new Company();
        $smooth_algo->setFirstName("nom3")
        ->setLastName("prenom3")
        ->setName("Smooth Algo")
        ->setAddress("Sousse, Sfax")
        ->setPhone("XX XXX XXX")
        ->setWebsite("www.satoripop.com")
        ->setDescription("...")
        ->setTrn("D2/GRSZR3/5F2254/99")
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::PROXYM_COMP));

        $cifop_ims = new Company();
        $cifop_ims->setFirstName("nom4")
        ->setLastName("prenom4")
        ->setName("CIFOP-IMS")
        ->setAddress("04 Rue Elgazez IMM «Jasmin1» 2ème étage App N°5 Menzah1-1004 Tunis")
        ->setPhone("XX XXX XXX")
        ->setWebsite("www.cifop-ims.com")
        ->setDescription("
            CIFOP-IMS est une société d'ingénierie informatique et de formation professionnelle 
            qui propose une offre complète de formations adaptées aux besoins des particuliers et des entreprises : 
            Multimédia, Internet, Web, Management, Comptabilité, Langues, Ressources Humaines, 
            Développement personnel. CIFOP-IMS propose également des formations et des stages pratiques en \"INTRA\"
                sur le lieu de travail.

        ")
        ->setTrn("...")
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::CIFOPIMS_COMP));

        $manager->persist($insodev);
        $manager->persist($satoripop);
        $manager->persist($cifop_ims);

        $manager->flush();

        $this->addReference(self::INSODEV_REF, $insodev);
        $this->addReference(self::SATORIPOP_REF, $satoripop);
        $this->addReference(self::CIFOP_IMS, $cifop_ims);

    }

    public function getDependencies(){
        return [
            UserFixtures::class,
            CountryFixtures::class,
            ProfessionFixtures::class
        ];
    }
}