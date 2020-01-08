<?php

namespace App\Form;

use App\Entity\Candidature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Poste', TextType::class,[
                'attr' => [
                    'placeholder' => 'Candidature pour quel poste ?'
                ]
            ])
            ->add('Entreprise', TextType::class,[
                'attr' => [
                    'placeholder' => 'Dans quelle entreprise ?'
                ]
            ])
            ->add('Contrat', TextType::class,[
                'attr' => [
                    'placeholder' => 'Type de contrat ?'
                ]
            ])
            ->add('Localisation', TextType::class,[
                'attr' => [
                    'placeholder' => 'Dans quelle ville ?'
                ]
            ])
            ->add('Date_envoi')
            ->add('Lien', TextType::class,[
                'attr' => [
                    'placeholder' => "Lien vers l'annonce"
                ]
            ])
            ->add('Plateforme', TextType::class,[
                'attr' => [
                    'placeholder' => 'candidature via quelle plateforme ?'
                ]
            ])
            ->add('Statut')
            ->add('Mise_a_jour')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidature::class,
        ]);
    }
}
