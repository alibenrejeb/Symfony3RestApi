<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fname');
        $builder->add('lname');
        $builder->add('nationality');
        $builder->add('dob');
        $builder->add('placeBirth');
        $builder->add('height');
        $builder->add('weight');
        $builder->add('photo');
        $builder->add('comment');
        $builder->add('goal');
        $builder->add('yellowCard');
        $builder->add('redCard');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Player',
            'csrf_protection' => false
        ]);
    }
}