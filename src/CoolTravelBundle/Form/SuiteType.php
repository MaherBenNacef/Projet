<?php

namespace CoolTravelBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prix')
            ->add('numero_Suite')
            ->add('id_hotel', EntityType::class,array(
                'class'=> 'CoolTravelBundle\Entity\Hotel',
                    'choice_label'=>'id',
                    'expanded'=>false,
                    'multiple'=>false
                )

            )
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoolTravelBundle\Entity\Suite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cooltravelbundle_suite';
    }


}
