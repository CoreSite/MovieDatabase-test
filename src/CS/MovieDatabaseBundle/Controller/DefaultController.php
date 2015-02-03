<?php

namespace CS\MovieDatabaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CSMovieDatabaseBundle:Default:index.html.twig', array());
    }

    public function formAction()
    {
        return $this->render('CSMovieDatabaseBundle:Default:form.html.twig', array());
    }

    public function listAction()
    {
        return $this->render('CSMovieDatabaseBundle:Default:list.html.twig', array());
    }

}
