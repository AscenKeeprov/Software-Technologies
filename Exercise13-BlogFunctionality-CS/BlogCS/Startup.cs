using BlogCS.Migrations;
using BlogCS.Models;
using Microsoft.Owin;
using Owin;
using System.Data.Entity;

[assembly: OwinStartupAttribute(typeof(BlogCS.Startup))]
namespace BlogCS
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
	    Database.SetInitializer(new MigrateDatabaseToLatestVersion<BlogDbContext, Configuration>());
            ConfigureAuth(app);
        }
    }
}
