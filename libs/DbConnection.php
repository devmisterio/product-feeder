<?php

/**
 * Class DbConnection
 *
 * Handles the database connection by establishing a connection to a MySQL database.
 */
class DbConnection
{
    private string $dbHost;
    private string $dbUsername;
    private string $dbPassword;
    private string $dbName;

    /**
     * DbConnection constructor.
     *
     * @param string $dbHost     The database host (e.g., localhost).
     * @param string $dbUsername The username for the database connection.
     * @param string $dbPassword The password for the database connection.
     * @param string $dbName     The name of the database to connect to.
     */
    public function __construct(string $dbHost, string $dbUsername, string $dbPassword, string $dbName)
    {
        $this->dbHost = $dbHost;
        $this->dbUsername = $dbUsername;
        $this->dbPassword = $dbPassword;
        $this->dbName = $dbName;
    }

    /**
     * Establishes a connection to the database using the provided credentials.
     *
     * @return PDO Returns a PDO (PHP Data Objects) database connection instance.
     */
    public function connect(): PDO
    {
        try {
            $dsn = "mysql:host={$this->dbHost};dbname={$this->dbName}";
            $db = new PDO($dsn, $this->dbUsername, $this->dbPassword);

            // Set PDO error mode to throw exceptions on errors.
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
