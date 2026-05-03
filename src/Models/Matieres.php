<?php
namespace App\Models;

use Dotenv\Util\Str;
use PhpParser\Node\Scalar\String_;

class Matieres extends BaseEntity{
    private string $libeller;
    private ?int $id_prof;
    private ?int $id_classe;

    public function __construct(string $libeller = '', ?int $id_prof = null, ?int $id_classe = null)
    { 
        parent::__construct();
        $this->libeller = $libeller ;
        $this->id_prof = $id_prof;
        $this->id_classe = $id_classe;
    }
    // les geters
    public function getLibeller():string{
        return $this->libeller;
    }
    public function getIdprof():?int{
        return $this->id_prof;
    }
        public function getIdclasse():?int{
        return $this->id_classe;
    }

    // les seters
    public function setLibeller(string $nom):self
    {
        $this->libeller = $nom;
        return $this;
    }
    public function setIdprof(int $id):self
    {
        $this->id_prof = $id;
        return $this;
    }
    public function setIdclasse(int $id):self
    {
        $this->id_classe = $id;
        return $this;
    }
    
    public function toArray(): array
    {
         return [
            'id_matiers'=>$this->id,
            'libeller'=>$this->libeller,
            'id_prof'=> $this->id_prof,
            'id_classe'=> $this->id_classe,
            'createdAt'=> $this->createdAt ? $this->createdAt->format('Y-m-d h:i:s') : null,
            'updatedAt'=> $this->updatedAt ? $this->createdAt->format('Y-m-d h:i:s') : null,

         ];
    }
}