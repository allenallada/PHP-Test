<?php

namespace App\Utils\Singleton;

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
