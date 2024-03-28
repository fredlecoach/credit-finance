<?php

namespace App\Form;

use App\Entity\Habitation;
use App\Model\SearchData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormulaireRechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          
            ->add('departement', TextType::class, ["attr"=>
                                                  ["placeholder"=> "val de marne", 
                                                   "class"=> "form-control"]])

            ->add('type',  TextType::class, ["attr"=>["placeholder"=> "appartement, maison, duplex, etc...", 
                                             "class"=> "form-control"]])

            ->add('surfaceMin', NumberType::class, ["attr"=>["placeholder"=> "m²", 
                                                     "class"=> "form-control"]])

            ->add('prixMin', NumberType::class, ["attr"=>["placeholder"=> "50000€", 
                                                     "class"=> "form-control"]])

            ->add('prixMax', NumberType::class, ["attr"=>["placeholder"=> "500000€", 
                                                 "class"=> "form-control"]])

            ->add('loyerMin', NumberType::class, ["attr"=>["placeholder"=> "500€", 
                                                     "class"=> "form-control"]])

            ->add('rentabiliteMin', NumberType::class, ["attr"=>["placeholder"=> "5%", 
                                                     "class"=> "form-control"]])

            ->add("creer" , SubmitType::class , ["label"=> isset($options["label"]) ? $options["label"]  : "Rechercher" , "attr" => [ "class" => "btn bouton mt-2 px-3" ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // 'data_class' => SearchData::class,
            'method' => 'GET', // On utilise le GET pour l'affichage des résultats pour les formulaires
        ]);
    }
}
