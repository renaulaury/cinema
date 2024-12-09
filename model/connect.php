<!-- file pour se connecter a la bdd -->

<?php
// namespace permet de use la classe sans connaitre son emplacement

namespace Model;

/*classe abstraite car need connexion uniquement*/

abstract class Connect
{
    const HOST = 'localhost';
    const DB = 'cinema';
    const USER = 'root';
    const PASS = '';

    public static function seConnecter()
    {
        try {
            return new \PDO(   //le \ indique au framework que PDO est une classe native
                'mysql:host=' . self::HOST . 'dbname=' . self::DB . ';charset=utf8',
                self::USER,
                self::PASS
            );
        } catch (\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
