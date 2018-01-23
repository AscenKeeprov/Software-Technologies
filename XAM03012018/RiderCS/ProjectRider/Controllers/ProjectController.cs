namespace ProjectRider.Controllers
{
    using System.Collections.Generic;
    using System.Data.Entity;
    using System.Linq;
    using System.Net;
    using System.Web.Mvc;
    using Models;

    [ValidateInput(false)]
    public class ProjectController : Controller
    {
        [HttpGet]
        [Route("")]
        public ActionResult Index()
        {
	    using (ProjectRiderDbContext db = new ProjectRiderDbContext())
	    {
		List<Project> projects = db.Projects.ToList();
		return View(projects);
	    }
	}

        [HttpGet]
        [Route("create")]
        public ActionResult Create()
        {
	    Project project = new Project();
	    return View(project);
	}

        [HttpPost]
        [Route("create")]
        [ValidateAntiForgeryToken]
        public ActionResult Create(Project project)
        {
	    if (!ModelState.IsValid) return View(project);
	    using (ProjectRiderDbContext db = new ProjectRiderDbContext())
	    {
		db.Entry(project).State = EntityState.Added;
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
	    using (ProjectRiderDbContext db = new ProjectRiderDbContext())
	    {
		if (!db.Projects.Any(p => p.Id == id)) return View("error");
		Project project = db.Projects.Where(p => p.Id == id).First();
		if (project == null) return HttpNotFound();
		return View(project);
	    }
	}

	[HttpPost]
	[Route("edit/{id}")]
	[ValidateAntiForgeryToken]
	public ActionResult Edit(Project project)
	{
	    if (!ModelState.IsValid) return View(project);
	    using (ProjectRiderDbContext db = new ProjectRiderDbContext())
	    {
		db.Projects.Attach(project);
		db.Entry(project).State = EntityState.Modified;
		db.SaveChanges();
		return RedirectToAction("Index");
	    }
	}

	[HttpGet]
	[Route("delete/{id}")]
	public ActionResult Delete(int? id)
	{
	    if (id == null)
		return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
	    using (ProjectRiderDbContext db = new ProjectRiderDbContext())
	    {
		if (!db.Projects.Any(p => p.Id == id)) return View("error");
		Project project = db.Projects.Where(p => p.Id == id).First();
		if (project == null) return HttpNotFound();
		return View(project);
	    }
	}

        [HttpPost]
        [Route("delete/{id}")]
        [ValidateAntiForgeryToken]
        public ActionResult Delete(Project project)
        {
	    using (ProjectRiderDbContext db = new ProjectRiderDbContext())
	    {
		db.Projects.Attach(project);
		db.Entry(project).State = EntityState.Deleted;
		db.SaveChanges();
		return RedirectToAction("Index");
	    }
	}
    }
}