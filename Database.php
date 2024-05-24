<?php 

class Database {
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=quizz';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoGsb = null;
    private function __construct()
    {
            Database::$monPdo = new PDO(
            Database::$serveur . ';' . Database::$bdd,
            Database::$user,
            Database::$mdp
        );
        Database::$monPdo->query('SET CHARACTER SET utf8');
    }
    public function __destruct()
    {
        Database::$monPdo = null;
    }
    public static function getPdo(){
        return Database::$monPdo;
    }
    public static function getPdoGsb()
    {
        if (Database::$monPdoGsb == null) {
            Database::$monPdoGsb = new Database();
        }
        return Database::$monPdoGsb::$monPdo;
    }
    
}
