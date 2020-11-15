<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Chambre
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    private $Id_Chambre;
    /**
     * @ORM\Column (type="integer")
     */
    private $nb_lit;
    /**
     * @ORM\Column (type="float")
     */
    private $prix;
    /**
     * @ORM\Column (type="integer")
     */
    private $numero_Chambre;

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
    public function getIdChambre()
    {
        return $this->Id_Chambre;
    }

    /**
     * @param mixed $Id_Chambre
     */
    public function setIdChambre($Id_Chambre)
    {
        $this->Id_Chambre = $Id_Chambre;
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