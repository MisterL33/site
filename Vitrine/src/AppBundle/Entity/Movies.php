<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movies
 *
 * @ORM\Table(name="movies")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MoviesRepository")
 */
class Movies
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=40)
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="etoile", type="integer")
     */
    private $etoile;
    
    /**
     * @var int
     *
     * @ORM\Column(name="accepted", type="integer")
     */
    private $accepted;


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
     * Set link
     *
     * @param string $link
     * @return Movies
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Movies
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set etoile
     *
     * @param integer $etoile
     * @return Movies
     */
    public function setEtoile($etoile)
    {
        $this->etoile = $etoile;

        return $this;
    }

    /**
     * Get etoile
     *
     * @return integer 
     */
    public function getEtoile()
    {
        return $this->etoile;
    }

    /**
     * Set accepted
     *
     * @param integer $accepted
     * @return Movies
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * Get accepted
     *
     * @return integer 
     */
    public function getAccepted()
    {
        return $this->accepted;
    }
}
