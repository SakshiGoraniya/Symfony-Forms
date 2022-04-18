<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'attr'=>[
                    'placeholder'=>'Enter the title',
                    'class'=> 'custom_class'
                ]
            ])
            ->add('description', TextareaType::class,[
                'attr'=>[
                    'placeholder'=>'Enter the Description',
                   
                ]
            ])
            ->add('myfile', FileType::class,[
                'mapped'=>false,
                'attr'=>[
                    'placeholder'=>'attach your file',
                   
                ]
            ])
            ->add('save', SubmitType::class,[
                'attr'=>[
                    'class'=>'btn btn-success',
                ]
            ])
           
            ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
