<?php
namespace App\Service;

use App\Repository\ProfessionalInterestRepository;

class ProfessionalInterestService{
    private $professionalInterestRepository;

    public function __construct(ProfessionalInterestRepository $professionalInterestRepository)
    {
        $this->professionalInterestRepository = $professionalInterestRepository;
    }

    public function getCV()
    {
        return $this->professionalInterestRepository->findOneBy();
    }
}