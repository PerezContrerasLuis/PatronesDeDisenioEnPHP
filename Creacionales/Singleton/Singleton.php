<?php

namespace Singleton;


class Singleton
{
    //almacenara una instancia de cada clase hija
    private static $instances = [];

    //Se hace privado para evitar que instancien la clase
    protected function __construct()
    {
        
    }

    //Se evita el clonado 
    protected function __clone()
    {
        
    }

    //se evita poder deserealizar el objeto y poder clonarlo
    public function __wakeup()
    {
        throw new \Exception("No se puede deserializar un objeto singleton");
    }

    /**
    * El método getInstance() se asegura de que solo exista UNA instancia 
    * de una clase (como Logger o Config) 
    * y que siempre puedas acceder a esa misma instancia desde cualquier parte del código.
    * 
    * static → Este método pertenece a la clase, no a un objeto. Lo llamas así: Logger::getInstance().
    * 
    */
    public static function getInstance() : Singleton
    {
        /**
         * Aquí se guarda el nombre de la clase que llama este método.
         * Si llamas Logger::getInstance(), entonces $cls será "Logger".
         * static::class es como decir “la clase actual desde donde estoy llamando”.
         * 
        */
        $cls =static::class;

        if(!isset(self::$instances[$cls])) {
            /**
             * Esta línea crea una nueva instancia de la clase que llamó al método (como Logger) y la guarda en el arreglo.
             * new static() significa: “Crea una instancia de la clase actual que está llamando a getInstance()”.
             */
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}