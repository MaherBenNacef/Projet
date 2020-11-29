<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Facture
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    public $Id_Facture;
    /**
     * @ORM\Column (type="date")
     */
    public $date_check_in;
    /**
     * @ORM\Column (type="date")
     */
    public $date_check_out;


    /**
     * @ORM\OneToOne  (targetEntity="Reservation",mappedBy="facture")
     */
    public $reservation;

    /**
     * @return mixed
     */
    public function getIdFacture()
    {
        return $this->Id_Facture;
    }

    /**
     * @param mixed $Id_Facture
     */
    public function setIdFacture($Id_Facture)
    {
        $this->Id_Facture = $Id_Facture;
    }

    /**
     * @return mixed
     */
    public function getDateCheckIn()
    {
        return $this->date_check_in;
    }

    /**
     * @param mixed $date_check_in
     */
    public function setDateCheckIn($date_check_in)
    {
        $this->date_check_in = $date_check_in;
    }

    /**
     * @return mixed
     */
    public function getDateCheckOut()
    {
        return $this->date_check_out;
    }

    /**
     * @param mixed $date_check_out
     */
    public function setDateCheckOut($date_check_out)
    {
        $this->date_check_out = $date_check_out;
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

}