using System.Web;
using System.Web.Optimization;

namespace ToDoList
{
    public class BundleConfig
    {
        // For more information on bundling, visit https://go.microsoft.com/fwlink/?LinkId=301862
        public static void RegisterBundles(BundleCollection bundles)
        {
	    bundles.Add(new StyleBundle("~/bundles/css").Include(
		      "~/Content/create-style.css",
		      "~/Content/delete-style.css",
		      "~/Content/index-style.css"));
	}
    }
}
