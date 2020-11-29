<?php


namespace CoolTravelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class ResponsableHotel
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    public $Id_Responsable;
    /**
     * @ORM\Column (type="string", length=255)
     */
    public $username;
    /**
     * @ORM\Column (type="string", length=255)
     */
    public $password;
    /**
     * @ORM\Column (type="string", length=255)
     */
    public $email;
    /**
     * @ORM\Column (type="string")
     */
    public $tel;

    /**
     * @ORM\OneToMany (targetEntity="Hotel",mappedBy="responsable")
     * @ORM\JoinColumn(name="Hotel", referencedColumnName="Id_Hotel")
     */
    public $hotel;

    /**
     * ResponsableHotel constructor.
     * @param $hotel
     */
    public function __construct()
    {
        $this->hotel = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdResponsable()
    {
        return $this->Id_Responsable;
    }

    /**
     * @param mixed $Id_Responsable
     */
    public function setIdResponsable($Id_Responsable)
    {
        $this->Id_Responsable = $Id_Responsable;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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


}