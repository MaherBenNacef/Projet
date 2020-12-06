<?php


namespace CoolTravelBundle\Controller;


use Composer\DependencyResolver\Request;
use CoolTravelBundle\Entity\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MailController extends Controller
{
    public function sendMailAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $mail=new Mail();
        $form = $this->createForm('CoolTravelBundle\Form\MailType',$mail);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $subject = $mail->getSubject();
            $test = $mail->getObject();
            $mail = $mail->getMail();
            $object = $test;
            $username = 'bennacefmaher2@gmail.com';
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($username)
                ->setTo($mail)
                ->setBody($object);
            $this->get('mailer')->send($message);


        }
        return $this->render('CoolTravelBundle:Mail:send_mail.html.twig',
        array('f'=> $form->createView()));
    }
}