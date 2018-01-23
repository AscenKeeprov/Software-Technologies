using System.Data.Entity;

namespace ToDoList.Models
{
    public class ToDoListDbContext : DbContext
    {
	public ToDoListDbContext() : base("ToDoListDB")
	{
	}

	public virtual DbSet<Task> Tasks { get; set; }
    }
}
