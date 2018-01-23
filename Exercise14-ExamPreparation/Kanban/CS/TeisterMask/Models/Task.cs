using System.ComponentModel.DataAnnotations;

namespace TeisterMask.Models
{
    public class Task
    {
	[Key]
	public int Id { get; set; }

	[Required(ErrorMessage = "Task must have a title!")]
	[DataType(DataType.Text)]
	[Display(Name = "Task title:")]
	public string Title { get; set; }

	[Required(ErrorMessage = "Please select a status!")]
	[DataType(DataType.Text)]
	[Display(Name = "Task status:")]
	public string Status { get; set; }
    }
}