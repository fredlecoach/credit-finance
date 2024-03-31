<?php
namespace App\Controller;

use App\Form\FormulaireRechercheType;
use App\Repository\HabitationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RechercheController extends AbstractController
{
    #[Route("/rechercher", name: "rechercher")]
    public function rechercher(HabitationRepository $hr, Request $request): Response
    {
        $form = $this->createForm(FormulaireRechercheType::class);
        $form->handleRequest($request);

        $resultats = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $criteria = $form->getData();
            $resultats = $hr->findByCriteria($criteria);

            return $this->render('recherche/resultatRecherche.html.twig', [
                'resultats' => $resultats,
            ]);
        }

        // Afficher tous les logements si aucun critère n'est spécifié
        $resultats = $hr->findAll();

        return $this->render('habitation/parc_immobilier.html.twig', [
            'form' => $form->createView(),
            'resultats' => $resultats,
        ]);
    }
}
