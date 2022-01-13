<?php

namespace App\Controller;

use App\Form\CalculerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(Request $request): Response
    {    
        $formulaire=$this->createForm(CalculerType::class);
        $formulaire->handleRequest($request);
        if($formulaire->isSubmitted()){
            $data=$formulaire->getData();
            $nom=$data['nomPersonne'];
            $annee=$data['agePersonne'];
            $final=2022-$annee;
            return $this->render('accueil/success.html.twig',[
              'nom_uti'=>$nom,
              'annee_uti'=>$annee,
              'age_uti'=>$final  
            ]);
        }
        else{
        return $this->renderForm('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'formAfficher'=>$formulaire
        ]);
    }
    }
}
