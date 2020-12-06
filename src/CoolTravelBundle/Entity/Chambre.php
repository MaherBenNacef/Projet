<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table("chambre")
 * @ORM\Entity
 */
class Chambre
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    public $id;
    /**
     * @ORM\Column (type="integer")
     */
    public $nb_lit;
    /**
     * @ORM\Column (type="float")
     */
    public $prix;
    /**
     * @ORM\Column (type="integer")
     */
    public $numero_Chambre;

    /**
     * @ORM\ManyToOne (targetEntity="Reservation",inversedBy="id_chambre")
     */
    public $id_reservation;

    /**
     * @ORM\ManyToOne (targetEntity="Hotel",inversedBy="id_chambre")
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
    public function getNbLit()
    {
        return $this->nb_lit;
    }

    /**
     * @param mixed $nb_lit
     */
    public function setNbLit($nb_lit)
    {
        $this->nb_lit = $nb_lit;
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
    public function getNumeroChambre()
    {
        return $this->numero_Chambre;
    }

    /**
     * @param mixed $numero_Chambre
     */
    public function setNumeroChambre($numero_Chambre)
    {
        $this->numero_Chambre = $numero_Chambre;
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