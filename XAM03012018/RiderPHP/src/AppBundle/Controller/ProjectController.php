<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
	    $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();
	    return $this->render("project/index.html.twig", ["projects" => $projects]);
    }

    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
	    $project = new Project();
	    $form = $this->createForm(ProjectType::class, $project);
	    $form->handleRequest($request);
	    if ($form->isSubmitted() && $form->isValid()) {
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($project);
		    $em->flush();
		    return $this->redirectToRoute("index");
	    }
	    return $this->render("project/create.html.twig", [
		    "project" => $project,
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
	    $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
	    if ($project == null) return $this->redirectToRoute("index");
	    $form = $this->createForm(ProjectType::class, $project);
	    $form->handleRequest($request);
	    if ($form->isSubmitted() && $form->isValid()) {
		    $em = $this->getDoctrine()->getManager();
		    $em->merge($project);
		    $em->flush();
		    return $this->redirectToRoute("index");
	    }
	    return $this->render("project/edit.html.twig", [
		    "project" => $project,
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
	    $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
	    if ($project == null) return $this->redirectToRoute("index");
	    $form = $this->createForm(ProjectType::class, $project);
	    $form->handleRequest($request);
	    if ($form->isSubmitted()) {
		    $em = $this->getDoctrine()->getManager();
		    $em->remove($project);
		    $em->flush();
		    return $this->redirectToRoute("index");
	    }
	    return $this->render("project/delete.html.twig", [
		    "project" => $project,
		    "form" => $form->createView()
	    ]);
    }
}
