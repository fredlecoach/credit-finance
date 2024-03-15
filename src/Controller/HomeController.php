<?php
namespace App\Controller;

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
}