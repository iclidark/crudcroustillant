<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BurgerController extends AbstractController
{
    #[Route('/burgers', name: 'burger_list')]
    public function list(): Response
    {
        return $this->render('burgers_list.html.twig', [
            'title' => 'Liste des burgers',
        ]);
    }

    #[Route('/burger/{id}', name: 'burger_show')]
    public function show(int $id): Response
    {
        // Exemple de "base de données" simulée avec un tableau associatif
        $burgers = [
            1 => ['nom' => 'Cheese Burger', 'description' => 'Un burger classique avec fromage.'],
            2 => ['nom' => 'Bacon Burger', 'description' => 'Un burger garni de bacon croustillant.'],
            3 => ['nom' => 'Veggie Burger', 'description' => 'Un burger végétarien savoureux.'],
        ];

        // Vérification si le burger existe
        if (!isset($burgers[$id])) {
            return $this->render('burger_show.html.twig', [
                'id' => $id,
                'burger' => null,
            ]);
        }

        return $this->render('burger_show.html.twig', [
            'id' => $id,
            'burger' => $burgers[$id],
        ]);
    }
}
