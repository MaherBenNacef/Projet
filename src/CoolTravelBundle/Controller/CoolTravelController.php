<?php


namespace CoolTravelBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoolTravelController extends Controller
{
        public function listAction(){
            return $this->render('@CoolTravel/template/template.html.twig',array());
        }

}