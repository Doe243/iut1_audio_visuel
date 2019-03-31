<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LpProductRepository")
 */
class LpProduct
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
     * @ORM\Column(type="boolean")
     */
    private $disponibility;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $purchase_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $inventor_number;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $store_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LpState", inversedBy="stateProduct")
     */
    private $lpState;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LpProductCat", inversedBy="product")
     */
    private $lpProductCat;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LpBorrow", mappedBy="product")
     */
    private $lpBorrows;

    public function __construct()
    {
        $this->lpBorrows = new ArrayCollection();
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

    public function getDisponibility(): ?bool
    {
        return $this->disponibility;
    }

    public function setDisponibility(bool $disponibility): self
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchase_date;
    }

    public function setPurchaseDate(?\DateTimeInterface $purchase_date): self
    {
        $this->purchase_date = $purchase_date;

        return $this;
    }

    public function getInventorNumber(): ?int
    {
        return $this->inventor_number;
    }

    public function setInventorNumber(?int $inventor_number): self
    {
        $this->inventor_number = $inventor_number;

        return $this;
    }

    public function getStoreNumber(): ?int
    {
        return $this->store_number;
    }

    public function setStoreNumber(?int $store_number): self
    {
        $this->store_number = $store_number;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getLpState(): ?LpState
    {
        return $this->lpState;
    }

    public function setLpState(?LpState $lpState): self
    {
        $this->lpState = $lpState;

        return $this;
    }

    public function getLpProductCat(): ?LpProductCat
    {
        return $this->lpProductCat;
    }

    public function setLpProductCat(?LpProductCat $lpProductCat): self
    {
        $this->lpProductCat = $lpProductCat;

        return $this;
    }

    public function __toString(){
        return $this->name;
    }

    /**
     * @return Collection|LpBorrow[]
     */
    public function getLpBorrows(): Collection
    {
        return $this->lpBorrows;
    }

    public function addLpBorrow(LpBorrow $lpBorrow): self
    {
        if (!$this->lpBorrows->contains($lpBorrow)) {
            $this->lpBorrows[] = $lpBorrow;
            $lpBorrow->addProduct($this);
        }

        return $this;
    }

    public function removeLpBorrow(LpBorrow $lpBorrow): self
    {
        if ($this->lpBorrows->contains($lpBorrow)) {
            $this->lpBorrows->removeElement($lpBorrow);
            $lpBorrow->removeProduct($this);
        }

        return $this;
    }

}
