<?php

namespace App\Controller;

use App\Entity\Habitation;
use App\Form\HabitationType;
use App\Entity\FormulaireRecherche;
use App\Model\SearchData;
use App\Repository\FormulaireRechercheRepository;
use App\Repository\HabitationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;

class HabitationController extends AbstractController
{
    // #[Route('/logement', name: 'app_logement')]
    // public function index(): Response
    // {
    //     return $this->render('logement/index.html.twig', [
    //         'controller_name' => 'LogementController',
    //     ]);
    // }

    #[Route("/parc_immobilier", name:"parc_immobilier")]
    public function rp(HabitationRepository $habitationRepository, Request $request) : Response {

      // $searchData = new SearchData();//on crée notre instance de la class SearchData
      // $form = $this->createForm(SearchType::class, $searchData);//on va créer le formulaire

      // $form->handleRequest($request);//On récupère et gère les requêtes envoyées par le formulaire
      // if($form->isSubmitted() && $form->isValid()) {
      //   dd($searchData);
      // }

      // On récupère les logements de type résidence principale
      $habitation = $habitationRepository->findAll();
      return $this->render("habitation/parc_immobilier.html.twig", ["habitation" => $habitation]);
    }


    
// *************************************************************************************************
// #[route("/rechercher", name: "rechercher")]
// public function search(Request $request, FormulaireRechercheRepository $formulaireRechercheRepository)   : Response 
// {
//     $departement = $request->query->get('departement');
//     $type = $request->query->get('type');
//     $surfaceMin = $request->query->get('surfaceMin');
//     $prixMin = $request->query->get('prixMin');
//     $prixMax = $request->query->get('prixMax');
//     $loyerMin = $request->query->get('loyerMin');
//     $loyerMax = $request->query->get('loyerMax');
//     $rentabiliteMin = $request->query->get('rentabiliteMin');
//     // Récupérez d'autres critères de recherche depuis le formulaire

//     $habitation = $this->getDoctrine()
//         ->getRepository(FormulaireRecherche::class)
//         ->findAppartementsByCriteria($prixMax, $departement, $type, $surfaceMin, $prixMin, $prixMax, $loyerMin, $loyerMax, $rentabiliteMin /*, autres critères */);

//     return $this->render('recherche/resultatRecherche.html.twig', [
//         'habitation' => $habitation,
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
