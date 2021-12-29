<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'booking', targetEntity: BookingItem::class, fetch: "EAGER")]
    private $bookingItems;

    #[ORM\Column(type: 'integer')]
    private $totalPrice;

    #[ORM\Column(type: 'integer')]
    private $status;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $shippingPrice;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $shippingMethod;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'bookings', fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private $customer;

    public function __construct()
    {
        $this->bookingItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|BookingItem[]
     */
    public function getBookingItems(): Collection
    {
        return $this->bookingItems;
    }

    public function addBookingItem(BookingItem $bookingItem): self
    {
        if (!$this->bookingItems->contains($bookingItem)) {
            $this->bookingItems[] = $bookingItem;
            $bookingItem->setBooking($this);
        }

        return $this;
    }

    public function removeBookingItem(BookingItem $bookingItem): self
    {
        if ($this->bookingItems->removeElement($bookingItem)) {
            // set the owning side to null (unless already changed)
            if ($bookingItem->getBooking() === $this) {
                $bookingItem->setBooking(null);
            }
        }

        return $this;
    }

    public function getTotalPrice(): ?int
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(int $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getShippingPrice(): ?int
    {
        return $this->shippingPrice;
    }

    public function setShippingPrice(?int $shippingPrice): self
    {
        $this->shippingPrice = $shippingPrice;

        return $this;
    }

    public function getShippingMethod(): ?string
    {
        return $this->shippingMethod;
    }

    public function setShippingMethod(?string $shippingMethod): self
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
