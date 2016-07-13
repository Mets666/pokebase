<?php

/**
 * Created by PhpStorm.
 * User: sadlom01
 * Date: 11/07/2016
 * Time: 13:04
 */
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddPokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label'  => 'Name: ',))
            ->add('race', TextType::class, array(
                'label'  => 'Race: ',))
            ->add('nature', TextType::class, array(
                'label'  => 'Nature: ',))
            ->add('level', IntegerType::class, array(
                'label'  => 'Level: ',))
            ->add('iv_hp', IntegerType::class, array(
                'label'  => 'IV HP: ',))
            ->add('iv_atk', IntegerType::class, array(
                'label'  => 'IV Attack: ',))
            ->add('iv_def', IntegerType::class, array(
                'label'  => 'IV Defence: ',))
            ->add('iv_spatk', IntegerType::class, array(
                'label'  => 'IV Spec. Attack: ',))
            ->add('iv_spdef', IntegerType::class, array(
                'label'  => 'IV Spec. Defence: ',))
            ->add('iv_spd', IntegerType::class, array(
                'label'  => 'IV Speed: ',))
            ->add('ev_hp', IntegerType::class, array(
                'label'  => 'EV HP: ',))
            ->add('ev_atk', IntegerType::class, array(
                'label'  => 'EV Attack: ',))
            ->add('ev_def', IntegerType::class, array(
                'label'  => 'EV Defence: ',))
            ->add('ev_spatk', IntegerType::class, array(
                'label'  => 'EV Spec. Attack: ',))
            ->add('ev_spdef', IntegerType::class, array(
                'label'  => 'EV Spec. Defence: ',))
            ->add('ev_spd', IntegerType::class, array(
                'label'  => 'EV Speed: ',))
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