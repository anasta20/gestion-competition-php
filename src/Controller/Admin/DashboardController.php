<?php

namespace App\Controller\Admin;

use App\Entity\Commite;
use App\Entity\Etudiant;
use App\Entity\Filiere;
use App\Entity\Role;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       $url = $this->adminUrlGenerator->setController(EtudiantCrudController::class)->generateUrl();

          return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('UpfCodingChallenge');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        //yield MenuItem::linkToCrud('User', 'fas fa-graduation-cap', User::class);
     yield MenuItem::linkToCrud('Filiere', 'fas fa-school', Filiere::class);
    yield MenuItem::linkToCrud('Role', 'fas fa-pen-ruler', Role::class);
        yield MenuItem::linkToCrud('Etudiant', 'fas fa-graduation-cap', Etudiant::class);
    yield MenuItem::linkToCrud('Commite', 'fas fa-sitemap', Commite::class);
    }
}
