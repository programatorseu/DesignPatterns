<?php
final class Database
{
    public static function Instance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new Database();
        }
        return $instance;
    }

    private $db = null;
    private function __construct()
    {
    }
    public function query($sql)
    {
        echo "Performing query: $sql";
    }
}

$db1 = Database::Instance();
$db1->query("SELECT * FROM ProductTypes");
// var_dump($db1);
