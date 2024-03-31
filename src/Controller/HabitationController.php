<?php

namespace App\Controller;

use App\Model\SearchData;
use App\Entity\Habitation;
use App\Form\HabitationType;
use App\Entity\FormulaireRecherche;
use App\Form\FormulaireRechercheType;
use App\Repository\HabitationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\FormulaireRechercheRepository;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HabitationController extends AbstractController
{
    #[Route("/parc_immobilier", name:"parc_immobilier")]
    
    public function rp(HabitationRepository $hr, Request $request) : Response {
      
      $form = $this->createForm(FormulaireRechercheType::class);//on spécifie quel formulaire on utilise

      $form->handleRequest($request);//on récupère la requête
      //si le formulaire est soumis et qu'il est valide, on peut y accéder
      if ($form->isSubmitted() && $form->isValid()) {  
        $criteria = $form->getData();
        $resultats = $hr->findByCriteria($criteria);//on recupere les resultats de recherche
        

          $data = $form->getData();//on récupère les données du formulaire
          // Gérer la soumission du formulaire
          // Par exemple, redirection vers une autre page avec les paramètres de recherche
          return $this->render('recherche/resultatRecherche.html.twig', $data);//on retourne les données vers la vue
      }

      // On récupère les logements de type résidence principale
      $habitation = $hr->findAll();
      return $this->render("habitation/parc_immobilier.html.twig", ["habitation" => $habitation, 'form'=>$form->createView()]);
        }
        
// *************************************************************************************************

  //     $form = $this->createForm(FormulaireRechercheType::class);
  //     $form->handleRequest($request);

  //     if ($form->isSubmitted() && $form->isValid()) {
  //         $criteria = $form->getData();
  //         $resultats = $hr->findByCriteria($criteria);

  //         return $this->render('recherche/resultatRecherche.html.twig', [
  //             'resultats' => $resultats,
  //         ]);
  //     }

  //     // Afficher tous les logements si aucun critère n'est spécifié
  //     $resultats = $hr->findAll();

  //     return $this->render('habitation/parc_immobilier.html.twig', [
  //         'form' => $form->createView(),
  //         'resultats' => $resultats,
  //     ]);
  // }
        
  
// ************GESTION**************************
    #[Route("/gestion", name: "gestion")]
    public function gestionHabitation( HabitationRepository $habitationRepository) : Response{
    $habitation = $habitationRepository->findAll() ;
    return $this->render("habitation/gestionHabitation.html.twig", ["habitation" => $habitation]);
    }

    // ***ajouter***********
    #[Route("ajout_habitation", name: "ajout_habitation")]
    public function ajouter( Request $request, EntityManagerInterface $em){
  
        $habitation = new Habitation();
        $form = $this->createForm(HabitationType::class, $habitation);
        
        $form->handleRequest($request);
      
        if($form->isSubmitted() && $form->isValid()){
          $em->persist($habitation);
          $em->flush();
          return $this->redirectToRoute("ajout_habitation");
        }
      return $this->render("habitation/ajout_habitation.html.twig", ["form" => $form]);//renvoie vers le dossier new.html
      }


    //  MODIFIER *********************************************
    #[Route("/modifier/{id}", name: "modifier")]
    public function modifierHabitation( int $id , HabitationRepository $habitationRepository ,Request $request , EntityManagerInterface $em){
        $habitation = $habitationRepository->findOneBy([ "id" => $id ]);
    $form = $this->createForm(HabitationType::class , $habitation , ["label" => "modifier"]);
    $form->handleRequest($request) ; 
    if($form->isSubmitted() && $form->isValid()){
        $em->persist($habitation); 
        $em->flush();   
        return $this->redirectToRoute("gestion");//=>path du menu ou le "name" de la route = gestion
    }
    return $this->render("habitation/modifierHabitation.html.twig", ["form" => $form]);
    }

    // **SUPPRIMER****************************************
    #[Route("/supprimer/{id}",name:"supprimer")]
    public function suppressionHabitation (EntityManagerInterface $em, HabitationRepository $hr, int $id):Response{
    $habitation = $hr->findOneBy(["id" => $id]);
    $em->remove($habitation);
    $em->flush();
    return $this->redirectToRoute("gestion");//correspond au path du menu header

    }
}
