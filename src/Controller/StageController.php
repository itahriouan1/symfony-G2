<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Form\StageType;
use App\Repository\StageRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/delete{id}', name: 'delete_stage')]
    public function delete(StageRepository $stageRepo, $id): Response
    {
        $stage = $stageRepo->find($id);
        $stageRepo->remove($stage, true);
        return new Response('stage supprimé');
    }

    #[Route('/create', name: 'create_stage')]
    public function create(StageRepository $stageRepo, Request $request): Response
    {
        $stage = new Stage();
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $stageRepo->save($stage, true);
            return $this->redirectToRoute('show_stage');
        }
        return $this->render('stage/form.html.twig',['form' => $form]);

    }

    #[Route('/update{id}', name: 'update_stage')]
    public function update(StageRepository $stageRepo, Request $request, $id): Response
    {
        $stage = $stageRepo->find($id);
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $stageRepo->save($stage, true);
            return $this->redirectToRoute('show_stage');
        }
        return $this->render('stage/form.html.twig',['form' => $form]);

    }
    

}
