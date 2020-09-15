<?php

namespace App\Controller;

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
        $projects = ['Project1', 'Project2', 'Project3'];
        return $this->render('projects/index.html.twig', [
            'projects' => $projects
        ]);
    }
}