<?php
namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Client
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    private $Id_Client;
    /**
     * @ORM\Column (type="string", length=255)
     */
    private $username;
    /**
     * @ORM\Column (type="string", length=255)
     */
    private $password;
    /**
     * @ORM\Column (type="string", length=255)
     */
    private $email;
    /**
     * @ORM\Column (type="integer")
     */
    private $tel;
    /**
     * @ORM\Column (type="integer")
     */
    /**
     * @ORM\ManyToOne (targetEntity="Reservation")
     * @ORM\JoinColumn(name="id_reservation",referencedColumnName="Id_Reservation")
     */
    private $id_reservation;

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
    public function getIdReservation()
    {
        return $this->id_reservation;
    }

    /**
     * @param mixed $id_reservation
     */
    public function setIdReservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;
    }



}