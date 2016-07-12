<?php

/**
 * Created by PhpStorm.
 * User: sadlom01
 * Date: 11/07/2016
 * Time: 13:04
 */
namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label'  => 'Meno: ',))
            ->add('pokedexId', IntegerType::class)
            ->add('type', TextType::class)
            ->add('preEvo', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:Pokemon',
                // use the User.username property as the visible option string
                'choice_label' => 'name',
                // used to render a select box, check boxes or radios
                'multiple' => false,
                'expanded' => false,
                ))
            ->add('postEvo', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:Pokemon',
                // use the Pokemon.name property as the visible option string
                'choice_label' => 'name',

                // used to render a select box, check boxes or radios
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('gender', ChoiceType::class, array(
                'choices'  => array(
                    'Male' => true,
                    'Female' => false,
                ),
                // used to render a select box, check boxes or radios
                'multiple' => false,
                'expanded' => true,
            ))
            ->add('save', SubmitType::class, array('label' => 'Add'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\pokemon',
        ));
    }
}