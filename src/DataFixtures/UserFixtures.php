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
    public const INSODEV_EMP = "insodev-emp";
    public const PROXYM_EMP = "proxym-emp";
    public const CALLIMPACT_EMP = "callimpact-emp";
    public const SMOOTHALGO = "smoothalto-emp";

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
        ->setUsername("CALL IMPACT")
        ->setRoles(["ROLE_EMPLOYER"])
        ->setPassword($this->passwordEncoder->encodePassword($call_impact, 'call-impact'))
        ->setCreatedAt(new \DateTimeImmutable());

        $smooth_algo = new User();
        $smooth_algo->setEmail("smoothalto@gmail.com")
        ->setUsername("Smooth Algo")
        ->setRoles(["ROLE_EMPLOYER"])
        ->setPassword($this->passwordEncoder->encodePassword($smooth_algo, 'smooth-algo'))
        ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($user);
        $manager->persist($admin);
        $manager->persist($angela);
        $manager->persist($amira);
        $manager->persist($insodev);
        $manager->persist($proxym);
        $manager->persist($call_impact);
        $manager->persist($smooth_algo);
        $manager->flush();
        
        $this->addReference(self::ANGELA_USER, $angela);
        $this->addReference(self::AMIRA_USER, $amira);
        $this->addReference(self::INSODEV_EMP, $insodev);
        $this->addReference(self::PROXYM_EMP, $proxym);
    }
}
