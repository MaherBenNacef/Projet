<?php


namespace CoolTravelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Hotel
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    public $id;
   /* /**
     * @ORM\Column (type="integer")
     */
   // public $nb_etoile;
    /**
     * @ORM\Column (type="string",length=255)
     */
    public $nom_Hotel;
    /**
     * @ORM\Column (type="string",length=255)
     */
    public $localisation;

   /**
    * @ORM\OneToMany (targetEntity="Chambre",mappedBy="id_hotel")
    */
   public $id_chambre;

    /**
     * @ORM\OneToMany (targetEntity="Suite",mappedBy="id_hotel")
     */
    public $id_suite;

    /**
     * @ORM\ManyToOne (targetEntity="ResponsableHotel",inversedBy="id_hotel")
     */
    public $id_responsable_hotel;

    /**
     * Hotel constructor.
     */
    public function __construct()
    {
        $this->id_chambre = new ArrayCollection();
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



    public function getNbHotel()
    {

    }

    public function setNbHotel()
    {

    }


}