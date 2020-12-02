<?php


namespace CoolTravelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 */
class ResponsableHotel extends BaseUser
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    protected $id;
    

    /**
     * @ORM\OneToMany (targetEntity="Hotel",mappedBy="responsable")
     */
    public $hotel;
    /**
     * @ORM\Column (type="string",nullable=true)
     */
    public $tel;


    /**
     * ResponsableHotel constructor.
     * @param $hotel
     */
    public function __construct()
    {
        parent::__construct();
        $this->hotel = new ArrayCollection();
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
     * @return ArrayCollection
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * @param ArrayCollection $hotel
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }




}