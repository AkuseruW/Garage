<?php

namespace App\Controller\Admin;

use App\Entity\Marques;
use App\Entity\Voitures;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Retour sur le site', 'fa-solid fa-rotate-left', 'home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Voitures', 'fa-solid fa-car', Voitures::class);
        yield MenuItem::linkToCrud('Marques', 'fa-solid fa-layer-group', Marques::class);
    }
}
