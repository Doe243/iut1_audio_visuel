<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LpProductCatRepository")
 */
class LpProductCat
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
     * @ORM\OneToMany(targetEntity="App\Entity\LpProduct", mappedBy="lpProductCat")
     */
    private $product;

    public function __construct()
    {
        $this->product = new ArrayCollection();
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
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(LpProduct $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setLpProductCat($this);
        }

        return $this;
    }

    public function removeProduct(LpProduct $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getLpProductCat() === $this) {
                $product->setLpProductCat(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }

}
