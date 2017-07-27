<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table(name="medico")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MedicoRepository")
 */
class Medico
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="id_centro", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="AppBundle/Entity/CentroMedico")
     * @ORM\JoinColumn(name="id_centro", referencedColumnName="id")
     */
    private $idCentro;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Medico
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Medico
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set idCentro
     *
     * @param integer $idCentro
     *
     * @return Medico
     */
    public function setIdCentro($idCentro)
    {
        $this->idCentro = $idCentro;

        return $this;
    }

    /**
     * Get idCentro
     *
     * @return int
     */
    public function getIdCentro()
    {
        return $this->idCentro;
    }
}
