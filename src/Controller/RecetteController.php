<?php

namespace App\Controller;

use App\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RecetteType;
use App\Entity\Recette;

class RecetteController extends AbstractController
{
    /**
     * @Route("/recettes", name="recettes.index")
     */
    public function index(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $recettes = $em->getRepository(Recette::class)->findAll();
        return $this->render('recettes/index.html.twig', [
            'recettes' => $recettes
        ]);
    }
    /**
     * @Route("/recettes/new", name="recettes.new")
     */
    public function new(Request $request)
    {
        $em         = $this->getDoctrine()->getManager();
        $recette  = new Recette();
        $form       = $this->createForm(RecetteType::class, $recette);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->persist($recette);
            $em->flush();
            return $this->redirectToRoute('recettes.index');
        }
        return $this->render('recettes/new.html.twig', [
            'form' => $form->createView(),
        ]);
        return $this->redirectToRoute('recettes');
    }
}