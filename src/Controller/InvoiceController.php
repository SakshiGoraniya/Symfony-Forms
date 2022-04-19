<?php 
// src/Controller/InvoiceController.php
namespace App\Controller;

use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    #[Route('/invoice/create')]
    public function create(NotifierInterface $notifier)
    {
        // ...

        // Create a Notification that has to be sent
        // using the "email" channel
        $notification = (new Notification('New Invoice', ['email']))
            ->content('You got a new invoice for 15 EUR.');

        // The receiver of the Notification
        $recipient = new Recipient(
            $user->getEmail(),
            $user->getPhonenumber()
        );

        // Send the notification to the recipient
        $notifier->send($notification, $recipient);

        // ...
    }
}