using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

namespace BlogCS.Models
{
    public class ExternalLoginConfirmationViewModel
    {
        [Required]
        [Display(Name = "E-mail Address")]
	[DataType(DataType.EmailAddress)]
	public string Email { get; set; }
    }

    public class ExternalLoginListViewModel
    {
        public string ReturnUrl { get; set; }
    }

    public class SendCodeViewModel
    {
        public string SelectedProvider { get; set; }
        public ICollection<System.Web.Mvc.SelectListItem> Providers { get; set; }
        public string ReturnUrl { get; set; }
        public bool RememberMe { get; set; }
    }

    public class VerifyCodeViewModel
    {
        [Required]
        public string Provider { get; set; }

        [Required]
        [Display(Name = "Code")]
        public string Code { get; set; }
        public string ReturnUrl { get; set; }

        [Display(Name = "Remember this browser?")]
        public bool RememberBrowser { get; set; }

        public bool RememberMe { get; set; }
    }

    public class ForgotViewModel
    {
        [Required]
        [Display(Name = "E-mail Address")]
	[DataType(DataType.EmailAddress)]
	public string Email { get; set; }
    }

    public class LoginViewModel
    {
        [Required]
	[EmailAddress]
	[Display(Name = "E-mail Address")]
	[DataType(DataType.EmailAddress)]
	public string Email { get; set; }

        [Required]
        [Display(Name = "Password")]
	[DataType(DataType.Password)]
	public string Password { get; set; }

        [Display(Name = "Remember me")]
        public bool RememberMe { get; set; }
    }

    public class RegisterViewModel
    {
	[Required]
	[StringLength(64, MinimumLength = 2, ErrorMessage = "Name must be between {2} and {1} characters long!")]
	[Display(Name = "Full Name")]
	public string FullName { get; set; }
	
	[Required]
        [EmailAddress]
	[Display(Name = "E-mail")]
	[DataType(DataType.EmailAddress)]
        public string Email { get; set; }

        [Required]
        [StringLength(16, MinimumLength = 1, ErrorMessage = "Password must be between {2} and {1} symbols long.")]
        [DataType(DataType.Password)]
        [Display(Name = "Password")]
        public string Password { get; set; }


	[Compare("Password", ErrorMessage = "The provided passwords do not match.")]
	[Display(Name = "Confirm password")]
	[DataType(DataType.Password)]
	public string ConfirmPassword { get; set; }
    }

    public class ResetPasswordViewModel
    {
        [Required]
        [EmailAddress]
        [Display(Name = "E-mail Address")]
	[DataType(DataType.EmailAddress)]
	public string Email { get; set; }

        [Required]
	[StringLength(16, MinimumLength = 1, ErrorMessage = "Password must be between {2} and {1} symbols long.")]
        [Display(Name = "Password")]
	[DataType(DataType.Password)]
	public string Password { get; set; }

	[Compare("Password", ErrorMessage = "The provided passwords do not match.")]
	[Display(Name = "Confirm password")]
	[DataType(DataType.Password)]
        public string ConfirmPassword { get; set; }

        public string Code { get; set; }
    }

    public class ForgotPasswordViewModel
    {
        [Required]
        [EmailAddress]
        [Display(Name = "E-mail Address")]
	[DataType(DataType.EmailAddress)]
	public string Email { get; set; }
    }
}
