<?php

namespace App\Controller;

use App\Entity\Fromage;
use App\Repository\FromageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/fromage', name: 'fromage_')]
final class FromageController extends AbstractController
{
    #[Route('/liste', name: 'liste')]
    public function liste(FromageRepository $fromageRepository): Response
    {
        $fromages = $fromageRepository->findAll();
        return $this->render('fromage/liste_fromage.html.twig', [
            'fromages' => $fromages
        ]);
    }

    #[Route('/creation', name: 'creation')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        $fromage = new Fromage();
        $fromage->setName('Chedar');
        $fromage2 = new Fromage();
        $fromage2->setName('Mozzarella');
        $fromage3 = new Fromage();
        $fromage3->setName('Camembert');
    
        // Persister et sauvegarder le nouveau fromage
        $entityManager->persist($fromage);
        $entityManager->persist($fromage2);
        $entityManager->persist($fromage3);
        $entityManager->flush();
    
        return new Response('Fromage créé avec succès !');
    }
}