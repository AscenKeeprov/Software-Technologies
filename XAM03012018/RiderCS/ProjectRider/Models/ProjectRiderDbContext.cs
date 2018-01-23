using System.Data.Entity;

namespace ProjectRider.Models
{
    public class ProjectRiderDbContext : DbContext
    {
        public ProjectRiderDbContext() : base("ProjectRider")
        {
        }

	public virtual DbSet<Project> Projects { get; set; }
    }
}