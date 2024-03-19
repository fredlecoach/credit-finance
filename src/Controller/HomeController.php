<?php
namespace App\Controller;

use App\Repository\LogementsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController{

  #[Route('/', name: 'home')]
  public function index() {
    return $this->render('front/home.html.twig');
  }

  #[Route("/investissement_locatif", name:"investissement_locatif")]
  public function investissement() {
    return $this->render("front/investissement.html.twig");
  }

  #[Route("/residence_principale", name:"residence_principale")]
  public function rp(LogementsRepository $logementsRepository) : Response {
    // On récupère les logements de type résidence principale
    $logements = $logementsRepository->findAll();
    return $this->render("front/residence_principale.html.twig", ["logements" => $logements]);
  }
}