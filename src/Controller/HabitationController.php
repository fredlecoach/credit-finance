<?php

namespace App\Controller;

use App\Entity\Habitation;
use App\Form\HabitationType;
use App\Repository\HabitationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HabitationController extends AbstractController
{
    // #[Route('/logement', name: 'app_logement')]
    // public function index(): Response
    // {
    //     return $this->render('logement/index.html.twig', [
    //         'controller_name' => 'LogementController',
    //     ]);
    // }

    #[Route("/residence_principale", name:"residence_principale")]
    public function rp(HabitationRepository $habitationRepository) : Response {
      // On récupère les logements de type résidence principale
      $habitation = $habitationRepository->findAll();
      return $this->render("habitation/residence_principale.html.twig", ["habitation" => $habitation]);
    }
    
// *************************************************************************************************

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

    // réglage des barres de prix
    // #[Route('/ajout_habitation', name: "ajout_habitation")]
    public function afficherTranchePrix(Request $request): Response
    {
        $valeurPrix = $request->query->get('prix'); // Récupération de la valeur du curseur

        // Détermination de la tranche de prix en fonction de la valeur du curseur
        if ($valeurPrix < 51000) {
            $tranchePrix = "30000 - 50000";
        } else if ($valeurPrix < 71000) {
            $tranchePrix = "50000 - 70000";
        } else if ($valeurPrix < 101000) {
            $tranchePrix = "70000 - 100000";
        } else if ($valeurPrix < 151000) {
            $tranchePrix = "100000 - 150000";
        } else if ($valeurPrix < 201000) {
            $tranchePrix = "150000 - 200000";
        } else if ($valeurPrix < 251000) {
            $tranchePrix = "200000 - 250000";
        } else if ($valeurPrix < 301000) {
            $tranchePrix = "250000 - 300000";
        } else if ($valeurPrix < 351000) {
            $tranchePrix = "300000 - 350000";
        } else if ($valeurPrix < 401000) {
            $tranchePrix = "350000 - 400000";
        } else if ($valeurPrix < 501000) {
            $tranchePrix = "450000 - 500000";
        } else {
            $tranchePrix = "+ 500000";
        }

        return $this->render('habitation/ajout_habitation.html.twig', [
            'tranche_prix' => $tranchePrix
        ]);
    }
}
