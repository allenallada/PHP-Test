<?php

class ManagerSingleton
{
    /**
     * instances array
     * stores all the current instances
     */
    private static $instances = [];

    /**
     * override in child class
     */
    protected string $table = '';

    /**
     * protected construct to prevent instantiation
     */
    protected function __construct()
    {
        //empty, nothing to do here yet
    }

    /**
     * Get Manager Singleton instance
     */
    public static function getInstance()
    {
        $className = static::class;

        /**
         * check if the instances doesnt exists
         * create if not exists
         */
        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = new static();
        }

        return self::$instances[$className];
    }
}
