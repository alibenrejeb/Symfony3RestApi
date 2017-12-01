<?php
namespace Api\LigueBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->add('teamHome');
        //$builder->add('teamAway');
        //$builder->add('scoreHome');
        //$builder->add('scoreAway');
        //$builder->add('report');
        //$builder->add('round');
        //$builder->add('saison');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Api\LigueBundle\Entity\Match',
            'csrf_protection' => false
        ]);
    }
}