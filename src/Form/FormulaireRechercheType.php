<?php

namespace App\Form;

use App\Model\SearchData;
use App\Entity\Habitation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Choice;

class FormulaireRechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          
            ->add('departement', ChoiceType::class, ['required' => false, 
                                                     'label' => 'Département ',
                                                    "placeholder"=> "sélectionner un département", 
                                                    'choices' => ["01 - Ain - Bourg-en-Bresse"=>"01 - Ain -             Bourg-en-Bresse",
                                                                    "02 - Aisne - Laon" => "02 - Aisne - Laon"  ,
                                                                    "03 - Allier - Moulins"=>"03 - Allier - Moulins",
                                                                    "04 - Alpes-de-Haute-Provence - Digne"=>"04 - Alpes-de-Haute-Provence - Digne",
                                                                    "05 - Hautes-Alpes - Gap"=>"05 - Hautes-Alpes - Gap",
                                                                    "06 - Alpes Maritimes - Nice"=>"06 - Alpes Maritimes - Nice",
                                                                    "07 - Ardèche - Privas"=>"07 - Ardèche - Privas",
                                                                    "08 - Ardennes - Charleville-Mézières"=>"08 - Ardennes - Charleville-Mézières",
                                                                    "09 - Ariège - Foix"=>"09 - Ariège - Foix",
                                                                    "10 - Aube - Troyes"=>"10 - Aube - Troyes",
                                                                    "11 - Aude - Carcassonne"=>"11 - Aude - Carcassonne",
                                                                    "12 - Aveyron - Rodez"=> "12 - Aveyron - Rodez",
                                                                    "13 - Bouches-du-Rhône - Marseille"=>"13 - Bouches-du-Rhône - Marseille",
                                                                    "14 - Calvados - Caen"=>"14 - Calvados - Caen",
                                                                    "15 - Cantal - Aurillac"=>"15 - Cantal - Aurillac",
                                                                    "16 - Charente - Angoulême"=>"16 - Charente - Angoulême",
                                                                    "17 - Charente-Maritime - La Rochelle"=>"17 - Charente-Maritime - La Rochelle",
                                                                    "18 - Cher - Bourges"=>"18 - Cher - Bourges",
                                                                    "19 - Corrèze - Tulle"=>"19 - Corrèze - Tulle",
                                                                    "2A - Corse-du-Sud - Ajaccio"=>"2A - Corse-du-Sud - Ajaccio",
                                                                    "2B - Haute Corse - Bastia"=>"2B - Haute Corse - Bastia",
                                                                    "21 - Côte-d'Or - Dijon"=>"21 - Côte-d'Or - Dijon",
                                                                    "22 - Côtes d'Armor - St-Brieuc"=>"22 - Côtes d'Armor - St-Brieuc",
                                                                    "23 - Creuse - Guéret"=>"23 - Creuse - Guéret",
                                                                    "24 - Dordogne - Périgueux"=>"24 - Dordogne - Périgueux",
                                                                    "25 - Doubs - Besançon"=>"25 - Doubs - Besançon",
                                                                    "26 - Drôme - Valence"=>"26 - Drôme - Valence",
                                                                    "27 - Eure - Evreux"=>"27 - Eure - Evreux",
                                                                    "28 - Eure-et-Loir - Chartres"=>"28 - Eure-et-Loir - Chartres",
                                                                    "29 - Finistère - Quimper"=>"29 - Finistère - Quimper",
                                                                    "30 - Gard - Nîmes"=>"30 - Gard - Nîmes",
                                                                    "31 - Haute Garonne - Toulouse"=>"31 - Haute Garonne - Toulouse",
                                                                    "32 - Gers - Auch"=>"32 - Gers - Auch",
                                                                    "33 - Gironde - Bordeaux"=>"33 - Gironde - Bordeaux",
                                                                    "34 - Hérault - Montpellier"=>"34 - Hérault - Montpellier",
                                                                    "35 - Ille-et-Vilaine - Rennes"=>"35 - Ille-et-Vilaine - Rennes",
                                                                    "36 - Indre - Châteauroux"=>"36 - Indre - Châteauroux",
                                                                    "37 - Indre-et-Loire - Tours"=>"37 - Indre-et-Loire - Tours",
                                                                    "38 - Isère - Grenoble"=>"38 - Isère - Grenoble",
                                                                    "39 - Jura - Lons-le-Saunier"=> "39 - Jura - Lons-le-Saunier",
                                                                    "40 - Landes - Mont-de-Marsan"=>"40 - Landes - Mont-de-Marsan",
                                                                    "41 - Loir-et-Cher - Blois"=>"41 - Loir-et-Cher - Blois",
                                                                    "42 - Loire - St-Étienne"=>"42 - Loire - St-Étienne",
                                                                    "43 - Haute Loire - Le Puy"=>"43 - Haute Loire - Le Puy",
                                                                    "44 - Loire Atlantique - Nantes"=>"44 - Loire Atlantique - Nantes",
                                                                    "45 - Loiret - Orléans"=>"45 - Loiret - Orléans",
                                                                    "46 - Lot - Cahors"=>"46 - Lot - Cahors",
                                                                    "47 - Lot-et-Garonne - Agen"=>"47 - Lot-et-Garonne - Agen",
                                                                    "48 - Lozère - Mende"=>"48 - Lozère - Mende",
                                                                    "49 - Maine-et-Loire - Angers"=>"49 - Maine-et-Loire - Angers",
                                                                    "50 - Manche - St-Lô"=>"50 - Manche - St-Lô",
                                                                    "51 - Marne - Châlons-sur-Marne"=> "51 - Marne - Châlons-sur-Marne",
                                                                    "52 - Haute Marne - Chaumont"=>"52 - Haute Marne - Chaumont",
                                                                    "53 - Mayenne - Laval"=> "53 - Mayenne - Laval",
                                                                    "54 - Meurthe-et-Moselle - Nancy"=>"54 - Meurthe-et-Moselle - Nancy",
                                                                    "55 - Meuse - Bar-le-Duc"=>"55 - Meuse - Bar-le-Duc",
                                                                    "56 - Morbihan - Vannes"=>"56 - Morbihan - Vannes",
                                                                    "57 - Moselle - Metz"=>"57 - Moselle - Metz",
                                                                    "58 - Nièvre - Nevers"=>"58 - Nièvre - Nevers",
                                                                    "59 - Nord - Lille"=> "59 - Nord - Lille",
                                                                    "60 - Oise - Beauvais"=>"60 - Oise - Beauvais",
                                                                    "61 - Orne - Alençon"=>"61 - Orne - Alençon",
                                                                    "62 - Pas-de-Calais - Arras"=>"62 - Pas-de-Calais - Arras",
                                                                    "63 - Puy-de-Dôme - Clermont-Ferrand"=>"63 - Puy-de-Dôme - Clermont-Ferrand",
                                                                    "64 - Pyrénées Atlantiques - Pau"=>"64 - Pyrénées Atlantiques - Pau",
                                                                    "65 - Hautes Pyrénées - Tarbes"=>"65 - Hautes Pyrénées - Tarbes",
                                                                    "66 - Pyrénées Orientales - Perpignan"=>"66 - Pyrénées Orientales - Perpignan",
                                                                    "67 - Bas-Rhin - Strasbourg"=>"67 - Bas-Rhin - Strasbourg",
                                                                    "68 - Haut-Rhin - Colmar"=>"68 - Haut-Rhin - Colmar",
                                                                    "69 - Rhône - Lyon"=>"69 - Rhône - Lyon",
                                                                    "70 - Haute Saône - Vesoul"=>"70 - Haute Saône - Vesoul",
                                                                    "71 - Saône-et-Loire - Mâcon"=>"71 - Saône-et-Loire - Mâcon",
                                                                    "72 - Sarthe - Le Mans"=>"72 - Sarthe - Le Mans",
                                                                    "73 - Savoie - Chambéry"=>"73 - Savoie - Chambéry",
                                                                    "74 - Haute Savoie - Annecy"=>"74 - Haute Savoie - Annecy",
                                                                    "75 - Paris - Paris"=> "75 - Paris - Paris",
                                                                    "76 - Seine Maritime - Rouen"=>"76 - Seine Maritime - Rouen",
                                                                    "77 - Seine-et-Marne - Melun"=>"77 - Seine-et-Marne - Melun",
                                                                    "78 - Yvelines - Versailles"=>"78 - Yvelines - Versailles",
                                                                    "79 - Deux-Sèvres - Niort"=>"79 - Deux-Sèvres - Niort",
                                                                    "80 - Somme - Amiens"=>"80 - Somme - Amiens",
                                                                    "81 - Tarn - Albi"=> "81 - Tarn - Albi",
                                                                    "82 - Tarn-et-Garonne - Montauban"=>"82 - Tarn-et-Garonne - Montauban",
                                                                    "83 - Var - Toulon"=>"83 - Var - Toulon",
                                                                    "84 - Vaucluse - Avignon"=> "84 - Vaucluse - Avignon",
                                                                    "85 - Vendée - La Roche-sur-Yon"=>"85 - Vendée - La Roche-sur-Yon",
                                                                    "86 - Vienne - Poitiers"=>"86 - Vienne - Poitiers",
                                                                    "87 - Haute Vienne - Limoges"=>"87 - Haute Vienne - Limoges",
                                                                    "88 - Vosges - Épinal"=>"88 - Vosges - Épinal",
                                                                    "89 - Yonne - Auxerre"=>"89 - Yonne - Auxerre",
                                                                    "90 - Territoire de Belfort - Belfort"=>"90 - Territoire de Belfort - Belfort",
                                                                    "91 - Essonne - Evry"=> "91 - Essonne - Evry",
                                                                    "92 - Hauts-de-Seine - Nanterre"=>"92 - Hauts-de-Seine - Nanterre",
                                                                    "93 - Seine-St-Denis - Bobigny"=>"93 - Seine-St-Denis - Bobigny",
                                                                    "94 - Val-de-Marne - Créteil"=> "94 - Val-de-Marne - Créteil",
                                                                    "95 - Val-D'Oise - Pontoise"=>"95 - Val-D'Oise - Pontoise",
                                                                    "971 - Guadeloupe - Basse-Terre"=>"971 - Guadeloupe - Basse-Terre",
                                                                    "972 - Martinique - Fort-de-France"=>"972 - Martinique - Fort-de-France",
                                                                    "973 - Guyane - Cayenne"=> "973 - Guyane - Cayenne",
                                                                    "974 - La Réunion - Saint-Denis"=>"974 - La Réunion - Saint-Denis",
                                                                    "976 - Mayotte - Mamoudzou"=> "976 - Mayotte - Mamoudzou"],
                                                    "attr"=>["class"=> "form-control"]])

            ->add('type',  ChoiceType::class,  ['label' => 'Type de biens',
                                                'required' => false, 
                                                'placeholder' => 'cliquer pour sélectionner : maison, appartement, duplex etc...',
                                                'choices' => ['Appartement' => 'Appartement',
                                                              'Maison' => 'Maison',
                                                              'Duplex' => 'Duplex',
                                                              'Studio' => 'Studio',
                                                              'Villa' => 'Villa'],
                                                'attr' => ['class' => 'form-control'],
            ])

            ->add('surfaceMin', NumberType::class, ["required" => false, 
                                                    "label" => "Surface Minimum ",
                                                    "attr"=>["placeholder"=> "m²", 
                                                     "class"=> "form-control"]])

            ->add('prixMin', NumberType::class, ["label"=> "Budget d'achat minimum",
                                                 "required" => false,
                                                 "attr"=>["placeholder"=> "valeur minimum en €", 
                                                     "class"=> "form-control"]])

            ->add('prixMax', NumberType::class, ["label"=> "Budget d'achat maximum", "required"=>false,
                                                 "attr"=>["placeholder"=> "valeur maximum en €", 
                                                 "class"=> "form-control"]])

            ->add('loyerMin', NumberType::class, ["required"=>false,
                                                  "label"=>"Loyer minimum perçu / mois",
                                                  "attr"=>["placeholder"=> "ex : 500€", 
                                                           "class"=> "form-control"]])

            ->add('rentabiliteMin', NumberType::class, ["required"=>false,
                                                        "label"=> "Rentabilité minimale annuelle",
                                                        "attr"=>["placeholder"=> "ex : 5%", 
                                                        "class"=> "form-control"]])

            ->add("creer" , SubmitType::class , ["label"=> isset($options["label"]) ? $options["label"]  : "Rechercher" , "attr" => [ "class" => "btn bouton size-btn mt-3 px-3" ]])
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
