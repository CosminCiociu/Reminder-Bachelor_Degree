<?php

namespace App\Form;

use App\Entity\Reminder;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ReminderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Description', TextareaType::class,[
                'label' => 'Description:',
                'label_attr' => ['class'=> 'labelDescription'],
                'attr'=> 
                    [
                        'class'=> 'DescriptionForm form-control my-3 py-3',
                    ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Create Reminder',
                'attr'=> 
                    [
                        'class'=> 'btn btn-outline-dark',
                    ]
            ])
        ;
       
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reminder::class,
            'attr'=> 
                    [
                        'class'=> 'FormReminder',
                    ]
        ]);
    }
}
