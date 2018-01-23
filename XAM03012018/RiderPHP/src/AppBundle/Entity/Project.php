<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="projects")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project
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
	 * @Assert\Length(min = 2, max = 255,
	 *     minMessage = "Title must be at least {{ limit }} characters long",
	 *     maxMessage = "Title too long! No more than {{ limit }} characters allowed!")
	 * @ORM\Column(name="title", type="string", length=255)
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
	 * @return Project
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @var string
	 * @Assert\NotBlank()
	 * @Assert\Length(min = 2, max = 255,
	 *     minMessage = "Please provide project description!",
	 *     maxMessage = "Description too long! No more than {{ limit }} characters allowed!")
	 * @ORM\Column(name="description", type="string", length=255)
	 */
	private $description;

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return Project
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @var int
	 * @Assert\NotBlank()
	 * @ORM\Column(name="budget", type="integer")
	 */
	private $budget;

	/**
	 * @return int
	 */
	public function getBudget()
	{
		return $this->budget;
	}

	/**
	 * @param int $budget
	 * @return Project
	 */
	public function setBudget($budget)
	{
		$this->budget = $budget;
	}
}
