namespace IMDB.Migrations
{
    using System;
    using System.Data.Entity;
    using System.Data.Entity.Migrations;
    using System.Linq;

    public sealed class Configuration : DbMigrationsConfiguration<IMDB.Models.IMDBDbContext>
    {
        public Configuration()
        {
            AutomaticMigrationsEnabled = true;
	    AutomaticMigrationDataLossAllowed = true;
	}

        protected override void Seed(IMDB.Models.IMDBDbContext context)
        {
            //  This method will be called after migrating to the latest version.
            //  You can use the DbSet<T>.AddOrUpdate() helper extension method 
            //  to avoid creating duplicate seed data.
        }
    }
}
