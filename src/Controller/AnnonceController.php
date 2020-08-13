<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index(AnnonceRepository $repo)
    {
        $annonces = $repo->findAll();
        return $this->render('annonce/index.html.twig', [   
            'annonces' => $annonces,
        ]);
    }

    /**
     * @Route("/annonce/{id}", name="annonce_show")
     */
    public function show(AnnonceRepository $repo, $id)
    {
        $annonce = $repo->find($id);
        return $this->render('annonce/show.html.twig', [   
            'annonce' => $annonce,
            ]);
    }
}
