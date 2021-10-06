<?php

namespace App\Form;

use App\Entity\GeneralInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class GeneralInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo', FileType::class, [
                'label' => 'votre photo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        // 'mimeTypes' => [
                        //     'application/pdf',
                        //     'application/x-pdf',
                        // ],
                        'mimeTypesMessage' => 'Please upload a valid Image file',
                    ])
                ]
            ])
            ->add('motivation')
            ->add('address')
            ->add('region')
            ->add('postalCode')
            ->add('haveDrivingLicence')
            ->add('ownACar')
            ->add('phone')
            ->add('phone2')
            ->add('country')
            // ->add('cv')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GeneralInformation::class,
        ]);
    }
}
