<?php
namespace App\Controller;

use App\Repository\FormulaireRechercheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireRechercher extends AbstractController
{
    #[Route("/rechercher", name: "rechercher")]
    public function search(Request $request, FormulaireRechercheRepository $formulaireRechercheRepository): Response
    {
        $departement = $request->query->get('departement');
        $type = $request->query->get('type');
        $surfaceMin = $request->query->get('surfaceMin');
        $prixMin = $request->query->get('prixMin');
        $prixMax = $request->query->get('prixMax');
        $loyerMin = $request->query->get('loyerMin');
        $loyerMax = $request->query->get('loyerMax');
        $rentabiliteMin = $request->query->get('rentabiliteMin');

        // Récupérez d'autres critères de recherche depuis le formulaire

        $habitation = $formulaireRechercheRepository->findOneBySomeField(
            $prixMax,
            $departement,
            $type,
            $surfaceMin,
            $prixMin,
            $prixMax,
            $loyerMin,
            $loyerMax,
            $rentabiliteMin
            /* autres critères */
        );

        return $this->render('recherche/search.html.twig', [
            'habitation' => $habitation,
        ]);
    }
}
