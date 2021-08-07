<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('address')
            ->add('createdAt')
            ->add('expireAt')
            ->add('postsNumber')
            ->add('type')
            ->add('experienceMin')
            ->add('experienceMax')
            ->add('educationLevel')
            ->add('requiredLanguages')
            ->add('description')
            ->add('requirements')
            ->add('tags')
            ->add('seekersSaved')
            ->add('seekersApplyed')
            ->add('Company')
            ->add('country')
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
