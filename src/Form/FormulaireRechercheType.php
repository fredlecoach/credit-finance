<?php

namespace App\Form;

use App\Entity\Habitation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormulaireRechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          
            ->add('departement')
            ->add('type')
            ->add('surfaceMin')
            ->add('prixMin')
            ->add('prixMax')
            ->add('loyerMin')
            ->add('rentabiliteMin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Habitation::class,
        ]);
    }
}
