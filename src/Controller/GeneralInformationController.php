<?php

namespace App\Controller;

use App\Entity\Country;
use App\Entity\GeneralInformation;
use App\Form\GeneralInformationType;
use App\Repository\CountryRepository;
use App\Repository\GeneralInformationRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/general-information")
 */
class GeneralInformationController extends AbstractController
{
    /**
     * @Route("/", name="general_information_index", methods={"GET"})
     */
    public function index(GeneralInformationRepository $generalInformationRepository): Response
    {
        $seeker = $this->getUser()->getSeeker();
       
        if (!$this->getUser()->getSeeker()->getCv()->getGeneralInformation()) {
            return $this->redirectToRoute('general_information_new', [], Response::HTTP_SEE_OTHER);
        }else{
            return $this->redirectToRoute('general_information_edit', [
                'id' => $seeker->getCv()->getGeneralInformation()->getId()
            ]);
        }
    }

    /**
     * @Route("/new", name="general_information_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $generalInformation = new GeneralInformation();

        $form = $this->createForm(GeneralInformationType::class, $generalInformation);

        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('brochure')->getData();
            if ($brochureFile) {
                $brochureFileName = $fileUploader->upload($brochureFile);
                $generalInformation->setPhoto($brochureFileName);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($generalInformation);

            $cv = $this->getUser()->getSeeker()->getCv();
            $cv->setGeneralInformation($generalInformation);
            $entityManager->persist($cv);

            $entityManager->flush();

            return $this->redirectToRoute('general_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('general_information/new.html.twig', [
            'general_information' => $generalInformation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="general_information_show", methods={"GET"})
     */
    public function show(GeneralInformation $generalInformation): Response
    {
        return $this->render('general_information/show.html.twig', [
            'general_information' => $generalInformation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="general_information_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GeneralInformation $generalInformation, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(GeneralInformationType::class, $generalInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('brochure')->getData();
            if ($brochureFile) {
                $brochureFileName = $fileUploader->upload($brochureFile);
                $generalInformation->setPhoto($brochureFileName);
            }
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($generalInformation);

            $cv = $this->getUser()->getSeeker()->getCv();
            $cv->setGeneralInformation($generalInformation);
            $entityManager->persist($cv);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('general_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('general_information/edit.html.twig', [
            'general_information' => $generalInformation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="general_information_delete", methods={"POST"})
     */
    public function delete(Request $request, GeneralInformation $generalInformation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$generalInformation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($generalInformation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('general_information_index', [], Response::HTTP_SEE_OTHER);
    }
}
