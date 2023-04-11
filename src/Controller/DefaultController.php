<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {

    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function indexAction() {
        $t = [[1,2,3],[4,5,6],[7,8,9]];
        $personne = new stdClass();
        $personne->Nom = 'itahriouan';
        $personne->Prenom = 'zakaria';
        return $this->render('base.html.twig', ['p'=>$personne, 't'=>$t]);
    }

}