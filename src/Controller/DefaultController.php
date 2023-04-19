<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {

    
    #[Route("/", name : "index")]
    public function indexAction(): Response
     {
        $t = [[1,2,3],[4,5,6],[7,8,9]];
        $personne = new stdClass();
        $personne->Nom = 'itahriouan';
        $personne->Prenom = 'zakaria';
        return $this->render('base.html.twig', ['p'=>$personne, 't'=>$t]);
    }
    #[Route("/home{id}", name : "home")]
    public function homeAction($id): Response
     {
        $id = $id *2;
        return $this->render('home.html.twig', ['id' => $id]);
    }

}