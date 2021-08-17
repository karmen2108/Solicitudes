<?php

namespace App\Entity;

use App\Repository\OrganismoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganismoRepository::class)
 */
class Organismo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=Notas::class, mappedBy="organismo")
     */
    private $notas;

    public function __construct()
    {
        $this->notas = new ArrayCollection();
    }

    public function __toString() {
        return $this->getNombre();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Notas[]
     */
    public function getNotas(): Collection
    {
        return $this->notas;
    }

    public function addNota(Notas $nota): self
    {
        if (!$this->notas->contains($nota)) {
            $this->notas[] = $nota;
            $nota->setOrganismo($this);
        }

        return $this;
    }

    public function removeNota(Notas $nota): self
    {
        if ($this->notas->removeElement($nota)) {
            // set the owning side to null (unless already changed)
            if ($nota->getOrganismo() === $this) {
                $nota->setOrganismo(null);
            }
        }

        return $this;
    }
}
