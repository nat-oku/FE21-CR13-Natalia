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
            ->add('event_type', ChoiceType::class, array('choices'=>array('exhibition'=>'exhibition', 'concert'=>'concert', 'open-air cinema'=>'open-air cinema', 'festival'=>'festival'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))

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
    public function edit(Request $request, $id): Response
    {
        $events = $this->getDoctrine()->getRepository('App:Events')->find($id);

        $events->setEventName($events->getEventName());
        $events->setEventDescr($events->getEventDescr());
        $events->setEventImg($events->getEventImg());
        $events->setEventCapac($events->getEventCapac());
        $events->setContEmail($events->getContEmail());
        $events->setContPhone($events->getContPhone());
        $events->setEventAddress($events->getEventAddress());
        $events->setEventUrl($events->getEventUrl());
        $events->setEventType($events->getEventType());
        $events->setDateTime($events->getDateTime());
        //dd($events);

        $form = $this->createFormBuilder($events)
            ->add('event_name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
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
            ->add('event_type', ChoiceType::class, array('choices'=>array('exhibition'=>'exhibition', 'concert'=>'concert', 'open-air cinema'=>'open-air cinema', 'festival'=>'festival'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))

            //submit button
            ->add('save', SubmitType::class, array('label'=> 'Save Changes', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
            ->getForm();
        $form->handleRequest($request);

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

            $entityMngr = $this->getDoctrine()->getManager();
            
            //preparing data for upload to DB
            $entityMngr->persist($events);

            //query -- uploading data to DB
            $entityMngr->flush();

            //adding flash -- short msg to be display after submit
            $this->addFlash(
                'notice',
                'Event has been updated'
            );
            return $this->redirectToRoute('index');
        }


        return $this->render('events/edit.html.twig',
            array('events' => $events, 'form' => $form->createView())
        );
    }

    // function for deleting events from DB
    public function delete($id): Response
    {
        $entityMngr = $this->getDoctrine()->getManager();
        $events = $entityMngr->getRepository('App:Events')->find($id);
        //dd($events);
        
        //removing the row & preparing it for update of DB
        $entityMngr->remove($events);

        //query --> updating the DB
        $entityMngr->flush();
        $this->addFlash(
            'notice',
            'Event has been deleted'
        );

        return $this->redirectToRoute('index');

        return $this->render('events/delete.html.twig',
            array('events' => $events, 'form' => $form->createView())
        );
    }

    // function for displayind a details page for each event
    public function details($id): Response
    {
        $events = $this->getDoctrine()->getRepository('App:Events')->find($id);
        //dd($events);
        return $this->render('events/details.html.twig', 
            array('events'=>$events)
        );
    }

    public function indexFilt(Request $request, string $event_type): Response {
        $repository = $this->getDoctrine()->getRepository(Events::class);
        $events  = $repository->findAll();

        //dd($event_type);
        if($event_type == 'concert') {
            $events  = $repository->findBy(['event_type'=>'concert']);
            //dd($event);        
        } else if($event_type == 'exhibition'){
            $events  = $repository->findBy(['event_type'=>'exhibition']);
            //dd($event);    
        } else if($event_type == 'open-air'){
            $events  = $repository->findBy(['event_type'=>'open-air']);
            //dd($event);
        } else if($event_type == 'festival'){
            $events  = $repository->findBy(['event_type'=>'festival']);
            //dd($event);
        }

            
            
        return $this->render('events/index.html.twig', 
        array('eventsAll'=>$events)
        );
    }

}
