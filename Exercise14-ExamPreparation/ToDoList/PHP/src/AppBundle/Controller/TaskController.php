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
        $tasks = $this->getDoctrine()->getRepository(Task::class)->findAll();
        return $this->render("task/index.html.twig", ["tasks" => $tasks]);
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
     * @Route("/delete/{id}", name="delete")
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function delete($id, Request $request)
    {
	    $task = $this->getDoctrine()->getRepository(Task::class)->find($id);
	    if ($task == null) return $this->redirectToRoute("index");
	    $form = $this->createForm(TaskType::class, $task);
	    $form->handleRequest($request);
	    if ($form->isSubmitted()) {
		    $em = $this->getDoctrine()->getManager();
		    $em->remove($task);
		    $em->flush();
		    return $this->redirectToRoute("index");
	    }
	    return $this->render("task/delete.html.twig", [
		    "task" => $task,
		    "form" => $form->createView()
	    ]);
    }
}
