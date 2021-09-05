<?php

namespace App\Controller;

use App\Entity\Reminder;
use App\Form\ReminderType;
use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SetReminderController extends AbstractController
{
    public function index(Request $request): Response
    {
        $reminder = new Reminder();
        $form= $this->createForm(ReminderType::class,$reminder,
    [
        'action' => $this->generateUrl('home'),
        'method' => 'POST',
    ]);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $reminderDate =  $_COOKIE['ReminderDate'];  //Fetch date from cookie;
            unset($_COOKIE['ReminderDate']);        //Delete Cookie

            $nowDate = date("Y/m/d H:i");   //Get now time

            // dump($reminderDate);
            // dump($nowDate);
            // exit;

            $reminder->setCreated($nowDate);
            $reminder->setReminderDate($reminderDate);

            $em = $this->getDoctrine()->getManager();   //Get the doctrine and manager
            $em->persist($reminder);
            $em->flush();

            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );
            
            return $this->redirectToRoute('home');
        }
        unset($_COOKIE['ReminderDate']);        //Delete Cookie

        return $this->render('set_reminder/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
