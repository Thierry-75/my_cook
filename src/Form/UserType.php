<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('fullName',TextType::class, ['attr'=>[
            'class'=>'form-control','minlength'=>'2','maxlength'=>'50'
        ],
        'label'=>'Nom / prénom','label_attr'=>['class'=>'form-label mt-4'],
        'constraints'=>[ new Assert\Length(['min'=>2,'max'=>50, 'minMessage'=>'minimum 2','maxMessage'=>'max 50']),
        new Assert\NotBlank(['message' => ''])]
        ])
        ->add('pseudo',TextType::class, ['attr'=>[
            'class'=>'form-control','minlength'=>'2','maxlength'=>'50','required'=>false
        ],
        'label'=>'Pseudo','label_attr'=>['class'=>'form-label mt-4'],
        ])
        ->add('plainPassword', PasswordType::class,['attr'=>['class'=>'form-control'],'label'=>'Controle de votre mot de passe','label_attr'=>['class'=>'form-label mt-4']])
        ->add('submit',SubmitType::class, ['attr'=>['class'=>'btn btn-warning mt-4 float-end'],'label'=>'Valider'])
    ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
