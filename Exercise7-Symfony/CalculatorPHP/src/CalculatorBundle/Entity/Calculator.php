<?php

namespace CalculatorBundle\Entity;

class Calculator
{
    /**
     * @var float
     */
    private $leftOperand;

    /**
     * @return float
     */
    public function getLeftOperand()
    {
        return $this->leftOperand;
    }

    /**
     * @param float $operand
     * @return Calculator
     */
    public function setLeftOperand($operand)
    {
        $this->leftOperand = $operand;
        return $this;
    }

    /**
     * @var string
     */
    private $operator;

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param string $operator
     * @return Calculator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @var float
     */
    private $rightOperand;

    /**
     * @return float
     */
    public function getRightOperand()
    {
        return $this->rightOperand;
    }

    /**
     * @param float $operand
     * @return Calculator
     */
    public function setRightOperand($operand)
    {
        $this->rightOperand = $operand;
        return $this;
    }
}
