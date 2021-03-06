<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        dump($file);
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        // dump($originalFilename);
        $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
        // dump($safeFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
        // dump($fileName);
        try {
            
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            dump("file won't be moved to '".$this->getTargetDirectory()."'");
            dump($e->getMessage());
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}