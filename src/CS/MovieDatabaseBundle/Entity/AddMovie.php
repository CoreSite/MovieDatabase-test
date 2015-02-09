<?php
/**
 * Project of php-test-dev.loc.
 *
 * @author: Dmitriy Shuba <sda@sda.in.ua>
 * @link: http://granart-studio.com/ GranArt 
 * Date Time: 09.02.2015 16:37
 */

namespace CS\MovieDatabaseBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class AddMovie
{
	/**
	 * @var string
	 *
	 * @Assert\NotBlank()
	 */
	private $title;

	/**
	 * @var integer
	 *
	 * @Assert\NotBlank()
	 * @Assert\Type(type="numeric")
	 * @Assert\Regex("([0-9]{4})")
	 */
	private $year;

	/**
	 * @var integer
	 *
	 * @Assert\NotBlank()
	 * @Assert\Type(type="numeric")
	 * @Assert\Regex("/^([0-9]{2})$/")
	 */
	private $rating;

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	public function getYear()
	{
		return $this->year;
	}

	public function setYear($year)
	{
		$this->year = $year;

		return $this;
	}

	public function getRating()
	{
		return $this->rating;
	}

	public function setRating($rating)
	{
		$this->rating = $rating;

		return $this;
	}

}