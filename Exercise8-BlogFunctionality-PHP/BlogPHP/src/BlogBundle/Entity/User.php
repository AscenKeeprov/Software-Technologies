<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(name="fullName", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min = 2, minMessage = "Name must be at least 2 characters long!")
     */
    private $fullName;

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return User
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setUsername($email)
    {
        $this->username = $email;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min = 8, max = 16,
     *     minMessage = "Your password must consist of at least {{ limit }} symbols",
     *     maxMessage = "Your password cannot exceed {{ limit }} symbols in length")
     */
    private $password;

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="BlogBundle\Entity\Article", mappedBy="author")
     */
    private $articles;

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param \BlogBundle\Entity\Article $article
     * @return User
     */
    public function addArticle($article)
    {
        $this->articles[] = $article;
        return $this;
    }

    /**
     * @return {string|null}[]
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @return {Role|string}[]
     */
    public function getRoles()
    {
        return [];
    }

    public function eraseCredentials(){}
}
