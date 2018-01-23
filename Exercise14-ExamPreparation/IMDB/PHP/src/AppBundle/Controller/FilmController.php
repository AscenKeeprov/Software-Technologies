<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $films = $this->getDoctrine()->getRepository(Film::class)->findAll();
        return $this->render("film/index.html.twig", ["films" => $films]);
    }

    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $film = new Film();
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();
            return $this->redirectToRoute("index");
        }
        return $this->render("film/create.html.twig", [
            "film" => $film,
            "form" => $form->createView()
        ]);
	}

    /**
     * @Route("/edit/{id}", name="edit")
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $film = $this->getDoctrine()->getRepository(Film::class)->find($id);
        if ($film == null) return $this->redirectToRoute("index");
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->merge($film);
            $em->flush();
            return $this->redirectToRoute("index");
        }
        return $this->render("film/edit.html.twig", [
            "film" => $film,
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function delete($id, Request $request)
    {
        $film = $this->getDoctrine()->getRepository(Film::class)->find($id);
        if ($film == null) return $this->redirectToRoute("index");
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($film);
            $em->flush();
            return $this->redirectToRoute("index");
        }
        return $this->render("film/delete.html.twig", [
            "film" => $film,
            "form" => $form->createView()
        ]);
    }
}
