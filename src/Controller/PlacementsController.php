<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlacementsController extends AbstractController{

  #[Route("/scpi", name: "scpi")]
    public function scpi() {
      return $this->render('placements/scpi.html.twig');
}
  #[Route("/assurance_vie", name: "assuranceVie")]
    public function assuranceVie() {
      return $this->render('placements/assuranceVie.html.twig');
}
  #[Route("/defiscalisation", name: "defiscalisation")]
    public function defiscalisation() {
      return $this->render('placements/defiscalisation.html.twig');
}

}