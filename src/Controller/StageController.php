<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Repository\StageRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Stage')]
class StageController extends AbstractController
{
    #[Route('/', name: 'show_stage')]
    public function index(StageRepository $stageRepo): Response
    {
        $stages = $stageRepo->findAll();
        return $this->render('stage/index.html.twig', [
            'stages' => $stages
        ]);
    }
    #[Route('/add', name: 'add_stage')]
    public function add(StageRepository $stageRepo): Response
    {
        $stage = new Stage();
        $stage->setTitle('developement d\'un CRM');
        $stage->setDescription('description');
        $stage->setStartDate(new DateTime("2023-03-22"));
        $stage->setEndDate(new DateTime("2023-05-22"));
        $stage->setCompany('CApgemini');

        $stageRepo->save($stage, true);

        return new Response('enregisté');

    }
}
