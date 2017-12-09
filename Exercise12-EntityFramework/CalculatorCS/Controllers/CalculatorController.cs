using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using CalculatorCS.Models;

namespace CalculatorCS.Controllers
{
    public class CalculatorController : Controller
    {
	public ActionResult Form(Calculator calculator)
	{
	    return View(calculator);
	}

	[HttpPost]
	public ActionResult Calculate(Calculator calculator)
	{
	    calculator.Result = CalculateResult(calculator);
	    return RedirectToAction("Form", calculator);
	}

	private decimal CalculateResult(Calculator calculator)
	{
	    decimal result = 0M;
	    switch (calculator.Operator)
	    {
		case "+":
		    result = calculator.LeftOperand + calculator.RightOperand;
		    break;
		case "-":
		    result = calculator.LeftOperand - calculator.RightOperand;
		    break;
		case "*":
		    result = calculator.LeftOperand * calculator.RightOperand;
		    break;
		case "/":
		    result = calculator.LeftOperand / calculator.RightOperand;
		    break;
		case "%":
		    result = calculator.LeftOperand % calculator.RightOperand;
		    break;
		case "^":
		    var power = Math.Abs(calculator.RightOperand);
		    result = 1;
		    for (int p = 1; p <= power; p++)
			result *= calculator.LeftOperand;
		    if (calculator.RightOperand < 0)
			result = 1 / result;
		    break;
		case "√":
		    decimal num = calculator.RightOperand;
		    decimal precision = 0.0M;
		    if (num < 0) throw new FormatException("Cannot calculate the square root of a negative number.");
		    decimal newResult = (decimal)Math.Sqrt((double)num), oldResult;
		    do
		    {
			oldResult = newResult;
			if (oldResult == 0.0M) result = 0;
			else newResult = (oldResult + num / oldResult) / 2;
		    }
		    while (Math.Abs(oldResult - newResult) > precision);
		    result =  newResult;
		    break;
	    }
	    return result;
	}
    }
}