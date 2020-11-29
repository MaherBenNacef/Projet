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
    public $id_chambre;
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