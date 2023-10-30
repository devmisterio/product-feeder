<?php

/**
 * Class BaseRepository
 *
 * The `BaseRepository` class serves as the foundation for all repository classes, providing a database connection.
 */
class BaseRepository
{
    /**
     * The database connection instance.
     *
     * @var PDO|null
     */
    protected ?PDO $db;

    /**
     * BaseRepository constructor.
     *
     * Initializes a new instance of the BaseRepository, creating a database connection.
     */
    public function __construct()
    {
        // Create a new database connection instance using provided environment variables.
        $dbConnection = new DbConnection(
            dbHost: getenv('MYSQL_HOST'),
            dbUsername: getenv('MYSQL_USER'),
            dbPassword: getenv('MYSQL_PASSWORD'),
            dbName: getenv('MYSQL_DATABASE')
        );

        // Connect to the database.
        $this->db = $dbConnection->connect();
    }
}