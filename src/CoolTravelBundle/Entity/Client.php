<?php
namespace CoolTravelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Client
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    public $Id_Client;
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
    * @ORM\Column (type="date")
    */
   public $date_naissance;

   /**
    * @ORM\OneToMany (targetEntity="Reservation",mappedBy="client")
    * @ORM\JoinColumn(name="Reservation", referencedColumnName="Id_Reservation")
    */
   public $reservation;

    /**
     * Client constructor.
     * @param $reservation
     */
    public function __construct()
    {
        $this->reservation = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->Id_Client;
    }

    /**
     * @param mixed $Id_Client
     */
    public function setIdClient($Id_Client)
    {
        $this->Id_Client = $Id_Client;
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
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return ArrayCollection
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param ArrayCollection $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }


}