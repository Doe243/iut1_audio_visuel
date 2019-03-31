<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LpStateRepository")
 */
class LpState
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
     * @ORM\OneToMany(targetEntity="App\Entity\LpProduct", mappedBy="lpState")
     */
    private $stateProduct;

    public function __construct()
    {
        $this->stateProduct = new ArrayCollection();
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
     * @return Collection|LpProduct[]
     */
    public function getStateProduct(): Collection
    {
        return $this->stateProduct;
    }

    public function addStateProduct(LpProduct $stateProduct): self
    {
        if (!$this->stateProduct->contains($stateProduct)) {
            $this->stateProduct[] = $stateProduct;
            $stateProduct->setLpState($this);
        }

        return $this;
    }

    public function removeStateProduct(LpProduct $stateProduct): self
    {
        if ($this->stateProduct->contains($stateProduct)) {
            $this->stateProduct->removeElement($stateProduct);
            // set the owning side to null (unless already changed)
            if ($stateProduct->getLpState() === $this) {
                $stateProduct->setLpState(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }
    
}
