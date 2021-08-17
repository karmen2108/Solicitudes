<?php

namespace App\Entity;

use App\Repository\NotasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NotasRepository::class)
 */
class Notas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $solicitante;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $observacion;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity=Organismo::class, inversedBy="notas")
     */
    private $organismo;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class, inversedBy="notas")
     */
    private $area;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getSolicitante(): ?string
    {
        return $this->solicitante;
    }

    public function setSolicitante(string $solicitante): self
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(?string $observacion): self
    {
        $this->observacion = $observacion;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getOrganismo(): ?organismo
    {
        return $this->organismo;
    }

    public function setOrganismo(?organismo $organismo): self
    {
        $this->organismo = $organismo;

        return $this;
    }

    public function getArea(): ?area
    {
        return $this->area;
    }

    public function setArea(?area $area): self
    {
        $this->area = $area;

        return $this;
    }
}
