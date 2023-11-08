<?php

namespace App\Controller;


use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(ManagerRegistry $doctrine, EvenementRepository $EvenementRepository): Response
    {
        //appelle des évènements depuis la BDD
        $EvenementRepository = $doctrine->getRepository(Evenement::class);
        $Evenement = $EvenementRepository ->findAll();

        return $this->render('evenement/evenement.html.twig', [
            'controller_name' => 'EvenementController',
            'Evenement' => $Evenement,
        ]);
    }
}
