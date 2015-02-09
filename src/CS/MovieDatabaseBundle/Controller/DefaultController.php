<?php

namespace CS\MovieDatabaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CS\MovieDatabaseBundle\Entity\Movie;
use CS\MovieDatabaseBundle\Entity\Rating;
use CS\MovieDatabaseBundle\Entity\AddMovie;
use CS\MovieDatabaseBundle\Form\MovieType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CSMovieDatabaseBundle:Default:index.html.twig', array());
    }

    public function formAction()
    {
        //$movie = new Movie();
        $addMovie = new AddMovie();
        $form = $this->createForm(new MovieType(), $addMovie, array('attr' => array('novalidate' => 'novalidate'), 'action' => $this->generateUrl('cs_movie_database_add')));

        return $this->render('CSMovieDatabaseBundle:Default:form.html.twig', array(
            'form'  => $form->createView(),
        ));
    }

    public function listAction(Request $request)
    {
        $em = $this->getDoctrine();
        $movies = $em->getRepository('CSMovieDatabaseBundle:Movie')->findBy(array(), array('title' => 'ASC'));

        $pageNum = $request->get('page', 1);
        //$pageNum = $request->createFromGlobals()->get('page', 1);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $movies,
            $pageNum,
            10
        );

        return $this->render('CSMovieDatabaseBundle:Default:list.html.twig', array(
            'pagination'    => $pagination,
        ));
    }

    public function addAction(Request $request)
    {
        $em = $this->getDoctrine();
        $entity_manager = $this->get('doctrine.orm.entity_manager');

        //$movie = new Movie();
        $addMovie = new AddMovie();
        $form = $this->createForm(new MovieType(), $addMovie, array());
        $form->handleRequest($request);

        if($form->isValid())
        {

            $movie = new Movie();
            $movie
                ->setTitle($addMovie->getTitle())
                ->setYear($addMovie->getYear())
                ->setAuthorIp($request->getClientIp())
            ;
            $entity_manager->persist($movie);

            $rating = new Rating();
            $rating
                ->setMovie($movie)
                ->setValue($addMovie->getRating())
            ;
            $entity_manager->persist($rating);

            $entity_manager->flush();

            $data = array('success' => true);
        }
        else
        {
            $errors = $this->get('cs_movie_database.form')->getErrorMessages($form);

            $data = array('success' => false, 'errors' => $errors);
        }

        $headers = array( 'Content-type' => 'application/json; charset=utf8' );
        $response = new Response( json_encode($data), 200, $headers );

        return $response;
    }

}
