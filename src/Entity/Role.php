<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $role = null;

    #[ORM\OneToMany(mappedBy: 'role', targetEntity: Commite::class)]
    private Collection $commites;

    public function __construct()
    {
        $this->commites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Commite>
     */
    public function getCommites(): Collection
    {
        return $this->commites;
    }

    public function addCommite(Commite $commite): self
    {
        if (!$this->commites->contains($commite)) {
            $this->commites->add($commite);
            $commite->setRole($this);
        }

        return $this;
    }

    public function removeCommite(Commite $commite): self
    {
        if ($this->commites->removeElement($commite)) {
            // set the owning side to null (unless already changed)
            if ($commite->getRole() === $this) {
                $commite->setRole(null);
            }
        }

        return $this;
    }
    public function __toString()
{
    return $this->getRole(); // or any other representation you prefer
}
}
