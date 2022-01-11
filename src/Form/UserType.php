<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', Type\TextType::class)
            ->add('lastname', Type\TextType::class)
            ->add('email', Type\EmailType::class)
            ->add('password', Type\PasswordType::class)
            ->add('cgu', Type\CheckboxType::class, [
                'label' => '<b>Je m\'engage à manger proprement!</b>',
                'label_html' => true,
                'mapped' => false,
            ])
            ->add('register', Type\SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
