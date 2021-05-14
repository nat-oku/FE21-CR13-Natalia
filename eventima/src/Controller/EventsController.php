<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('events/index.html.twig', [
            
        ]);
    }

    public function create(): Response
    {
        return $this->render('events/create.html.twig', [
            
        ]);
    }

    public function edit($id): Response
    {
        return $this->render('events/edit.html.twig', [
            
        ]);
    }

    public function delete($id): Response
    {
        return $this->render('events/delete.html.twig', [
            
        ]);
    }

    public function details($id): Response
    {
        return $this->render('events/details.html.twig', [
            
        ]);
    }
}
