<?php
namespace App\config;
use PDO;
use PDOException;

class Database{
    private static ?Database $instance = null;
    private PDO $connexion;
    //Pattern singleton

    
    private string $host;
    private int $port;
    private string $dbName;
    private string $username;
    private string $password;

    // le constructeur

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->port =DB_PORT;
        $this->dbName = DB_DATABASE;
        $this->username = DB_USERNAME;
        $this->password =DB_PASSWORD;
    }

    //Creation de l'unique instance

    public static function getInstance():Database
    {
        if(self::$instance === null)
            {
               self::$instance = new Database();
            }
        return self::$instance ;
    }

    public function getConnection():PDO{
        try{
                            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbName};charset=utf8mb4";
                
                // Options PDO
                $options = [
                    // Mode d'erreur : Exceptions (pour attrapper les erreurs avec try/catch)
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    
                    // Mode de récupération par défaut : tableau associatif
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

                    // Désactiver l'émulation des requêtes préparées pour une meilleure sécurité
                    PDO::ATTR_EMULATE_PREPARES => false,

                    // Ne pas utiliser de connexions persistantes
                    PDO::ATTR_PERSISTENT => false,
                ];

                $this->connexion = new PDO($dsn, $this->username, $this->password, $options);
            } catch (PDOException $e) {
                // Gérer les erreurs de connexion
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
             return $this->connexion;
        }
       
    }
        
    
