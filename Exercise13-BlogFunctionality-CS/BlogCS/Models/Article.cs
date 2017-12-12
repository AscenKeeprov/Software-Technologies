using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace BlogCS.Models
{
    public class Article
    {
	[Key]
	public int Id { get; set; }

	[Required]
	[StringLength(64, MinimumLength = 2, ErrorMessage = "Title must be between {2} and {1} letters long!")]
	public string Title { get; set; }

	[DataType(DataType.Text)]
	public string Content { get; set; }

	[DataType(DataType.DateTime)]
	public DateTime DateAdded { get; set; }

	[DataType(DataType.DateTime)]
	public DateTime? DateModified { get; set; }

	[ForeignKey("Author")]
	public string AuthorId { get; set; }

	public virtual ApplicationUser Author { get; set; }
    }
}
