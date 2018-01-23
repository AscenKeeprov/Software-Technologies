<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Table(name="tasks")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task
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
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @var string
	 * @Assert\NotBlank()
	 * @Assert\Length(min = 1, max = 64,
	 *     minMessage = "Title cannot be blank",
	 *     maxMessage = "Title too long! No more than {{ limit }} characters allowed")
	 * @ORM\Column(name="title", type="string", length=64)
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
	 * @return Task
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @var string
	 * @Assert\NotBlank()
	 * @ORM\Column(name="status", type="string")
	 */
	private $status;

	/**
	 * @return string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param string $status
	 * @return Task
	 */
	public function setStatus($status)
	{
		$this->status = $status;
	}
}
