using System.ComponentModel.DataAnnotations;

namespace ProjectRider.Models
{
    public class Project
    {
	[Key]
	public int Id { get; set; }

	//[Display(Name = "Project title")]
	[Required(ErrorMessage = "Project must have a title!")]
	[StringLength(255, MinimumLength = 2, ErrorMessage = "{0} must be between {2} and {1} characters long!")]
	public string Title { get; set; }

	//[Display(Name = "Project description")]
	[Required(ErrorMessage = "Please describe the project!")]
	[StringLength(255, MinimumLength = 2, ErrorMessage = "{0} must be between {2} and {1} characters long!")]
	public string Description { get; set; }
	
	//[Display(Name = "Allocated budget")]
	[Range(0, 9223372036854775807, ErrorMessage ="{0} must be a sum between {2} and {1}!")]
	public long Budget { get; set; }
    }
}