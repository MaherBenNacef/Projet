<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Facture
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    private $Id_Facture;
    /**
     * @ORM\Column (type="date")
     */
    private $date_check_in;
    /**
     * @ORM\Column (type="date")
     */
    private $date_check_out;

    /**
     * @ORM\Column (type="integer")
     */
    /**
     * @ORM\OneToOne  (targetEntity="Reservation",mappedBy="Id_Reservation")
     * @ORM\JoinColumn(name="id_reservation",referencedColumnName="Id_Reservation")
     */
    private $id_reservation;

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



}