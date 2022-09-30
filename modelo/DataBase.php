<?php

namespace modelo;

use PDO;
use PDOException;

/**
 * Clase que se encarga de la conexión con la Base de Datos
 *
 * referencia
 * by: Philip Brown
 * src: http://culttt.com/2012/10/01/roll-your-own-pdo-php-class/ 
 *
 * @package    \clases
 *
 **/
class DataBase
{
    //Definir parámetros - Datos para realizar la conexión con la BD
    private $host = Constantes::BD_HOST;
    private $user = Constantes::BD_USER;
    private $pass = Constantes::BD_PASS;
    private $dbname = Constantes::BD_NAME;
    //Manejador de BD (Database Handler) - Esta variable manejará la conexión con la BD
    //Error - Esta variable manejará los errores
    private $dbh;
    private $error;
    //Declaración (Statement) - Esta variable contendrá la consulta, luego de ser preparada
    private $stmt;

    /**
     * Método constructor de la clase DB
     */
    public function __construct()
    {
        // Establece DSN (Data Source Name - Nombre del Origen de Datos)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        //Estable opciones que
        /*
		$options = array(
			PDO::ATTR_PERSISTENT => true, 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
*/
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Conexión con la BD
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    } // END constructor

    public function close()
    {
        $this->dbh = null;
    }

    /**
     * Método que evalúa la consulta y prepara la sentencia (PDO::prepare)
     *
     * @param      string	$consulta	La consulta que será preparada.
     */
    public function query($consulta)
    {
        // Establece stmt
        $this->stmt = $this->dbh->prepare($consulta);
    }

    /**
     * Enlaza el valor con el parámetro definido en la declaración (PDOStatement::bindValue).
     * 
     * PRE-requisito(s):
     * Haber utilizado el método {query($consulta)}
     * 
     * @param      string	$param  El parámetro ha reemplazar en $stmt.
     * @param      mixed	$valor	El valor que reemplaza al parámetro.
     * @param      string	$type	El tipo de dato para el valor.
     */
    public function bind($param, $valor, $type = null)
    {
        // Se pregunta si $type es nulo.
        // TRUE: Se evalúa el tipo de dato de $valor.
        if (is_null($type)) {
            switch (true) {
                case is_int($valor):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        // Se enlazan los valores a la consulta.
        $this->stmt->bindValue($param, $valor, $type);
    }

    /**
     * Ejecuta la declaración preparada y enlazada (PDOStatement::execute).
     *
     * @return     bool  Devuelve TRUE en caso de éxito o FALSE en caso de error.
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * Consulta y devuelve un array con la filas del conjunto de resultado (PDOStatement::fetchAll).
     *
     * @return     array  Conjunto de filas que representa el resultado de la declaración ejecutada.
     */
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Consulta y devuelve un array con una única fila del conjunto de resultado (PDOStatement::fetch).
     *
     * @return     array  Única fila del conjunto de resultado.
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Método que devuelve la cantidad de filas afectadas al ejecutar, previamente, una orden
     * de DELETE, UPDATE o INSERT (PDOStatement::rowCount).
     *
     * @return     int  Cantidad de filas afectadas.
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    /**
     * Método que devuelve el último ID registrado (PDO::lastInsertId).
     *
     * @return     string  ültimo ID registrado.
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    /** 
     * ================== TRANSACCIONES ==================
     * 
     * Las transacciones permiten realizar múltiples cambios a la BD 
     * asegurándo que no serán ingresados de forma incorrecta o
     * que no existirá una interferencia externa antes de terminar.
     * 
     * Sirve en los momentos donde se realizan múltiples consultas 
     * que dependen una sobre la otra, si una de estas consultas falla
     * se activará la excepción y permitirá deshacer los cambios, volviendo
     * al estado anterior de realizada la 1º consulta.
     * 
     * También ayuda a prevenir la inconsistencia de datos.
     */

    /**
     * Comienza una transacción (PDO::beginTransaction).
     *
     * @return     bool  Resultado del inicio de la transacción.
     */
    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }

    /**
     * Finaliza la transacción y guarda los cambios realizados (PDO::commit).
     *
     * @return     bool  Resultado del final de la transacción.
     */
    public function endTransaction()
    {
        return $this->dbh->commit();
    }

    /**
     * Cancela la transacción y deshace los cambios realizados (PDO::rollBack).
     *
     * @return     bool  Resultado de la cancelación de la transacción.
     */
    public function cancelTransaction()
    {
        return $this->dbh->rollBack();
    }

    /**
     * Limpia la información contenida en las sentencias preparadas (PDOStatement::debugDumpParams).
     *
     * @return     void
     */
    public function debugDumpParams()
    {
        return $this->stmt->debugDumpParams();
    }
}// END class DB
