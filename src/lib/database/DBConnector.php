<?php

namespace wor\lib\database;

use wor\lib\config\Configuration;
use wor\lib\container\Container;

/**
 * Class DBConnector
 *
 * @package wor\lib\database
 */
class DBConnector
{
    #private static $instance = null;
    private static $conn = null;

    private $dbUrl;
    private $userId;
    private $userPassword;

    /**
     * DBConnector constructor.
     *
     * @param Configuration $config
     */
    public function __construct()
    {
        $config = Container::getInstance()->get(Configuration::class);
        $dbInfo = $config->getDbInfo();

        $this->dbUrl        = $dbInfo["url"];
        $this->userId       = $dbInfo["id"];
        $this->userPassword = $dbInfo["password"];

        self::$conn = new \PDO(
            $this->dbUrl,
            $this->userId,
            $this->userPassword
        );
    }

    /**
     * @return \PDO
     */
    public static function getConnection()
    {
        /*
        if (self::$instance == null) {
            self::$instance = new static;
        }*/

        return self::$conn;
    }
}
