<?php

namespace CS\MovieDatabaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CSMovieDatabaseBundle:Default:index.html.twig', array());
    }
}
