<?php

namespace CoolTravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoolTravelBundle:template:template.html.twig');
    }
    public function eror()
    {
        return $this->render('/eror.html.twig',[

        ]);
    }
}
