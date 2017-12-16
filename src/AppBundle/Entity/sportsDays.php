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
     * Many sportsDays has One sportsInfo.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\sportsInfo", inversedBy="sportsDays")
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $sportsInfo;


    public function getSportsInfo(): SportsInfo
    {
        return $this->sportsInfo;
    }

    public function setSportsInfo(SportsInfo $sportsInfo)
    {
        $this->sportsInfo = $sportsInfo;
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

