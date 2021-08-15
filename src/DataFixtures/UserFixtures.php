<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture{
    private $passwordEncoder;
    public const ANGELA_USER = "angela-user";
    public const AMIRA_USER = "amira-user";
    public const INSODEV_COMP = "insodev-comp";
    public const PROXYM_COMP = "proxym-comp";
    public const CALLIMPACT_COMP = "callimpact-comp";
    public const SMOOTHALGO_COMP = "smoothalto-comp";
    public const CIFOPIMS_COMP = "cifopims-comp";
    public const PROSERVICES = "proservices-comp";

    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager){
        $user = new User();
        $user->setEmail("user@gmail.com")
        ->setUsername("user")
        ->setRoles(["ROLE_USER"])
        ->setPassword($this->passwordEncoder->encodePassword($user, 'user'))
        ->setCreatedAt(new \DateTimeImmutable());

        $admin = new User();
        $admin->setEmail("admin@gmail.com")
        ->setUsername("admin")
        ->setRoles(["ROLE_ADMIN"])
        ->setPassword($this->passwordEncoder->encodePassword($admin, "admin"))
        ->setCreatedAt(new \DateTimeImmutable());

        $angela = new User();
        $angela->setEmail("angela@gmail.com")
        ->setUsername("angela")
        ->setRoles(["ROLE_SEEKER"])
        ->setPassword($this->passwordEncoder->encodePassword($angela, 'angela'))
        ->setCreatedAt(new \DateTimeImmutable());

        $amira = new User();
        $amira->setEmail("amira@gmail.com")
        ->setUsername("amira")
        ->setRoles(["ROLE_SEEKER"])
        ->setPassword($this->passwordEncoder->encodePassword($amira, 'amira'))
        ->setCreatedAt(new \DateTimeImmutable());

        $insodev = new User();
        $insodev->setEmail("insodev@gmail.com")
        ->setUsername("insodev")
        ->setRoles(["ROLE_EMPLOYER"])
        ->setPassword($this->passwordEncoder->encodePassword($insodev, 'insodev'))
        ->setCreatedAt(new \DateTimeImmutable());

        $proxym = new User();
        $proxym->setEmail("proxym@gmail.com")
        ->setUsername("proxym")
        ->setRoles(["ROLE_EMPLOYER"])
        ->setPassword($this->passwordEncoder->encodePassword($proxym, 'proxym'))
        ->setCreatedAt(new \DateTimeImmutable());

        $call_impact = new User();
        $call_impact->setEmail("callimpact@gmail.com")
        ->setUsername("callimpact")
        ->setRoles(["ROLE_EMPLOYER"])
        ->setPassword($this->passwordEncoder->encodePassword($call_impact, 'callimpact'))
        ->setCreatedAt(new \DateTimeImmutable());

        $smooth_algo = new User();
        $smooth_algo->setEmail("smoothalto@gmail.com")
        ->setUsername("smoothalgo")
        ->setRoles(["ROLE_EMPLOYER"])
        ->setPassword($this->passwordEncoder->encodePassword($smooth_algo, 'smoothalgo'))
        ->setCreatedAt(new \DateTimeImmutable());

        $cifop_ims = new User();
        $cifop_ims->setEmail("cifopims@gmail.com")
        ->setUsername("CIFOP-IMS")
        ->setRoles(["ROLE_EMPLOYER"])
        ->setPassword($this->passwordEncoder->encodePassword($cifop_ims, 'cifopims'))
        ->setCreatedAt(new \DateTimeImmutable());

        $proservices = new User();
        $proservices->setEmail("proServices@gmail.com")
        ->setUsername("proservices")
        ->setRoles(["ROLE_EMPLOYER"])
        ->setPassword($this->passwordEncoder->encodePassword($proservices, 'proservices'))
        ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($user);
        $manager->persist($admin);
        $manager->persist($angela);
        $manager->persist($amira);
        $manager->persist($insodev);
        $manager->persist($proxym);
        $manager->persist($call_impact);
        $manager->persist($smooth_algo);
        $manager->persist($cifop_ims);
        $manager->persist($proservices);

        $manager->flush();
        
        $this->addReference(self::ANGELA_USER, $angela);
        $this->addReference(self::AMIRA_USER, $amira);
        $this->addReference(self::CIFOPIMS_COMP, $cifop_ims);
        $this->addReference(self::PROXYM_COMP, $proxym);
        $this->addReference(self::PROSERVICES, $proservices);
        $this->addReference(self::INSODEV_COMP, $proservices);

    }
}
