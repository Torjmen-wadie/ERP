<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request ,EntityManagerInterface $om, UserPasswordEncoderInterface $encoder)
    {
        $utilisateur=new Utilisateur();
        $form=$this->createForm(InscriptionType::class,$utilisateur);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid() )
        {
            $passwordCrypt= $encoder->encodePassword($utilisateur,$utilisateur->getPassword());
            $utilisateur->setPassword($passwordCrypt);
            $om->persist($utilisateur);
            $om->flush();
            return $this->redirectToRoute('compte');
        }
        return $this->render('admin_secu/inscription.html.twig',[
            "form"=>$form->createView()
        ]);
    }
     /**
     * @Route("/compte", name="compte")
     */
    public function compte()
    {
       
        return $this->render('admin_secu/compte.html.twig');
    }
    
     /**
     * @Route("/login", name="connexion")
     */
    public function login()
    {
       
        return $this->render('admin_secu/login.html.twig');
    }
    
    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexion()
    {
       
        
    }
}
