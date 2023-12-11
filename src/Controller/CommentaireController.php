<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'app_commentaire')]
    public function index(Request $request, EntityManagerInterface $entityManager,): Response
    {
        //appelle du formulaire de temoignage
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commentaire);
            $entityManager->flush();
            $this->addFlash('success', 'Merci pour votre commentaire ! Il sera publié après modération !');
            return $this->redirectToRoute('app_commentaire');
        }

        return $this->render('commentaire/commentaire.html.twig', [
            'controller_name' => 'CommentaireController',
            'Commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }
}

