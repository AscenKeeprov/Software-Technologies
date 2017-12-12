using System.Web.Mvc;

namespace BlogCS.Controllers
{
    public class HomeController : Controller
    {
	public ActionResult Index()
	{
	    return RedirectToAction("List", "Article");
	}
    }
}
