<?php

namespace App\Controller;

//importing Form Components extentions
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//importing the Events Entity
use App\Entity\Events;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


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
    public function create(Request $request): Response
    {   
        $events = new Events;
        // dd($events);
        $form = $this->createFormBuilder($events)
            ->add('event_name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))        
            ->add('event_descr', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))        
            ->add('event_img', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))        
            ->add('event_capac', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))        
            ->add('cont_email', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))        
            ->add('cont_phone', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))        
            ->add('event_address', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
            ->add('event_url', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))        

            //date-time field
            ->add('date_time', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))

            //event-type dropdown field
            ->add('event_type', ChoiceType::class, array('choices'=>array('exhibition'=>'exhibition', 'concert'=>'concert', 'open-air concert'=>'open-air concert', 'festival'=>'festival'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))

            //submit button
            ->add('save', SubmitType::class, array('label'=> 'Create Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))

            ->getForm();

            $form->handleRequest($request);
        //dd($form);

        //if form submitted -- update DB
        if($form->isSubmitted() && $form->isValid()){
            //fetching data
            $event_name = $form['event_name']->getData();
            //dd($event_name);
            $event_descr = $form['event_descr']->getData();
            $event_img = $form['event_img']->getData();
            $event_capac = $form['event_capac']->getData();
            $cont_email = $form['cont_email']->getData();
            $cont_phone = $form['cont_phone']->getData();
            $event_address = $form['event_address']->getData();
            $event_url = $form['event_url']->getData();
            $date_time = $form['date_time']->getData();
            $event_type = $form['event_type']->getData();
            //dd($event_name);

            $events->setEventName($event_name);
            $events->setEventDescr($event_descr);
            $events->setEventImg($event_img);
            $events->setEventCapac($event_capac);
            $events->setContEmail($cont_email);
            $events->setContPhone($cont_phone);
            $events->setEventAddress($event_address);
            $events->setEventUrl($event_url);
            $events->setDateTime($date_time);
            $events->setEventType($event_type);

            //dd($events);

            $entityMngr = $this->getDoctrine()->getManager();
            
            //preparing data for upload to DB
            $entityMngr->persist($events);

            //query -- uploading data to DB
            $entityMngr->flush();

            //adding flash -- short msg to be display after submit
            $this->addFlash(
                'notice',
                'New Event Added'
            );
            return $this->redirectToRoute('index');
        }
        return $this->render('events/create.html.twig', 
            array('form'=>$form->createView())
        );
    }

    // function for editing event
    public function edit($id): Response
    {
        return $this->render('events/edit.html.twig', [
            
        ]);
    }

    // function for deleting events from DB
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
