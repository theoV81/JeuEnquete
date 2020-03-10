<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
	* @Route("/", name="Accueil")
    */
    public function home(Request $request, LoggerInterface $logger)
    {
        
        $logger->info('Accès à l\'application');
        $testErreur = $this->getParameter('app.affiche_debug');
        if($testErreur)
        {
            echo "DANS ERREUR";
            $errCode = 100;
            $errMess = "Ceci est une erreur de test";
            # Ajout d'un param à la requête
            $request->attributes->set('errMess', $errMess);

            # GenerateUrl > générer une URL à partir d'une route
            # Redirect > rediriger vers une page externe
            return $this->redirectToRoute('GestionErreur', [
                'errCode' => $errCode,
                'errMess' => $errMess,
            ]);
        } else {
            $number = random_int(0, 100);
            return $this->render('front_pages/accueil.html.twig', [
                'number' => $number,
            ]);
        }
        
    }
}
