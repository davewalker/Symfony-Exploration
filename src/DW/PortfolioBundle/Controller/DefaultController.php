<?php

namespace DW\PortfolioBundle\Controller;

use DW\PortfolioBundle\Entity\Enquiry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $title = "Welcome";
        
        $enquiry = new Enquiry();
        
        var_dump($enquiry);die();
        
        return $this->render('PortfolioBundle:Default:index.html.twig', array('page_title' => $title));
    }
}
