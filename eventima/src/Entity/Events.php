<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventsRepository::class)
 */
class Events
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $event_name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $event_descr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $event_img;

    /**
     * @ORM\Column(type="integer")
     */
    private $event_capac;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cont_email;

    /**
     * @ORM\Column(type="integer")
     */
    private $cont_phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $event_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $event_url;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $event_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventName(): ?string
    {
        return $this->event_name;
    }

    public function setEventName(string $event_name): self
    {
        $this->event_name = $event_name;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->date_time;
    }

    public function setDateTime(\DateTimeInterface $date_time): self
    {
        $this->date_time = $date_time;

        return $this;
    }

    public function getEventDescr(): ?string
    {
        return $this->event_descr;
    }

    public function setEventDescr(string $event_descr): self
    {
        $this->event_descr = $event_descr;

        return $this;
    }

    public function getEventImg(): ?string
    {
        return $this->event_img;
    }

    public function setEventImg(?string $event_img): self
    {
        $this->event_img = $event_img;

        return $this;
    }

    public function getEventCapac(): ?int
    {
        return $this->event_capac;
    }

    public function setEventCapac(int $event_capac): self
    {
        $this->event_capac = $event_capac;

        return $this;
    }

    public function getContEmail(): ?string
    {
        return $this->cont_email;
    }

    public function setContEmail(string $cont_email): self
    {
        $this->cont_email = $cont_email;

        return $this;
    }

    public function getContPhone(): ?int
    {
        return $this->cont_phone;
    }

    public function setContPhone(int $cont_phone): self
    {
        $this->cont_phone = $cont_phone;

        return $this;
    }

    public function getEventAddress(): ?string
    {
        return $this->event_address;
    }

    public function setEventAddress(string $event_address): self
    {
        $this->event_address = $event_address;

        return $this;
    }

    public function getEventUrl(): ?string
    {
        return $this->event_url;
    }

    public function setEventUrl(string $event_url): self
    {
        $this->event_url = $event_url;

        return $this;
    }

    public function getEventType(): ?string
    {
        return $this->event_type;
    }

    public function setEventType(string $event_type): self
    {
        $this->event_type = $event_type;

        return $this;
    }
}
