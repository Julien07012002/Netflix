<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\Serie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('serie', EntityType::class, [
                'label' => 'Série',
                'class' => Serie::class,
                'choice_label' => 'title',
            ])
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Primaire' => 'Primary',
                    'Secondaire' => 'Secondary',
                    'Tertiaire' => 'Tertiary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Role::class,
        ]);
    }
}