<?php

namespace App\Controller;

use App\Repository\EvenementHistoriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EvenementHistoriqueRepository $evenementHistoriqueRepository): Response
    {
        $evenements = $evenementHistoriqueRepository->findAll();
        return $this->render('home/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }
}
