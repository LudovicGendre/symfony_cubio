<?php

namespace App\Controller;

use App\Entity\Heart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeartsController extends AbstractController
{
    /**
     * @Route("/hearts", name="hearts")
     */

  public function index(EntityManagerInterface $em): Response
  {
    $repo = $em->getRepository(Heart::class);

    $hearts = $repo->findAll();
    return $this->render('hearts/index.html.twig', ['hearts' => $hearts]);
  }
}
