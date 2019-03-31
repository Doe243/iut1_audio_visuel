<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LpGroupRepository")
 */
class LpGroup
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
     * @ORM\ManyToOne(targetEntity="App\Entity\LpUser", inversedBy="lpGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_group;

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

    public function getUserGroup(): ?LpUser
    {
        return $this->user_group;
    }

    public function setUserGroup(?LpUser $user_group): self
    {
        $this->user_group = $user_group;

        return $this;
    }


    public function __toString(){
        return $this->name;
    }

}
