<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sportsInfo
 *
 * @ORM\Table(name="sports_info")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\sportsInfoRepository")
 */
class sportsInfo
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
     * @ORM\Column(name="sportsDesc", type="string", length=255)
     */
    private $sportsDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="sportsLoc", type="string", length=255)
     */
    private $sportsLoc;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=0)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\sports", inversedBy="sportsInfo")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sports;

    public function getSports(): Sports
    {
        return $this->sports;
    }

    public function setSports(Sports $sports)
    {
        $this->sports = $sports;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sportsDesc
     *
     * @param string $sportsDesc
     *
     * @return sportsInfo
     */
    public function setSportsDesc($sportsDesc)
    {
        $this->sportsDesc = $sportsDesc;

        return $this;
    }

    /**
     * Get sportsDesc
     *
     * @return string
     */
    public function getSportsDesc()
    {
        return $this->sportsDesc;
    }

    /**
     * Set sportsLoc
     *
     * @param string $sportsLoc
     *
     * @return sportsInfo
     */
    public function setSportsLoc($sportsLoc)
    {
        $this->sportsLoc = $sportsLoc;

        return $this;
    }

    /**
     * Get sportsLoc
     *
     * @return string
     */
    public function getSportsLoc()
    {
        return $this->sportsLoc;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return sportsInfo
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
}

