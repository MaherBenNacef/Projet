<?php


namespace CoolTravelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    public $id;
    /**
     * @var \Date
     * @ORM\Column (type="date")
     */
    public $date_check_in;
    /**
     * @var \Date
     * @ORM\Column (type="date")
     */
    public $date_check_out;
    /**
     * @ORM\Column (type="string", length=255)
     */
    public $type_Reservation;

    /**
     * @ORM\ManyToOne (targetEntity="Client",inversedBy="id_reservation")
     */
    public $client;
    /**
     * @ORM\OneToOne (targetEntity="Facture",mappedBy="id_reservation")
     */
    public $facture;
    /**
     * @ORM\OneToMany (targetEntity="Chambre",mappedBy="id_reservation")
     */
    public $id_chambre;

    /**
     * @ORM\OneToMany (targetEntity="Suite",mappedBy="id_reservation")
     */
    public $id_suite;


    /**
     * Reservation constructor.
     */
    public function __construct()
    {
        $this->id_chambre= new ArrayCollection();
        $this->id_suite = new ArrayCollection();
    }

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
     * @return \Date
     */
    public function getDateCheckIn()
    {
        return $this->date_check_in;
    }

    /**
     * @param \Date $date_check_in
     */
    public function setDateCheckIn($date_check_in)
    {
        $this->date_check_in = $date_check_in;
    }

    /**
     * @return \Date
     */
    public function getDateCheckOut()
    {
        return $this->date_check_out;
    }

    /**
     * @param \Date $date_check_out
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
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * @param mixed $facture
     */
    public function setFacture($facture)
    {
        $this->facture = $facture;
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