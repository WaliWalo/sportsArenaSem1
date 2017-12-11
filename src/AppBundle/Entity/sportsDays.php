<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sportsDays
 *
 * @ORM\Table(name="sports_days")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\sportsDaysRepository")
 */
class sportsDays
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
     * @var int
     *
     * @ORM\Column(name="sportId", type="integer")
     */
    private $sportId;

    /**
     * @var int
     *
     * @ORM\Column(name="day", type="integer")
     */
    private $day;

    /**
     * @var int
     *
     * @ORM\Column(name="openTime", type="integer")
     */
    private $openTime;

    /**
     * @var int
     *
     * @ORM\Column(name="closeTime", type="integer")
     */
    private $closeTime;

    /**
     * One sportsDays has One sports.
     * @ORM\OneToOne(targetEntity="sports", inversedBy="sportsDays")
     *
     */
    private $sports;


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
     * Set sportId
     *
     * @param integer $sportId
     *
     * @return sportsDays
     */
    public function setSportId($sportId)
    {
        $this->sportId = $sportId;

        return $this;
    }

    /**
     * Get sportId
     *
     * @return int
     */
    public function getSportId()
    {
        return $this->sportId;
    }

    /**
     * Set day
     *
     * @param integer $day
     *
     * @return sportsDays
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set openTime
     *
     * @param integer $openTime
     *
     * @return sportsDays
     */
    public function setOpenTime($openTime)
    {
        $this->openTime = $openTime;

        return $this;
    }

    /**
     * Get openTime
     *
     * @return int
     */
    public function getOpenTime()
    {
        return $this->openTime;
    }

    /**
     * Set closeTime
     *
     * @param integer $closeTime
     *
     * @return sportsDays
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;

        return $this;
    }

    /**
     * Get closeTime
     *
     * @return int
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }
}

