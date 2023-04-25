<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;

class MainController extends AbstractController
{   
    #[Route('/', name: 'app_main')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        
        $categorie = $entityManager->getRepository(Categorie::class)->findAll();
        if(!$categorie){
            throw $this->createNotFoundException('No categorie found');
        }
        return $this->render('main/index.html.twig',[
            'categories' => $categorie,
        ]);
    }
}
