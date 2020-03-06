<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('receiver', EntityType::class, [
                
                'class' => User::class,
                'choice_label' => 'email',
                
                
                'label' => 'Destinataire',
                'label_attr' => [
                    'for' => 'nameReceiver',
                    'class' => ''
                ],
                'attr' => [
                    'id' => 'nameReceiver',
                    'class' => 'form-control mb-4' 
                ]
            ])
            ->add('body', TextareaType::class,
            ['label' => ' Votre message',
                'label_attr' => [
                    'for' => 'form7'
                ],
                'attr' => [
                    'class' => 'md-textarea form-control',
                    'id' => 'form7'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer le message',
                'attr' => [
                    'class' => 'btn btn-info btn-default my-4'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}