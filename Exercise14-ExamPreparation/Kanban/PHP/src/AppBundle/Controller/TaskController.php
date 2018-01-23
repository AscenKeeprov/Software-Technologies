<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
    	$openTasks = $this->getDoctrine()
		    ->getRepository(Task::class)
		    ->findBy(["status" => "Open"]);
    	$inProgressTasks = $this->getDoctrine()
		    ->getRepository(Task::class)
		    ->findBy(["status" => "In Progress"]);
    	$finishedTasks = $this->getDoctrine()
		    ->getRepository(Task::class)
		    ->findBy(["status" => "Finished"]);
	    return $this->render("task/index.html.twig", [
	    	"openTasks" => $openTasks,
		    "inProgressTasks" => $inProgressTasks,
		    "finishedTasks" => $finishedTasks
	    ]);
    }

    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
	    $task = new Task();
	    $form = $this->createForm(TaskType::class, $task);
	    $form->handleRequest($request);
	    if ($form->isSubmitted() && $form->isValid()) {
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($task);
		    $em->flush();
		    return $this->redirectToRoute("index");
	    }
	    return $this->render("task/create.html.twig", [
		    "task" => $task,
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
	    $task = $this->getDoctrine()
			    ->getRepository(Task::class)
			    ->find($id);
	    if ($task == null) return $this->redirectToRoute("index");
	    $form = $this->createForm(TaskType::class, $task);
	    $form->handleRequest($request);
	    if ($form->isSubmitted() && $form->isValid()) {
		    $em = $this->getDoctrine()->getManager();
		    $em->merge($task);
		    $em->flush();
		    return $this->redirectToRoute("index");
	    }
	    return $this->render("task/edit.html.twig", [
		    "task" => $task,
		    "form" => $form->createView()
	    ]);
    }
}
