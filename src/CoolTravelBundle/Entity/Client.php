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
    private $id;
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
     * @ORM\Column (type="string")
     */
    private $tel;
   /**
    * @var \Date
    * @ORM\Column (type="date")
    */
    private $date_naissance;

   /**
    * @ORM\OneToMany (targetEntity="Reservation",mappedBy="client")
    * @ORM\JoinColumn(name="reservation_id", referencedColumnName="id")
    */
    private $id_reservation;

    /**
     * Client constructor.
     * @param $id_reservation
     */
    public function __construct()
    {
        $this->id_reservation = new ArrayCollection();
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
     * @return \DateTime
     */
    public function getdatenaissance()
    {
        return $this->date_naissance;
    }    /**
     * @return \DateTime
     */
    public function getdate_naissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param \DateTime $date_naissance
     */
    public function setdatenaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }
    /**
     * @param \DateTime $date_naissance
     */
    public function setdate_naissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return ArrayCollection
     */
    public function getIdReservation()
    {
        return $this->id_reservation;
    }

    /**
     * @param ArrayCollection $id_reservation
     */
    public function setIdReservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;
    }


}