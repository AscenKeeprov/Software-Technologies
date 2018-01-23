using System.ComponentModel.DataAnnotations;

namespace ToDoList.Models
{
    public class Task
    {
	[Key]
	public int Id { get; set; }

	[Required(ErrorMessage = "Task must have a title!")]
	[DataType(DataType.Text)]
	[Display(Name = "Task title:")]
	public string Title { get; set; }

	[Required(ErrorMessage = "Please describe what you have to do!")]
	[DataType(DataType.Text)]
	[Display(Name = "Task description:")]
	public string Comments { get; set; }
    }
}