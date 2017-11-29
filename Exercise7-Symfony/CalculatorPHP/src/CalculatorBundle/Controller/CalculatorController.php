<?php

namespace CalculatorBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CalculatorBundle\Entity\Calculator;
use CalculatorBundle\Form\CalculatorType;

class CalculatorController extends Controller
{
    /**
     * @param Request $request
     * @Route("/", name="index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $calculator = new Calculator();
        $form = $this->createForm(CalculatorType::class, $calculator);
        $form->handleRequest($request);
        $result = 0;
        if ($form->isSubmitted() && $form->isValid())
        {
            $leftOperand = $calculator->getLeftOperand();
            $operator = $calculator->getOperator();
            $rightOperand = $calculator->getRightOperand();
            switch ($operator)
            {
                case "+":
                    $result = $leftOperand + $rightOperand;
                    break;
                case "-":
                    $result = $leftOperand - $rightOperand;
                    break;
                case "*":
                    $result = $leftOperand * $rightOperand;
                    break;
                case "/":
                    $result = $leftOperand / $rightOperand;
                    break;
                case "^":
                    $result = pow($leftOperand, $rightOperand);
                    break;
            }
            return $this->render("calculator/index.html.twig",
                ["result" => $result, "calculator" => $calculator, "form" => $form->createView()]);
        }
        return $this->render("calculator/index.html.twig", ["form" => $form->createView()]);
    }
}
