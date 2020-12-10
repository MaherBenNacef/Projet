<?php


namespace CoolTravelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\GroupInterface;
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
     * @ORM\OneToMany (targetEntity="Hotel",mappedBy="id_responsable_hotel")
     */
    public $id_hotel;
    /**
     * @ORM\Column (type="string",nullable=true,length=11)
     */
    public $tel;


    /**
     * ResponsableHotel constructor.
     * @param $id_hotel
     */
    public function __construct()
    {
        parent::__construct();
        $this->id_hotel = new ArrayCollection();
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
    public function getIdHotel()
    {
        return $this->id_hotel;
    }

    /**
     * @param ArrayCollection $id_hotel
     */
    public function setIdHotel($id_hotel)
    {
        $this->id_hotel = $id_hotel;
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

    /**
     * @return \DateTime|null
     */
    public function getlast_login()
    {
        return $this->lastLogin;
    }









}