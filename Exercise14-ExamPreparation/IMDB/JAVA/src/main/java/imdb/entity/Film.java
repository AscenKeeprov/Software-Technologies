package imdb.entity;

import javax.persistence.*;

@Entity
@Table(name = "films")
public class Film {

    private Integer id;

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    private String name;

    @Column(nullable = false)
    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    private String genre;

    @Column(nullable = false)
    public String getGenre() {
        return genre;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }

    private String director;

    @Column(nullable = false)
    public String getDirector() {
        return director;
    }

    public void setDirector(String director) {
        this.director = director;
    }

    private Integer year;

    @Column(nullable = false)
    public Integer getYear() {
        return year;
    }

    public void setYear(Integer year) {
        this.year = year;
    }

    public Film(String name, String genre, String director, Integer year) {
        this.name = name;
        this.genre = genre;
        this.director = director;
        this.year = year;
    }

    public Film() {    }
}
