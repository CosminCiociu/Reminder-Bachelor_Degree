<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Repository\ReminderRepository;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use DateTime;
use DateTimeZone;

class MailerController extends AbstractController
{
    private $description;
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        date_default_timezone_set('Europe/Bucharest');
    }
    public function checkTime(ReminderRepository $remindRepository): Response
    {
        $time = date('Y-m-d H:i');   // Format reminderDate

        //Get the current time without seconds
        $todayDate = DateTime::createFromFormat('Y-m-d H:i',$time);
        

        $timeMatch = $remindRepository->findBy(['Reminder_date' => $todayDate]);
        dump($timeMatch);
        exit;
        foreach($timeMatch as $time)
        {
            $this->description = $time->getDescription();
            $this->sendEmail();
        }
        return new Response('Email sent');
    }

    private function sendEmail()
    {
        $email = (new Email())
            ->from('notificationreminder2021@gmail.com')
            ->to('toadermaryan@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Saloooooot!')
            ->text('Nu stiu ce field trebuie sa pun')
            ->html("<p>" . $this->description ."</p>");

        $this->mailer->send($email);
        
        return;
    }

}
