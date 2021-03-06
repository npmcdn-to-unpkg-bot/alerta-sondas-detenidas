<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
define('VERSION','1.0.0');
define('TITULO','Sondas de humedad');
//
// Define custom session name
define('SESSION_NAME',"sondas_");
session_name(SESSION_NAME);
//
// para el alerta de sondas detenidas
define('DIFERENCIA_DIAS',2);
// AUTENTICAR
define('AUTENTICAR',true);
// datos de la cuenta de gmail usada como smtp para el envio de mails
define('MAIL_HOST','smtp.gmail.com');
define('MAIL_PORT',587);
define('MAIL_SMTPSecure','tls');
define('MAIL_USERNAME','sondas.seedmech@gmail.com');
define('MAIL_PASSWORD','seedmech932');
// ruta principal 
define('PATH_ROOT',dirname(__FILE__));
// archivos temporales
define('TEMPORALES',PATH_ROOT.'/temp/');
// archivo de errores
define('ERROR_LOG',PATH_ROOT.'/temp/errores.log');
// conexion a base de datos
define('DEFAULT_CHARSET',"utf8"); //iso-8859-1     utf-8
// datos para la conexion a la base de datos 
define('SERVIDOR','localhost');
define('BASE_DATOS','sondas');
define('USUARIO','alerta');
define('PASSWORD','alertasondas932');
// Pie de pagina
define('PIE','Seedmech Latinamérica SRL - Buenos Aires 642 - CP 2000 - Rosario - Santa Fe - Argentina <br> Tel. (telfax) +54 +341 4472954 y 4259475');
//tipos de archivos
$tipos_archivos=json_encode(array('txt'=>'TXT','csv'=>'CSV','xls'=>'XLS'));
define('TIPOS_ARCHIVOS',$tipos_archivos);
//separadores de columna
$separador= json_encode(array('coma'=>'coma (,)','punto_coma'=>'punto y coma (;)','tab'=>'tabulación','espacio'=>'espacio'));
$separador2=  json_encode(array('coma'=>44,'punto_coma'=>59,'tab'=>9,'espacio'=>32));
define('SEPARADORES',$separador);
define('SEPARADORES2',$separador2);
//
global $db_link;
if(!($db_link = new PDO('mysql:host='.SERVIDOR.';dbname='.BASE_DATOS.';charset=utf8',USUARIO,PASSWORD)))
{
    echo "No es posible conectar con la base de datos ".$base_datos."<br>";
    return true;
}
function sql_select($query, &$rv)
{
    global $db_link;
    $query=preg_replace("/\r\n|\r/", chr(32), $query);
    if (DEFAULT_CHARSET == "utf8" OR DEFAULT_CHARSET == "utf-8")
    {
        $db_link->query("SET NAMES 'utf8'");
    }
    $rv = $db_link->prepare($query);
    if(!$rv->execute())
    {
        return false;
    }
    if($last_id=$db_link->lastInsertId())
    {
        // para insert
        return $last_id;
    }
    return true;
}
?>