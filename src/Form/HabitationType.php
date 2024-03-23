<?php

namespace App\Form;

use App\Entity\Habitation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HabitationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ville', TextType::class, ['attr' => ["class" => "form-control"]])
            ->add('adresse', TextType::class, ['attr' => ["class" => "form-control",
                                                          "placeholder" => "n°, rue, avenue"]])
            ->add('code_postal', NumberType::class, ['attr'=> ["class"=> 'form-control']])
            ->add('type', TextType::class, ['attr' => ["class" => "form-control",
                                                       "placeholder"=>"appartement, maison, duplex, studio"]]) 
            ->add('surface', NumberType::class, ['attr'=> ["class"=> 'form-control']])
            ->add('prix', NumberType::class, ['attr'=> ["class"=> 'form-control']])
            ->add('loyer', NumberType::class, ['attr'=> ["class"=> 'form-control']])
            ->add('rentabilite', NumberType::class, ['attr'=> ["class"=> 'form-control']])
            ->add('image', TextType::class, ['attr' => ["class" => "form-control"],
                                             'data' => "images/"])
            ->add('date_creation', null, ['attr'=> ["class"=>  'form-control'],
                'widget' => 'single_text',
            ])

            ->add("creer" , SubmitType::class , ["label"=> isset($options["label"]) ? $options["label"]  : "Ajouter" , "attr" => [ "class" => "btn btn-info col-6 mt-2 px-3" ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Habitation::class,
        ]);
    }
}
