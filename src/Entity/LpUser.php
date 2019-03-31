<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LpUserRepository")
 * @UniqueEntity(
 * fields = {"email"},
 * message = "L'email que vous avez indiqué est déjà utilisé")
 */
class LpUser implements UserInterface
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="6", minMessage="Votre nom d'utilisateur doit faire au minimum 6 caractères")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "Cet email '{{ value }}' n'est pas une ardresse email valide.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="5", minMessage="Votre mot de passe doit faire au minimum 8 caractères")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $banned;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LpGroup", mappedBy="user_group")
     */
    private $lpGroups;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LpBorrow", mappedBy="lpUser")
     */
    private $lpBorrows;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LpRole", inversedBy="users")
     */
    private $userRoles;

    public function __construct()
    {
        $this->lpGroups = new ArrayCollection();
        $this->lpBorrows = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBanned(): ?bool
    {
        return $this->banned;
    }

    public function setBanned(bool $banned): self
    {
        $this->banned = $banned;

        return $this;
    }

    /**
     * @return Collection|LpGroup[]
     */
    public function getLpGroups(): Collection
    {
        return $this->lpGroups;
    }

    public function addLpGroup(LpGroup $lpGroup): self
    {
        if (!$this->lpGroups->contains($lpGroup)) {
            $this->lpGroups[] = $lpGroup;
            $lpGroup->setUserGroup($this);
        }

        return $this;
    }

    public function removeLpGroup(LpGroup $lpGroup): self
    {
        if ($this->lpGroups->contains($lpGroup)) {
            $this->lpGroups->removeElement($lpGroup);
            // set the owning side to null (unless already changed)
            if ($lpGroup->getUserGroup() === $this) {
                $lpGroup->setUserGroup(null);
            }
        }

        return $this;
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
            $lpBorrow->setLpUser($this);
        }

        return $this;
    }

    public function removeLpBorrow(LpBorrow $lpBorrow): self
    {
        if ($this->lpBorrows->contains($lpBorrow)) {
            $this->lpBorrows->removeElement($lpBorrow);
            // set the owning side to null (unless already changed)
            if ($lpBorrow->getLpUser() === $this) {
                $lpBorrow->setLpUser(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->firstname;
    }

    /**
     * @return Collection|LpRole[]
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }

    public function addUserRole(LpRole $userRole): self
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles[] = $userRole;
        }

        return $this;
    }

    public function removeUserRole(LpRole $userRole): self
    {
        if ($this->userRoles->contains($userRole)) {
            $this->userRoles->removeElement($userRole);
        }

        return $this;
    }

    /**
     * Cette fonction nous permet de récupérer les roles des utilisateurs
     */
    public function getRoles(){
       
        $roles = $this->userRoles->map(function($role){
            return $role->getName();
        })->toArray();

        $roles[] = "ROLE_USER";

        return $roles;
    }
    public function getRole(){}
    public function getSalt(){}
    public function getUsername(){
        return $this->email;
    }
    public function eraseCredentials(){}

}
