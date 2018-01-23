package projectrider.entity;

import javax.persistence.*;

@Entity
@Table(name = "projets")
public class Project {

    private Integer id;

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    private String title;

    @Column(nullable = false)
    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    private String description;

    @Column(nullable = false)
    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    private Long budget;

    @Column(nullable = false)
    public Long getBudget() {
        return budget;
    }

    public void setBudget(Long budget) {
        this.budget = budget;
    }

    public Project(String title, String description, Long budget) {
        this.title = title;
        this.description = description;
        this.budget = budget;
    }

    public Project() {    }
}
