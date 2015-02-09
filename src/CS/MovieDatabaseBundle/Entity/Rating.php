<?php

namespace CS\MovieDatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="smallint")
     */
    private $value;

    /**
     * @ORM\OneToOne(targetEntity="CS\MovieDatabaseBundle\Entity\Movie", inversedBy="rating")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $movie;

    public function __toString()
    {
        return (string)$this->getValue();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return Rating
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * Set movie
     *
     * @param \CS\MovieDatabaseBundle\Entity\Movie $movie
     * @return Rating
     */
    public function setMovie(\CS\MovieDatabaseBundle\Entity\Movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \CS\MovieDatabaseBundle\Entity\Movie 
     */
    public function getMovie()
    {
        return $this->movie;
    }
}
