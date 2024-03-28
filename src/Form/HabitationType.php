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
            ->add('ville', TextType::class, ['attr' => ["class" => "form-control mb-2"]])
            ->add('adresse', TextType::class, ['attr' => ["class" => "form-control mb-2",
                                                          "placeholder" => "n°, rue, avenue"]])
            ->add('code_postal', NumberType::class, ['attr'=> ["class"=> 'form-control mb-2']])
            ->add('departement', TextType::class, ['attr' => ["class" => "form-control mb-2", 
                                                              "placeholder"=> "val de marne"]])
            ->add('numero_departement', NumberType::class, ['attr' => ["class" => "form-control mb-2",
                                                            "placeholder" => "94"]])
            ->add('type', TextType::class, ['attr' => ["class" => "form-control mb-2",
                                                       "placeholder"=>"appartement, maison, duplex, studio"]]) 
            ->add('surface', NumberType::class, ['attr'=> ["class"=> 'form-control mb-2']])
            ->add('prix', NumberType::class, ['attr'=> ["class"=> 'form-control mb-2']])
            ->add('loyer', NumberType::class, ['attr'=> ["class"=> 'form-control mb-2']])
            ->add('rentabilite', NumberType::class, ['attr'=> ["class"=> 'form-control mb-2']])
            ->add('image', TextType::class, ['attr' => ["class" => "form-control mb-2"],
                                             'data' => "images/"])
            ->add('date_creation', null, ['attr'=> ["class"=>  'form-control'],
                'widget' => 'single_text',
            ])

            ->add("creer" , SubmitType::class , ["label"=> isset($options["label"]) ? $options["label"]  : "Ajouter" , "attr" => [ "class" => "btn bouton col-6 mt-2 px-3" ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Habitation::class,
        ]);
    }
}
