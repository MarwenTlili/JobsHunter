<?php

namespace App\Form;

use App\Entity\Profession;
use App\Entity\ProfessionalInterest;
use App\Repository\ProfessionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfessionalInterestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level')
            ->add('jobType')
            ->add('wantedOccupation')
            ->add('wantedSalary')
            ->add('actualStatus')
            ->add('findMeByCompany')
            ->add('professions', EntityType::class, array(
                'class' => Profession::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'selectpicker', 'data-live-search' => 'true'
                ],
                'multiple' => true,
                'required' => false,
            ))
            
            // ->add('cv')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProfessionalInterest::class,
        ]);
    }
}
