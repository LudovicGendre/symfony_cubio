<?php

namespace App\Controller;

use App\Entity\Heart;
use Twig\Environment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeartsController extends AbstractController
{
  private $em;

  public function _construct(Environment $twig,EntityManagerInterface $em)
  {
    dd($twig);
    
    $this->$em = $em;
  }
    /**
     * @Route("/hearts", name="hearts")
     */
    public function index(): Response
    {
      $heart = new Heart;
      $heart ->  setTitle('Title 2');
      $heart ->  setDescription('Description 2');

      $em = $this->getDoctrine()->getManager();

      $this -> em -> persist($heart);
      $this -> em -> flush();

      dump($heart);
      return $this->render('hearts/index.html.twig');
    }
}
