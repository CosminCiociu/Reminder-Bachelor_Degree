<?php

namespace App\Entity;

use App\Repository\ReminderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReminderRepository::class)
 */
class Reminder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Created;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Reminder_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Confirmed;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreated(): ?string
    {
        return $this->Created;
    }

    public function setCreated(?string $Created): self
    {
        $this->Created = $Created;

        return $this;
    }

    public function getReminderDate(): ?string
    {
        return $this->Reminder_date;
    }

    public function setReminderDate(?string $Reminder_date): self
    {
        $this->Reminder_date = $Reminder_date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getConfirmed(): ?bool
    {
        return $this->Confirmed;
    }

    public function setConfirmed(?bool $Confirmed): self
    {
        $this->Confirmed = $Confirmed;

        return $this;
    }
}
