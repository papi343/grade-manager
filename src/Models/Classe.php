git <?php
namespace App\Models;

class Classe {
    private string $nomClasse;
    private  string $filiere;
    private string $niveau;
   private ?int $id = null;
    
public function __construct(?int $id = null,string $nomClasse = '',string $filiere = '',string $niveau = '') {
       
        $this->id = $id;
        $this->nomClasse = $nomClasse;
        $this->filiere = $filiere;
        $this->niveau = $niveau;
    }
    public function getId(): ?int{
        return $this->id;
    }
    public function setId(int $id): self{
        $this->id = $id;
        return $this;
    }
    public function getNomclasse(): string{
        return $this->nomClasse;
    }
    public function getFiliere(): string{
        return $this->filiere;
    }
    public function getNiveau(): string{
        return $this->niveau;
    }
    public function setNomclasse($nom): self{
        $this->nomClasse = $nom;
        return $this;
    }
    public function setFiliere($filiere): self{
        $this->filiere = $filiere;
        return $this;
    }
    public function setNiveau($niveau): self{
        $this->niveau = $niveau;
        return $this;
    }

    public function toArray(): array
    {
        return[
                'id'=>$this->id,
            'nomClasse'=>$this->nomClasse,
            'filiere'=>$this->filiere,
            'niveau'=>$this->niveau,
            'createdAt'=> $this->createdAt ? $this->createdAt->format('Y-m-d h:i:s') : null,
            'updatedAt'=> $this->updatedAt ? $this->createdAt->format('Y-m-d h:i:s') : null,
        ];
    }

}