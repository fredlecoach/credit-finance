<?php
namespace App\Controller;

use App\Repository\HabitationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AffichageController extends AbstractController{

  #[Route("/afficher/{id}", name: "afficher" )]
  public function  afficher($id, HabitationRepository $hr) :Response {
    $habitation = $hr->findOneBy(['id' => $id]);
    return $this->render("affichage/afficher.html.twig", ["id" => $id, "habitation"=> $habitation]);
}

}