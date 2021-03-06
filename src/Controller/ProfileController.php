<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile_index")
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_SEEKER');

        

        return $this->render('profile/index.html.twig', [
            
        ]);
    }
}
