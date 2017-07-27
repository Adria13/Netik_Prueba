<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paciente
 *
 * @ORM\Table(name="paciente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PacienteRepository")
 */
class Paciente
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_visita", type="date")
     */
    private $fechaVisita;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_visita", type="time")
     */
    private $horaVisita;

    /**
     * @var int
     *
     * @ORM\Column(name="id_centro", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="CentroMedico")
     * @ORM\JoinColumn(name="id_centro", referencedColumnName="id")
     */
    private $idCentro;

    /**
     * @var int
     *
     * @ORM\Column(name="id_medico", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="medicos")
     * @ORM\JoinColumn(name="id_centro", referencedColumnName="id")
     */
    private $idMedico;


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
     * @return Paciente
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
     * @return Paciente
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
     * Set fechaVisita
     *
     * @param \DateTime $fechaVisita
     *
     * @return Paciente
     */
    public function setFechaVisita($fechaVisita)
    {
        $this->fechaVisita = $fechaVisita;

        return $this;
    }

    /**
     * Get fechaVisita
     *
     * @return \DateTime
     */
    public function getFechaVisita()
    {
        return $this->fechaVisita;
    }

    /**
     * Set horaVisita
     *
     * @param \DateTime $horaVisita
     *
     * @return Paciente
     */
    public function setHoraVisita($horaVisita)
    {
        $this->horaVisita = $horaVisita;

        return $this;
    }

    /**
     * Get horaVisita
     *
     * @return \DateTime
     */
    public function getHoraVisita()
    {
        return $this->horaVisita;
    }

    /**
     * Set idCentro
     *
     * @param integer $idCentro
     *
     * @return Paciente
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

    /**
     * Set idMedico
     *
     * @param integer $idMedico
     *
     * @return Paciente
     */
    public function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;

        return $this;
    }

    /**
     * Get idMedico
     *
     * @return int
     */
    public function getIdMedico()
    {
        return $this->idMedico;
    }
}
