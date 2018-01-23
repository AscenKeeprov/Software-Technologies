package teistermask.entity;

import javax.persistence.*;

@Entity
@Table(name = "tasks")
public class Task {

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

    private String status;

    @Column(nullable = false)
    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public Task(String title, String status) {
        this.title = title;
        this.status = status;
    }

    public Task() {    }
}
