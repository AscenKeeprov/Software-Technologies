﻿using System.Web;
using System.Web.Optimization;

namespace CalculatorCS
{
    public class BundleConfig
    {
	// For more information on bundling, visit https://go.microsoft.com/fwlink/?LinkId=301862
	public static void RegisterBundles(BundleCollection bundles)
	{
	    bundles.Add(new StyleBundle("~/bundles/css").Include(
		      "~/Content/bootstrap.css",
		      "~/Content/site.css"));

	    bundles.Add(new ScriptBundle("~/bundles/js").Include(
			"~/Scripts/formchecks.js"));

	    bundles.Add(new ScriptBundle("~/bundles/jquery").Include(
			"~/Scripts/jquery-{version}.js"));

	    bundles.Add(new ScriptBundle("~/bundles/modernizr").Include(
			"~/Scripts/modernizr-*"));

	    bundles.Add(new ScriptBundle("~/bundles/bootstrap").Include(
		      "~/Scripts/bootstrap.js"));
	}
    }
}
