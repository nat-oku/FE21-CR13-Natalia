<?php

namespace App\Controller;

//importing the Events Entity
use App\Entity\Events;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    public function index(): Response
    {
        // fetch all items from the class Events
        $events = $this->getDoctrine()->getRepository('App:Events')->findAll();
         //dd($events);
        return $this->render('events/index.html.twig', 
            array('eventsAll'=>$events)
        );
    }

    // function for adding event to DB
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
