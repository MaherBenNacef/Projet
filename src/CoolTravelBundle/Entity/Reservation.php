<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    private $Id_Reservation;
    /**
     * @ORM\Column (type="date")
     */
    private $date_check_in;
    /**
     * @ORM\Column (type="date")
     */
    private $date_check_out;
    /**
     * @ORM\Column (type="string", length=255)
     */
    private $type_Reservation;
    /**
     * @ORM\Column (type="integer")
     */
    /**
     * @ORM\OneToMany (targetEntity="Chambre",mappedBy="Id_Chambre")
     */
    private $id_chambre;
    /**
     * @ORM\Column (type="integer")
     */
    /**
     * @ORM\OneToMany (targetEntity="Suite",mappedBy="Id_Suite")
     * @ORM\JoinColumn(name="id_suite",referencedColumnName="Id_Suite")
     */
    private $id_suite;

    /**
     * @return mixed
     */
    public function getIdReservation()
    {
        return $this->Id_Reservation;
    }

    /**
     * @param mixed $Id_Reservation
     */
    public function setIdReservation($Id_Reservation)
    {
        $this->Id_Reservation = $Id_Reservation;
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
    public function getTypeReservation()
    {
        return $this->type_Reservation;
    }

    /**
     * @param mixed $type_Reservation
     */
    public function setTypeReservation($type_Reservation)
    {
        $this->type_Reservation = $type_Reservation;
    }

    /**
     * @return mixed
     */
    public function getIdChambre()
    {
        return $this->id_chambre;
    }

    /**
     * @param mixed $id_chambre
     */
    public function setIdChambre($id_chambre)
    {
        $this->id_chambre = $id_chambre;
    }

    /**
     * @return mixed
     */
    public function getIdSuite()
    {
        return $this->id_suite;
    }

    /**
     * @param mixed $id_suite
     */
    public function setIdSuite($id_suite)
    {
        $this->id_suite = $id_suite;
    }


}