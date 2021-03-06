<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', TextType::class, [
                    'attr' => ['class' => 'form-control'],
                ])
                ->add('email', TextType::class, [
                    'attr' => ['class' => 'form-control']
                ])
                ->add('subject', TextType::class, [
                    'attr' => ['class' => 'form-control']
                ])
                ->add('message', TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }

}
