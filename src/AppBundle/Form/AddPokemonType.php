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
                'label'  => 'Name: ',
                'attr' => array('name' => 'name', 'id' => 'name', 'class' => 'form-control'),
                ))
            ->add('race', TextType::class, array(
                'label'  => 'Race: ',
                'attr' => array('name' => 'race', 'id' => 'race', 'class' => 'form-control'),
                ))
            ->add('nature', TextType::class, array(
                'label'  => 'Nature: ',
                'attr' => array('name' => 'nature', 'id' => 'nature', 'class' => 'form-control'),
                ))
            ->add('level', IntegerType::class, array(
                'label'  => 'Level: ',
                'attr' => array('name' => 'level', 'id' => 'level', 'class' => 'form-control'),
                ))
            ->add('iv_hp', IntegerType::class, array(
                'label'  => 'IV HP: ',
                'attr' => array('name' => 'iv_hp', 'id' => 'iv_hp', 'class' => 'form-control'),
                ))
            ->add('iv_atk', IntegerType::class, array(
                'label'  => 'IV Attack: ',
                'attr' => array('name' => 'iv_atk', 'id' => 'iv_atk', 'class' => 'form-control'),
                ))
            ->add('iv_def', IntegerType::class, array(
                'label'  => 'IV Defence: ',
                'attr' => array('name' => 'iv_def', 'id' => 'iv_def', 'class' => 'form-control'),
                ))
            ->add('iv_spatk', IntegerType::class, array(
                'label'  => 'IV Spec. Attack: ',
                'attr' => array('name' => 'iv_spatk', 'id' => 'iv_spatk', 'class' => 'form-control'),
                ))
            ->add('iv_spdef', IntegerType::class, array(
                'label'  => 'IV Spec. Defence: ',
                'attr' => array('name' => 'iv_spdef', 'id' => 'iv_spdef', 'class' => 'form-control'),
                ))
            ->add('iv_spd', IntegerType::class, array(
                'label'  => 'IV Speed: ',
                'attr' => array('name' => 'iv_spd', 'id' => 'iv_spd', 'class' => 'form-control'),
                ))
            ->add('ev_hp', IntegerType::class, array(
                'label'  => 'EV HP: ','attr' => array('name' => 'ev_hp', 'id' => 'ev_hp', 'class' => 'form-control'),
                ))
            ->add('ev_atk', IntegerType::class, array(
                'label'  => 'EV Attack: ',
                'attr' => array('name' => 'ev_atk', 'id' => 'ev_atk', 'class' => 'form-control'),
                ))
            ->add('ev_def', IntegerType::class, array(
                'label'  => 'EV Defence: ',
                'attr' => array('name' => 'ev_def', 'id' => 'ev_def', 'class' => 'form-control'),
                ))
            ->add('ev_spatk', IntegerType::class, array(
                'label'  => 'EV Spec. Attack: ',
                'attr' => array('name' => 'ev_spatk', 'id' => 'ev_spatk', 'class' => 'form-control'),
                ))
            ->add('ev_spdef', IntegerType::class, array(
                'label'  => 'EV Spec. Defence: ',
                'attr' => array('name' => 'ev_spdef', 'id' => 'ev_spdef', 'class' => 'form-control'),
                ))
            ->add('ev_spd', IntegerType::class, array(
                'label'  => 'EV Speed: ',
                'attr' => array('name' => 'ev_spd', 'id' => 'ev_spd', 'class' => 'form-control'),
                ))
            ->add('save', SubmitType::class, array(
                'label' => 'Save',
                'attr' => array('class' => 'btn btn-default btn-success'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\pokemon',
        ));
    }
}