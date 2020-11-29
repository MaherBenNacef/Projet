<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Suite
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    public $Id_Suite;
    /**
     * @ORM\Column (type="float")
     */
    public $prix;
    /**
     * @ORM\Column (type="integer")
     */
    public $numero_Suite;

    /**
     * @ORM\ManyToOne (targetEntity="Reservation")
     * @ORM\JoinColumn(name="Reservation", referencedColumnName="Id_Reservation")
     */
    public $reservation;
    /**
     * @ORM\ManyToOne (targetEntity="Hotel")
     * @ORM\JoinColumn(name="Hotel", referencedColumnName="Id_Hotel")
     */
    public $hotel;

    /**
     * @return mixed
     */
    public function getIdSuite()
    {
        return $this->Id_Suite;
    }

    /**
     * @param mixed $Id_Suite
     */
    public function setIdSuite($Id_Suite)
    {
        $this->Id_Suite = $Id_Suite;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getNumeroSuite()
    {
        return $this->numero_Suite;
    }

    /**
     * @param mixed $numero_Suite
     */
    public function setNumeroSuite($numero_Suite)
    {
        $this->numero_Suite = $numero_Suite;
    }

    /**
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param mixed $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * @return mixed
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * @param mixed $hotel
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }

}