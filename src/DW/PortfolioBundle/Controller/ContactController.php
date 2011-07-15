<?php

namespace DW\PortfolioBundle\Controller;

use DW\PortfolioBundle\Entity\Enquiry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ContactController extends Controller
{
    
    public function indexAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createFormBuilder($enquiry)
          ->add("name", "text")
          ->add("email", "email")
          ->add("telephone", "text")
          ->add("message", "textarea")
          ->getForm();
        
        return $this->render('PortfolioBundle:Contact:index.html.twig', array('form' => $form->createView()));
    }
}
