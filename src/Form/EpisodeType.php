<?php

namespace App\Form;

use App\Entity\Saison;
use App\Entity\Episode;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre']
            )
            ->add('number', IntegerType::class, [
                'label' => 'Numéro de l\'épisode'
            ])
            ->add('summary', TextareaType::class, [
                'label' => 'Sommaire de l\'épisode'
            ])
            ->add('imageFile', VichFileType::class, [
                'label' => 'Image de l\'épisode',
                'required'      => false,
                'allow_delete'  => false, 
                'download_uri'  => false, 

            ])
            ->add('saison', EntityType::class, [
                'class' => Saison::class,
                'label' => 'Saison'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Episode::class,
        ]);
    }
}