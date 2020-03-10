<?php
// src/Controller/ErrorHandlerController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

class ErrorHandlerController extends AbstractController
{
  /**
  * @Route("/erreur/{errCode}",
  * name="GestionErreur")
  */

  public function error(LoggerInterface $logger,Request $request, $errCode)
  {
    $logger->info('Récupération du logger');
    $errMess = $request->attributes->get('errMess');

    return $this->render('front_pages/errorHandler.html.twig', [

      'errCode' => $errCode,
      'errMess' => $errMess,
      ]);
    
  }
}