<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class ResponsableHotel
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    private $Id_Responsable;
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
    private $id_Hotel;

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
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->id_Hotel;
    }

    /**
     * @param mixed $id_Hotel
     */
    public function setIdHotel($id_Hotel)
    {
        $this->id_Hotel = $id_Hotel;
    }



}