using System.Data.Entity;

namespace IMDB.Models
{
    public class IMDBDbContext : DbContext
    {
	public IMDBDbContext() : base("IMDB")
	{
	}

	public virtual DbSet<Film> Films { get; set; }
    }
}
