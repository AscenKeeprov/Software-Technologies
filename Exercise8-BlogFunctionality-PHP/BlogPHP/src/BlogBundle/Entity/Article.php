<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ArticleRepository")
 */
class Article
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
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min = 3, max = 64,
     *     minMessage = "Title must be at least {{ limit }} characters long",
     *     maxMessage = "Title too long! No more than {{ limit }} characters allowed")
     */
    private $title;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @var string
     */
    private $summary;

    /**
     * @return string
     */
    public function getSummary()
    {
        if ($this->summary === null)
        {
            $this->setSummary();
        }
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Article
     */
    public function setSummary()
    {
        $this->summary = substr($this->getContent(), 0,
            strlen($this->getContent()) / 2) . "...";
        return $this;
    }

    /**
     * @var int
     * @ORM\Column(name="authorId", type="integer")
     */
    private $authorId;

    /**
     * @return int
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param integer $authorId
     * @return Article
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\User", inversedBy="articles")
     * @ORM\JoinColumn(name="authorId", referencedColumnName="id")
     */
    private $author;

    /**
     * @return \BlogBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param \BlogBundle\Entity\User $author
     * @return Article
     */
    public function setAuthor(User $author = null)
    {
        $this->author = $author;
        return $this;
    }

    public function __construct()
    {
        $this->dateAdded = new \DateTime("now");
    }

    /**
     * @var \DateTime
     * @ORM\Column(name="dateAdded", type="datetime")
     * @Assert\DateTime()
     */
    private $dateAdded;

    /**
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * @param \DateTime $dateAdded
     * @return Article
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
        return $this;
    }
}
