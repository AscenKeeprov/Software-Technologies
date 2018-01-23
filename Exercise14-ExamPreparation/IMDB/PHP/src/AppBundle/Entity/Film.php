<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="films")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 */
class Film
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min = 3, max = 64,
     *     minMessage = "Name must be at least {{ limit }} characters long",
     *     maxMessage = "Name too long! No more than {{ limit }} characters allowed")
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="genre", type="string")
     */
    private $genre;

    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="director", type="string")
     */
    private $director;

    /**
     * @return string
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param string $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }
}
