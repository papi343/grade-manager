<?php
namespace App\Models;

use DateTime;

abstract class BaseEntity{    
    protected ?int $id = null;
    protected DateTime $createdAt;
    protected DateTime $updatedAt;

    public function __construct() {
         $this->createdAt = new DateTime();
         $this->updatedAt = new DateTime();
    }

    public function getId(): ?int 
    {
        return $this->id;
    }
    public function getCreatedAt(): ?Datetime {
        return $this->createdAt;
    }
    public function getUpdatedAt(): ?Datetime {
        return $this->updatedAt;
    }
        public function setUpdatedAt(Datetime $updated_at): self {
        $this->updatedAt = $updated_at;
        return $this;
    }
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }
    public function setCreatedAt(Datetime $created_at): self {
        $this->createdAt = $created_at;
        return $this;
    }


    abstract public function toArray(): array;


}