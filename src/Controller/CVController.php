<?php

namespace App\Controller;

use App\Entity\CV;
use App\Entity\Seeker;
use App\Entity\User;
use App\Form\CVType;
use App\Repository\CVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cv")
 */
class CVController extends AbstractController
{
    /**
     * @Route("/", name="cv_index", methods={"GET", "POST"})
     */
    public function index(CVRepository $cVRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_SEEKER');

        $user = $this->getUser();
        $seeker = $this->getUser()->getSeeker();
        
        dump($user);
        dump($seeker);

        if (!$this->getUser()->getSeeker()->getCv()) {
            $cv = new CV();
            $seeker->setCv($cv);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cv);
            $entityManager->persist($seeker);
            $entityManager->flush();
        }else{
            return $this->redirectToRoute('cv_edit', [
                'id' => $seeker->getCv()->getId()
            ], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('cv/index.html.twig', [
            'cvs' => $cVRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cv_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cV = new CV();
        $form = $this->createForm(CVType::class, $cV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cV);
            $entityManager->flush();

            return $this->redirectToRoute('cv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cv/new.html.twig', [
            'cv' => $cV,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cv_show", methods={"GET"})
     */
    public function show(CV $cV): Response
    {
        return $this->render('cv/show.html.twig', [
            'cv' => $cV,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cv_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CV $cV): Response
    {
        $form = $this->createForm(CVType::class, $cV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cv/edit.html.twig', [
            'cv' => $cV,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cv_delete", methods={"POST"})
     */
    public function delete(Request $request, CV $cV): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cV->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cV);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cv_index', [], Response::HTTP_SEE_OTHER);
    }
}
