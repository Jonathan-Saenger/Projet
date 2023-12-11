<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use App\Entity\Commentaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Annonces des évènements', 'fas fa-list', Evenement::class);
        yield MenuItem::linkToCrud('Commentaire', 'fas fa-comment', Commentaire::class);
        yield MenuItem::linkToUrl('Retour sur le site', 'fas fa-home', $this->generateUrl('app_home'));
    }
}