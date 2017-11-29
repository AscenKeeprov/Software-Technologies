<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\User;
use BlogBundle\Form\UserType;

class UserController extends Controller
{
    /**
     * @Route("/user/register", name="user_register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setUsername($user->getEmail());
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("user_login");
        }
        return $this->render("user/register.html.twig", ["form" => $form->createView()]);
    }

    /**
     * @Route("/user/login", name="user_login")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request)
    {
        return $this->render('user/login.html.twig');
    }

    /**
     * @Route("/user/profile", name="user_profile")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profile(Request $request)
    {
        return $this->render("user/profile.html.twig");
    }

    /**
     * @Route("/logout", name="user_logout")
     */
    public function logout()
    {
    }
}
