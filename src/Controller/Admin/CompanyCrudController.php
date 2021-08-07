<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompanyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Company::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('first_name'),
            TextField::new('last_name'),
            TextField::new('name'),
            TextField::new('region'),
            AssociationField::new('country'),
            TextField::new('full_address'),
            TextField::new('phone'),
            TextField::new('website'),
            TextEditorField::new('description'),
            TextField::new('trn'),
            AssociationField::new('user'),
            AssociationField::new('activity'),

            
        ];
    }
}
