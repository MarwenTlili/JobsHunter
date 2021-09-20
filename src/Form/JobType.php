<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Tag;
use App\Repository\JobRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function __construct()
    {
        
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('address')
            // ->add('createdAt')
            // ->add('expireAt')
            // ->add('postsNumber')
            // ->add('type')
            // ->add('experienceMin')
            // ->add('experienceMax')
            // ->add('educationLevel')
            // ->add('requiredLanguages')
            // ->add('description')
            // ->add('requirements')

            // ->add('tags')
            ->add('tags', EntityType::class,[
                'class' => Tag::class,
                // 'choices' => $this->job->getTags(),
                'multiple' => true,
                // 'expanded'  => true
                // 'maped' => true
            ])


            // ->add('tags', EntityType::class, [
            //     'class' => Tag::class
            // ])
            // ->add('seekersSaved')
            // ->add('seekersApplyed')
            ->add('Company')
            ->add('country')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
