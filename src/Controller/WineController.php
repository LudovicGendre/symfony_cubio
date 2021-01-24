<?php

namespace App\Controller;

use App\Entity\Wine;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\WineRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WineController extends AbstractController
{
    /**
     * @Route("/", name="wines")
     */

  public function index(WineRepository $repo): Response
  {
    return $this->render('wines/index.html.twig', ['wine'=> $repo->findAll()]);
  }
   /**
     * @Route("/create", methods={"GET", "POST"})
     */
  public function create(Request $request, EntityManagerInterface $em)
  {
    if($request->isMethod('POST')) {
      $data = $request->request->all();

      if ($this->isCsrfTokenValid('wines_create', $data['_token'])) {
        $wine = new Wine;
        $wine->setTitle($data['title']);
        $wine->setDescription($data['description']);
        $em->persist($wine);
        $em->flush();
      }

      return $this->redirect('/');
    } 

    return $this->render('wines/create.html.twig');
  }
   /**
     * @Route("/connect")
     */
  public function connect() {
    return $this->render('wines/connexion.html.twig');
  }

}
