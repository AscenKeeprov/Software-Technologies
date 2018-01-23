using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web.Mvc;
using ToDoList.Models;

namespace ToDoList.Controllers
{
    [ValidateInput(false)]
    public class TaskController : Controller
    {
	[HttpGet]
	[Route("")]
	public ActionResult Index()
	{
	    using (ToDoListDbContext db = new ToDoListDbContext())
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
	    using (ToDoListDbContext db = new ToDoListDbContext())
	    {
		db.Entry(task).State = EntityState.Added;
		db.SaveChanges();
	    }
	    return RedirectToAction("Index");
	}

	[HttpGet]
	[Route("delete/{id}")]
	public ActionResult Delete(int? id)
	{
	    if (id == null)
		return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
	    using (ToDoListDbContext db = new ToDoListDbContext())
	    {
		Task task = db.Tasks.Where(t => t.Id == id).First();
		if (task == null) return HttpNotFound();
		return View(task);
	    }
	}

	[HttpPost]
	[Route("delete/{id}")]
	[ValidateAntiForgeryToken]
	public ActionResult Delete(Task task)
	{
	    using (ToDoListDbContext db = new ToDoListDbContext())
	    {
		db.Tasks.Attach(task);
		db.Entry(task).State = EntityState.Deleted;
		db.SaveChanges();
		return RedirectToAction("Index");
	    }
	}
    }
}
