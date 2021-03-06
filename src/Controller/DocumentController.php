<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\DocumentType;
use App\Repository\DocumentRepository;
use App\Service\PdfUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/document")
 */
class DocumentController extends AbstractController
{
    /**
     * @Route("/", name="document_index", methods={"GET"})
     */
    public function index(DocumentRepository $documentRepository): Response
    {
        $seeker = $this->getUser()->getSeeker();
       
        if (!$seeker->getCv()->getDocument()) {
            return $this->redirectToRoute('document_new', [], Response::HTTP_SEE_OTHER);
        }else{
            return $this->redirectToRoute('document_edit', [
                'id' => $seeker->getCv()->getDocument()->getId()
            ], Response::HTTP_SEE_OTHER);
        }
    }

    /**
     * @Route("/new", name="document_new", methods={"GET","POST"})
     */
    public function new(Request $request, PdfUploader $pdfUploader): Response
    {
        $document = new Document();
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $diplomaFile */
            $diplomaFile = $form->get('diplomaFileName')->getData();
            if ($diplomaFile) {
                $diplomaFileName = $pdfUploader->upload($diplomaFile);
                $document->setDiploma($diplomaFileName);
            }

            /** @var UploadedFile $realisationFile */
            $realisationFile = $form->get('realisationFileName')->getData();
            if ($realisationFile) {
                $realisationFileName = $pdfUploader->upload($realisationFile);
                $document->setRealisation($realisationFileName);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            
            $cv = $this->getUser()->getSeeker()->getCv();
            $cv->setDocument($document);
            $entityManager->persist($cv);

            $entityManager->flush();

            return $this->redirectToRoute('document_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('document/new.html.twig', [
            'document' => $document,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="document_show", methods={"GET"})
     */
    public function show(Document $document): Response
    {
        return $this->render('document/show.html.twig', [
            'document' => $document,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="document_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Document $document): Response
    {
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('document_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('document/edit.html.twig', [
            'document' => $document,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="document_delete", methods={"POST"})
     */
    public function delete(Request $request, Document $document): Response
    {
        if ($this->isCsrfTokenValid('delete'.$document->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($document);
            $entityManager->flush();
        }

        return $this->redirectToRoute('document_index', [], Response::HTTP_SEE_OTHER);
    }
}
