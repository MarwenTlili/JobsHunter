<?php
namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CompanyFixtures extends Fixture implements DependentFixtureInterface{
    public const INSODEV_REF = "insodev-ref";
    public const SATORIPOP_REF = "satoripop-ref";

    public function load(ObjectManager $manager){
        $insodev = new Company();
        $insodev->setFirstName("nom1")
        ->setLastName("prenom1")
        ->setName("Insodev")
        ->setAddress("Sousse")
        ->setAddress("Sousse, Tunisie")
        ->setPhone("XX XXX XXX")
        ->setWebsite("www.insodev.com")
        ->setDescription("...")
        ->setTrn("O4/FKSJ/G4DSF/45")
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::INSODEV_EMP));

        $satoripop = new Company();
        $satoripop->setFirstName("nom2")
        ->setLastName("prenom2")
        ->setName("Satoripop")
        ->setAddress("Sousse")
        ->setAddress("Sousse, Tunisie")
        ->setPhone("XX XXX XXX")
        ->setWebsite("www.satoripop.com")
        ->setDescription("...")
        ->setTrn("D2/GRSZR3/5F2254/99")
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::PROXYM_EMP));

        $smooth_algo = new Company();
        $smooth_algo->setFirstName("nom3")
        ->setLastName("prenom3")
        ->setName("Smooth Algo")
        ->setAddress("Sousse")
        ->setAddress("Sousse, Sfax")
        ->setPhone("XX XXX XXX")
        ->setWebsite("www.satoripop.com")
        ->setDescription("...")
        ->setTrn("D2/GRSZR3/5F2254/99")
        ->addProfession($this->getReference(ProfessionFixtures::INFORMATIQUE))
        ->setCountry($this->getReference(CountryFixtures::TUNISIA_REF))
        ->setUser($this->getReference(UserFixtures::PROXYM_EMP));

        $manager->persist($insodev);
        $manager->persist($satoripop);
        $manager->flush();

        $this->addReference(self::INSODEV_REF, $insodev);
        $this->addReference(self::SATORIPOP_REF, $satoripop);
    }

    public function getDependencies(){
        return [
            UserFixtures::class,
            CountryFixtures::class,
            ProfessionFixtures::class
        ];
    }
}