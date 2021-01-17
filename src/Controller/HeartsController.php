<?php

namespace App\Controller;

use App\Entity\Heart;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\HeartRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeartsController extends AbstractController
{
    /**
     * @Route("/", name="hearts")
     */

  public function index(HeartRepository $repo): Response
  {
    return $this->render('hearts/index.html.twig', ['hearts'=> $repo->findAll()]);
  }
   /**
     * @Route("/create", methods={"GET", "POST"})
     */
  public function create(Request $request, EntityManagerInterface $em)
  {
    if($request->isMethod('POST')) {
      $data = $request->request->all();

      if ($this->isCsrfTokenValid('hearts_create', $data['_token'])) {
        $heart = new Heart;
        $heart->setTitle($data['title']);
        $heart->setDescription($data['description']);
        $em->persist($heart);
        $em->flush();
      }

      return $this->redirect('/');
    } 

    return $this->render('hearts/create.html.twig');
  }
   /**
     * @Route("/connect")
     */
  public function connect() {
    return $this->render('hearts/connexion.html.twig');
  }

}
