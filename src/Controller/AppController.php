<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(): Response
    {
        // if ($this->getUser()) {
        //     dump($this->getUser()->getRoles());
        // }
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
