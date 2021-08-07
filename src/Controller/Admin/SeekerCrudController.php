<?php

namespace App\Controller\Admin;

use App\Entity\Seeker;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SeekerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Seeker::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
