<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LpVisaRepository")
 */
class LpVisa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LpBorrow", mappedBy="lpVisa")
     */
    private $lpVisa;

    public function __construct()
    {
        $this->lpVisa = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|LpBorrow[]
     */
    public function getLpVisa(): Collection
    {
        return $this->lpVisa;
    }

    public function addLpVisa(LpBorrow $lpVisa): self
    {
        if (!$this->lpVisa->contains($lpVisa)) {
            $this->lpVisa[] = $lpVisa;
            $lpVisa->setLpVisa($this);
        }

        return $this;
    }

    public function removeLpVisa(LpBorrow $lpVisa): self
    {
        if ($this->lpVisa->contains($lpVisa)) {
            $this->lpVisa->removeElement($lpVisa);
            // set the owning side to null (unless already changed)
            if ($lpVisa->getLpVisa() === $this) {
                $lpVisa->setLpVisa(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }

}
