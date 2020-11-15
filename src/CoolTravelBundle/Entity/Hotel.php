<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Hotel
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    private $Id_Hotel;
    /**
     * @ORM\Column (type="integer")
     */
    private $nb_Hotel;
    /**
     * @ORM\Column (type="string",length=255)
     */
    private $nom_Hotel;
    /**
     * @ORM\Column (type="string",length=255)
     */
    private $localisation;

    /**
     * @ORM\Column (type="integer")
     */
    /**
     * @ORM\ManyToOne (targetEntity="ResponsableHotel")
     * @ORM\JoinColumn(name="id_responsable_hotel",referencedColumnName="Id_Responsable")
     */
    private $id_responsable_hotel;

    /**
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->Id_Hotel;
    }

    /**
     * @param mixed $Id_Hotel
     */
    public function setIdHotel($Id_Hotel)
    {
        $this->Id_Hotel = $Id_Hotel;
    }

    /**
     * @return mixed
     */
    public function getNbHotel()
    {
        return $this->nb_Hotel;
    }

    /**
     * @param mixed $nb_Hotel
     */
    public function setNbHotel($nb_Hotel)
    {
        $this->nb_Hotel = $nb_Hotel;
    }

    /**
     * @return mixed
     */
    public function getNomHotel()
    {
        return $this->nom_Hotel;
    }

    /**
     * @param mixed $nom_Hotel
     */
    public function setNomHotel($nom_Hotel)
    {
        $this->nom_Hotel = $nom_Hotel;
    }

    /**
     * @return mixed
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param mixed $localisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }

    /**
     * @return mixed
     */
    public function getIdResponsableHotel()
    {
        return $this->id_responsable_hotel;
    }

    /**
     * @param mixed $id_responsable_hotel
     */
    public function setIdResponsableHotel($id_responsable_hotel)
    {
        $this->id_responsable_hotel = $id_responsable_hotel;
    }


}