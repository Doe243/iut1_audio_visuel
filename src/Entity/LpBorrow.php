<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LpBorrowRepository")
 */
class LpBorrow
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $borrow_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $borrow_return;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment_admin;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\LpGroup", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $lpgroup;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LpUser", inversedBy="lpBorrows")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lpUser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LpVisa", inversedBy="lpVisa")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lpVisa;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $borrow_return_date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LpProduct", inversedBy="lpBorrows")
     */
    private $product;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $group_name;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowDate(): ?\DateTimeInterface
    {
        return $this->borrow_date;
    }

    public function setBorrowDate(\DateTimeInterface $borrow_date): self
    {
        $this->borrow_date = $borrow_date;

        return $this;
    }

    public function getBorrowReturn(): ?\DateTimeInterface
    {
        return $this->borrow_return;
    }

    public function setBorrowReturn(\DateTimeInterface $borrow_return): self
    {
        $this->borrow_return = $borrow_return;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCommentAdmin(): ?string
    {
        return $this->comment_admin;
    }

    public function setCommentAdmin(?string $comment_admin): self
    {
        $this->comment_admin = $comment_admin;

        return $this;
    }

    public function getLpgroup(): ?LpGroup
    {
        return $this->lpgroup;
    }

    public function setLpgroup(LpGroup $lpgroup): self
    {
        $this->lpgroup = $lpgroup;

        return $this;
    }

    public function getLpUser(): ?LpUser
    {
        return $this->lpUser;
    }

    public function setLpUser(?LpUser $lpUser): self
    {
        $this->lpUser = $lpUser;

        return $this;
    }

    public function getLpVisa(): ?LpVisa
    {
        return $this->lpVisa;
    }

    public function setLpVisa(?LpVisa $lpVisa): self
    {
        $this->lpVisa = $lpVisa;

        return $this;
    }


    public function __toString() {
        $id = $this->id;
        $id = strval($id);
        return $id;
    }

    public function getBorrowReturnDate(): ?\DateTimeInterface
    {
        return $this->borrow_return_date;
    }

    public function setBorrowReturnDate(?\DateTimeInterface $borrow_return_date): self
    {
        $this->borrow_return_date = $borrow_return_date;

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
        }

        return $this;
    }

    public function removeProduct(LpProduct $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
        }

        return $this;
    }

    public function getGroupName(): ?string
    {
        return $this->group_name;
    }

    public function setGroupName(string $group_name): self
    {
        $this->group_name = $group_name;

        return $this;
    }



}
