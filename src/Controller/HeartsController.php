<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeartsController extends AbstractController
{
    /**
     * @Route("/hearts", name="hearts")
     */
    public function index(): Response
    {
        return $this->render('hearts/index.html.twig');
    }
}
