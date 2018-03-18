<?php
namespace Api\LigueBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('code');
        $builder->add('shortName');
        $builder->add('address');
        $builder->add('phone');
        $builder->add('email');
        $builder->add('site');
        $builder->add('colorHome');
        $builder->add('colorAway');
        $builder->add('colorAway');
        $builder->add('logo');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Api\LigueBundle\Entity\Team',
            'csrf_protection' => false
        ]);
    }
}