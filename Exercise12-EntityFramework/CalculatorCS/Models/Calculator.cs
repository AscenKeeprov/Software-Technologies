using System.Collections.Generic;
using System.Web.Mvc;

namespace CalculatorCS.Models
{
    public class Calculator
    {
	public decimal LeftOperand { get; set; }
	public string Operator { get; set; }
	public decimal RightOperand { get; set; }
	public decimal Result { get; set; }

	public Calculator()
	{
	}
    }
}