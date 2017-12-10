<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timetable
 *
 * @ORM\Table(name="timetable")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TimetableRepository")
 */
class Timetable
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
     * @ORM\Column(name="slots", type="integer")
     */
    private $slots;

    /**
     * @var int
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="trainerId", type="integer", length=255)
     */
    private $trainerId;


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
     * @return Timetable
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
     * Set slots
     *
     * @param integer $slots
     *
     * @return Timetable
     */
    public function setSlots($slots)
    {
        $this->slots = $slots;

        return $this;
    }

    /**
     * Get slots
     *
     * @return int
     */
    public function getSlots()
    {
        return $this->slots;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Timetable
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set trainerId
     *
     * @param string $trainerId
     *
     * @return Timetable
     */
    public function setTrainerId($trainerId)
    {
        $this->trainerId = $trainerId;

        return $this;
    }

    /**
     * Get trainerId
     *
     * @return string
     */
    public function getTrainerId()
    {
        return $this->trainerId;
    }
}

