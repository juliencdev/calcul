<?php

namespace App\Controller;

use App\Form\ContacterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {   
        $formulaire=$this->createForm(ContacterType::class);
        $formulaire->handleRequest($request);
        if($formulaire->isSubmitted()){
           $data=$formulaire->getData();
           $mail=$data['email'];
           $demande=$data['contenu'];
           return $this->render('contact/success.html.twig', [
               'mail_uti'=>$mail,
               'demande_uti'=>$demande
           ]);

        }
        else{
        
        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'formAfficher'=>$formulaire
        ]);}
    }
}
