<?php
namespace Api\LigueBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('play');
        $builder->add('win');
        $builder->add('draw');
        $builder->add('lost');
        $builder->add('goalsScored');
        $builder->add('goalsConceded');
        $builder->add('saison');
        $builder->add('team');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Table',
            'csrf_protection' => false
        ]);
    }
}