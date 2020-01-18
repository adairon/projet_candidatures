<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Form\RdvType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RdvController extends AbstractController
{
    /**
     * @Route("/rdv", name="rdv")
     */
    public function index()
    {
        return $this->render('rdv/index.html.twig', [
            'controller_name' => 'RdvController',
        ]);
    }

    /**
     * @Route("/rdv/new", name"new_rdv")
     */
    public function new(Request $request){
        $rdv = new Rdv();
        $rdvForm = $this->createForm(RdvType::class,$rdv);
        $rdvForm->handleRequest($request);
        if ($rdvForm->isSubmitted() && $rdvForm->isValid()) {
            $data = $rdvForm->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('candidature_index');
        }
        return $this->render('rdv/new.html.twig', [
            'rdvForm' => $rdvForm->createView(),
        ]);
    }
}
