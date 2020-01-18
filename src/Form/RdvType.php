<?php

namespace App\Form;

use App\Entity\Candidature;
use App\Entity\Rdv;
use App\Entity\Etape;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RdvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Date',DateType::class,[
                'years' => ['2020','2021'],
                'format' => 'dd MM yyyy',
                'data' => new \DateTime('now', new \DateTimeZone('Europe/Paris')),
                ])

            ->add('Lieu',TextType::class,[
                'attr' => [
                    'placeholder' => 'adresse du rdv'
                ]
            ])

            ->add('Contact_nom',TextType::class,[
                'attr' => [
                    'placeholder' => 'Nom du contact'
                ]
            ])

            ->add('candidature',EntityType::class,[
                'class' => Candidature::class,
                'choice_label' => 'Poste'.'-'.'Entreprise',
                'label' => 'Etape de la candidature'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rdv::class,
        ]);
    }
}
