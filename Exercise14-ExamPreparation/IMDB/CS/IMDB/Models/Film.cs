using System.ComponentModel.DataAnnotations;
using System.Web.Mvc;

namespace IMDB.Models
{
    public class Film
    {
	[Key]
	public int Id { get; set; }

	[Required(ErrorMessage = "The film must have a title!")]
	//[RegularExpression(@"^[A-Z]+[a-zA-Z''-'\s]*$")]
	[Display(Name = "Film title:")]
	[StringLength(64, MinimumLength = 2, ErrorMessage = "{0} must be  between {2} and {1} characters long!")]
	public string Name { get; set; }

	[Required(ErrorMessage = "Please specify the genre of the film!")]
	[DataType(DataType.Text)]
	[Display(Name = "Film genre:")]
	public string Genre { get; set; }

	[Required(ErrorMessage = "Who is the director of this film?")]
	[Display(Name = "Directed by:")]
	[StringLength(64, MinimumLength = 2, ErrorMessage = "{0} must be  between {2} and {1} characters long!")]
	public string Director { get; set; }

	[Required(ErrorMessage = "Release year cannot be empty!")]
	[DataType(DataType.Date)]
	[Display(Name = "Year released:")]
	[DisplayFormat(DataFormatString = "{yyyy}", ApplyFormatInEditMode = true)]
	[Range(1896, 2020, ErrorMessage = "Invalid year.")]
	public int Year { get; set; }

	//[HiddenInput]
	//public string Poster
	//{
	//    get { return $"{Name} ({Year}) - a {Genre} movie by {Director}"; }
	//}
    }
}
