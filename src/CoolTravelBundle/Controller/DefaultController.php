<?php

namespace CoolTravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoolTravelBundle:Default:index.html.twig');
    }
}
