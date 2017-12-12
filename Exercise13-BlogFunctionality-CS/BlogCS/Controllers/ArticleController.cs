using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web.Mvc;
using BlogCS.Models;

namespace BlogCS.Controllers
{
    public class ArticleController : Controller
    {
	// GET: /Article/Create
	[Authorize]
	public ActionResult Create()
	{
	    return View();
	}

	// POST: /Article/Create
	[Authorize]
	[HttpPost]
	[ValidateAntiForgeryToken]
	public ActionResult Create(Article article)
	{
	    if (ModelState.IsValid)
	    {
		using (BlogDbContext db = new BlogDbContext())
		{
		    string authorId = db.Users
			.Where(u => u.UserName == this.User.Identity.Name)
			.First().Id;
		    article.AuthorId = authorId;
		    article.DateAdded = DateTime.Now;
		    db.Entry(article).State = EntityState.Added;
		    db.SaveChanges();
		    return RedirectToAction("List");
		}
	    }
	    return View(article);
	}

        // GET: /Article/List
        public ActionResult List()
        {
	    using (BlogDbContext db = new BlogDbContext())
	    {
		List<Article> articles = db.Articles
		    .Include(a => a.Author).ToList();
		return View(articles);
	    }
        }

	// GET: /Article/Details
	public ActionResult Details(int? id)
	{
	    if (id == null)
		return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
	    using (BlogDbContext db = new BlogDbContext())
	    {
		Article article = db.Articles
		    .Where(a => a.Id == id)
		    .Include(a => a.Author).First();
		if (article == null)
		    return HttpNotFound();
		return View(article);
	    }
	}

	public bool IsOwner(Article article)
	{
	    bool isAdmin = this.User.IsInRole("Admin");
	    bool isAuthor = this.User.Identity.Name
		.Equals(article.Author.UserName);
	    return isAdmin || isAuthor;
	}

	// GET: /Article/Edit
	[Authorize]
	public ActionResult Edit(int? id)
	{
	    if (id == null)
		return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
	    using (BlogDbContext db = new BlogDbContext())
	    {
		Article article = db.Articles
		    .Where(a => a.Id == id)
		    .Include(a => a.Author).First();
		if (article == null)
		    return HttpNotFound();
		if (!IsOwner(article))
		    return new HttpStatusCodeResult(HttpStatusCode.Forbidden);
		return View(article);
	    }
	}

	// POST: /Article/Edit
	[Authorize]
	[HttpPost]
	[ValidateAntiForgeryToken]
	public ActionResult Edit(Article article)
	{
	    if (ModelState.IsValid)
	    {
		using (BlogDbContext db = new BlogDbContext())
		{
		    db.Articles.Attach(article);
		    db.Entry(article).Property(a => a.Title).IsModified = true;
		    db.Entry(article).Property(a => a.Content).IsModified = true;
		    article.DateModified = DateTime.Now;
		    db.SaveChanges();
		    return RedirectToAction("List");
		}
	    }
	    return View(article);
	}

	// GET: /Article/Delete
	[Authorize]
	public ActionResult Delete(int? id)
	{
	    if (id == null)
		return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
	    using (BlogDbContext db = new BlogDbContext())
	    {
		Article article = db.Articles
		    .Where(a => a.Id == id)
		    .Include(a => a.Author).First();
		if (article == null)
		    return HttpNotFound();
		if (!IsOwner(article))
		    return new HttpStatusCodeResult(HttpStatusCode.Forbidden);
		return View(article);
	    }
	}

	// POST: /Article/Delete
	[Authorize]
	[HttpPost]
	[ValidateAntiForgeryToken]
	public ActionResult Delete(Article article)
	{
	    if (ModelState.IsValid)
	    {
		using (BlogDbContext db = new BlogDbContext())
		{
		    db.Articles.Attach(article);
		    db.Entry(article).State = EntityState.Deleted;
		    db.SaveChanges();
		    return RedirectToAction("List");
		}
	    }
	    return View(article);
	}
    }
}
