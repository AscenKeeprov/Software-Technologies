using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web.Mvc;
using IMDB.Models;

namespace IMDB.Controllers
{
    [ValidateInput(false)]
    public class FilmController : Controller
    {
	[HttpGet]
        [Route("")]
        public ActionResult Index()
        {
	    using (IMDBDbContext db = new IMDBDbContext())
	    {
		List<Film> films = db.Films.ToList();
		return View(films);
	    }
	}

        [HttpGet]
        [Route("create")]
	public ActionResult Create()
        {
	    Film film = new Film();
	    return View(film);
	}

        [HttpPost]
        [Route("create")]
        [ValidateAntiForgeryToken]
        public ActionResult Create(Film film)
        {
	    if (!ModelState.IsValid) return View(film);
	    using (IMDBDbContext db = new IMDBDbContext())
	    {
		db.Entry(film).State = EntityState.Added;
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
	    using (IMDBDbContext db = new IMDBDbContext())
	    {
		Film film = db.Films.Where(f => f.Id == id).First();
		if (film == null) return HttpNotFound();
		return View(film);
	    }
	}

        [HttpPost]
        [Route("edit/{id}")]
        [ValidateAntiForgeryToken]
        public ActionResult EditConfirm(Film film)
        {
	    if (!ModelState.IsValid) return View(film);
	    using (IMDBDbContext db = new IMDBDbContext())
	    {
		db.Films.Attach(film);
		db.Entry(film).State = EntityState.Modified;
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
	    using (IMDBDbContext db = new IMDBDbContext())
	    {
		Film film = db.Films.Where(f => f.Id == id).First();
		if (film == null) return HttpNotFound();
		return View(film);
	    }
	}

        [HttpPost]
	[Route("delete/{id}")]
	[ValidateAntiForgeryToken]
        public ActionResult DeleteConfirm(Film film)
        {
	    using (IMDBDbContext db = new IMDBDbContext())
	    {
		db.Films.Attach(film);
		db.Entry(film).State = EntityState.Deleted;
		db.SaveChanges();
		return RedirectToAction("Index");
	    }
	}
    }
}
