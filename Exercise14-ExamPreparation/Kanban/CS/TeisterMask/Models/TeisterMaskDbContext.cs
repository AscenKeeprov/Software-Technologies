using System.Data.Entity;

namespace TeisterMask.Models
{
    public class TeisterMaskDbContext : DbContext
    {
        public TeisterMaskDbContext() : base("TeisterMask")
        {
        }

	public virtual DbSet<Task> Tasks { get; set; }
    }
}