<?php
// src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
  /**
  * @Route("/{qqch}")
  */
  public function home($qqch)
  {
    $number = random_int(0,100);

    return $this->render('test.html.twig', [
     
      'qqch' => $qqch,
      'number' => $number,
      ]);
  }
}
