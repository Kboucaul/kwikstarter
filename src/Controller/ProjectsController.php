<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectsController extends AbstractController
{
    /**
     * Index : Affcihe l'ensemble des projets
     *
     * @Route("/projects", name="projects")
     * @Route("/", name="homepage")
     * 
     * @return Response
     */
    public function index():Response
    {
        $project1 = new Project();
        $project2 = new Project();
        $project3 = new Project();

        $project1->setName('Ecole-pour-tous')
                 ->setDescription("Création d'une école publique permettant aux enfants d'avoir accès à l'éducation") 
                 ->setTargetAmount(1024000);
    
        $project2->setName('Soin-pour-tous')
                 ->setDescription("Création d'un hopital pour permettre à tous d'avoir accès aux soins") 
                 ->setTargetAmount(23000000);  

        $project3->setName('Eau-pour-tous')
                 ->setDescription("Mise en place de services d'assainissement de l'eau pour permettre à tous d'avoir accès à l'au potable") 
                 ->setTargetAmount(7000000);
                 
        $projects = [$project1, $project2, $project3];

        $em = $this->getDoctrine()->getManager();
        
        $em->persist($project1);
        $em->persist($project2);
        $em->persist($project3);

        $em->flush();

        return $this->render('projects/index.html.twig', [
            'projects' => $projects
        ]);
    }
}