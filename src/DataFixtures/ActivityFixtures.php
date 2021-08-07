<?php
namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture{
    public const DEVWEB_REF = "devweb-activity";
    public const MARKETING_REF = "marketing-activity";

    public function load(ObjectManager $manager){
        
        $devWeb = new Activity();
        $devWeb->setName("Développement Web");

        $marketing = new Activity();
        $marketing->setName("Marketing");

        $manager->persist($devWeb);
        $manager->persist($marketing);
        $manager->flush();

        $this->addReference(self::DEVWEB_REF, $devWeb);
        $this->addReference(self::MARKETING_REF, $marketing);
    }
}