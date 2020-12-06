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
    public $id;
    /**
     * @ORM\Column (type="float")
     */
    public $prix;
    /**
     * @ORM\Column (type="integer")
     */
    public $numero_Suite;

    /**
     * @ORM\ManyToOne (targetEntity="Reservation",inversedBy="id_suite")
     */
    public $id_reservation;
    /**
     * @ORM\ManyToOne (targetEntity="Hotel",inversedBy="id_suite")

     */
    public $id_hotel;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getIdReservation()
    {
        return $this->id_reservation;
    }

    /**
     * @param mixed $id_reservation
     */
    public function setIdReservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;
    }

    /**
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->id_hotel;
    }

    /**
     * @param mixed $id_hotel
     */
    public function setIdHotel($id_hotel)
    {
        $this->id_hotel = $id_hotel;
    }



}