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
    public $Id_Reservation;
    /**
     * @ORM\Column (type="date")
     */
    public $date_check_in;
    /**
     * @ORM\Column (type="date")
     */
    public $date_check_out;
    /**
     * @ORM\Column (type="string", length=255)
     */
    public $type_Reservation;

    /**
     * @ORM\ManyToOne (targetEntity="Client")
     * @ORM\JoinColumn(name="Client", referencedColumnName="Id_Client")
     */
    public $client;
    /**
     * @ORM\OneToOne  (targetEntity="Facture",mappedBy="reservation")
     */
    public $facture;
    /**
     * @ORM\OneToMany (targetEntity="Chambre",mappedBy="reservation")
     * @ORM\JoinColumn(name="Chambre", referencedColumnName="id_chambre")
     */
    public $chambre;

    /**
     * @ORM\OneToMany (targetEntity="Suite",mappedBy="reservation")
     * @ORM\JoinColumn(name="Suite", referencedColumnName="Id_Suite")
     */
    public $suite;


    /**
     * Reservation constructor.
     */
    public function __construct()
    {
        $this->chambre= new ArrayCollection();
        $this->suite = new ArrayCollection();
    }

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
     * @return ArrayCollection
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * @param ArrayCollection $chambre
     */
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;
    }

    /**
     * @return ArrayCollection
     */
    public function getSuite()
    {
        return $this->suite;
    }

    /**
     * @param ArrayCollection $suite
     */
    public function setSuite($suite)
    {
        $this->suite = $suite;
    }




}