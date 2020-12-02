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
    public $Id_Hotel;
    /**
     * @ORM\Column (type="integer")
     */
    public $nb_etoile;
    /**
     * @ORM\Column (type="string",length=255)
     */
    public $nom_Hotel;
    /**
     * @ORM\Column (type="string",length=255)
     */
    public $localisation;

   /**
    * @ORM\OneToMany (targetEntity="Chambre",mappedBy="hotel")
    * @ORM\JoinColumn(name="Chambre", referencedColumnName="id_chambre")
    */
   public $chambre;

    /**
     * @ORM\OneToMany (targetEntity="Suite",mappedBy="hotel")
     * @ORM\JoinColumn(name="Suite", referencedColumnName="Id_Suite")
     */
    public $suite;

    /**
     * @ORM\ManyToOne (targetEntity="ResponsableHotel")
     */
    public $responsable;

    /**
     * Hotel constructor.
     */
    public function __construct()
    {
        $this->chambre = new ArrayCollection();
        $this->suite = new ArrayCollection();
    }

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
    public function getNbEtoile()
    {
        return $this->nb_etoile;
    }

    /**
     * @param mixed $nb_etoile
     */
    public function setNbEtoile($nb_etoile)
    {
        $this->nb_etoile = $nb_etoile;
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