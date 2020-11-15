<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Suite
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    private $Id_Suite;
    /**
     * @ORM\Column (type="float")
     */
    private $prix;
    /**
     * @ORM\Column (type="integer")
     */
    private $numero_Suite;

    /**
     * @ORM\Column (type="string",length=255)
     */
    /**
     * @ORM\ManyToOne (targetEntity="Hotel")
     * @ORM\JoinColumn(name="id_hotel",referencedColumnName="Id_Hotel")
     */
    private $id_hotel;

    /**
     * @return mixed
     */
    public function getIdSuite()
    {
        return $this->Id_Suite;
    }

    /**
     * @param mixed $Id_Suite
     */
    public function setIdSuite($Id_Suite)
    {
        $this->Id_Suite = $Id_Suite;
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