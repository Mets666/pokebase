<?php
/**
 * Created by PhpStorm.
 * User: Matej Sadloň
 * Date: 12.7.2016
 * Time: 22:19
 */

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditPokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', EntityType::class, array(
                'class' => 'AppBundle:Pokemon',
                'choice_label' => 'name',
            ))
            ->add('select', SubmitType::class, array('label' => 'Select'
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