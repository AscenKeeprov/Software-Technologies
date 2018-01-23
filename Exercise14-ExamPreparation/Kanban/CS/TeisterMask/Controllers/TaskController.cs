using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web.Mvc;
using TeisterMask.Models;

namespace TeisterMask.Controllers
{
    [ValidateInput(false)]
    public class TaskController : Controller
    {
	[HttpGet]
	[Route("")]
	public ActionResult Index()
	{
	    using (TeisterMaskDbContext db = new TeisterMaskDbContext())
	    {
		List<Task> tasks = db.Tasks.ToList();
		return View(tasks);
	    }
	}

	[HttpGet]
	[Route("create")]
	public ActionResult Create()
	{
	    Task task = new Task();
	    return View(task);
	}

	[HttpPost]
	[Route("create")]
	[ValidateAntiForgeryToken]
	public ActionResult Create(Task task)
	{
	    if (!ModelState.IsValid) return View(task);
	    using (TeisterMaskDbContext db = new TeisterMaskDbContext())
	    {
		db.Entry(task).State = EntityState.Added;
		db.SaveChanges();
	    }
	    return RedirectToAction("Index");
	}

	[HttpGet]
	[Route("edit/{id}")]
	public ActionResult Edit(int? id)
	{
	    if (id == null)
		return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
	    using (TeisterMaskDbContext db = new TeisterMaskDbContext())
	    {
		Task task = db.Tasks.Where(t => t.Id == id).First();
		if (task == null) return HttpNotFound();
		return View(task);
	    }
	}

	[HttpPost]
	[Route("edit/{id}")]
	[ValidateAntiForgeryToken]
	public ActionResult Edit(Task task)
	{
	    if (!ModelState.IsValid) return View(task);
	    using (TeisterMaskDbContext db = new TeisterMaskDbContext())
	    {
		db.Tasks.Attach(task);
		db.Entry(task).State = EntityState.Modified;
		db.SaveChanges();
	    }
	    return RedirectToAction("Index");
	}
    }
}