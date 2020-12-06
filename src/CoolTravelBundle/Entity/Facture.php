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
    public $id;
    /**
     * @var \DateTime
     * @ORM\Column (type="datetimetz")
     */
    public $date_check_in;
    /**
     * @var \DateTime
     * @ORM\Column (type="datetimetz")
     */
    public $date_check_out;


    /**
     * @ORM\OneToOne  (targetEntity="Reservation",inversedBy="facture")
     * @ORM\JoinColumn(name="reservation_id", referencedColumnName="id")
     */
    public $id_reservation;

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
     * @return \DateTime
     */
    public function getDateCheckIn()
    {
        return $this->date_check_in;
    }

    /**
     * @param \DateTime $date_check_in
     */
    public function setDateCheckIn($date_check_in)
    {
        $this->date_check_in = $date_check_in;
    }

    /**
     * @return \DateTime
     */
    public function getDateCheckOut()
    {
        return $this->date_check_out;
    }

    /**
     * @param \DateTime $date_check_out
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