<?php
class baseDataRespaldo
{
    public function conexionRespaldo()
    {


        $dbhost = 'localhost';
        $dbname = '100';
        $dbuser = 'root';
        $dbpass = '';
        try {
            // Conexión a la base de datos utilizando PDO
            $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Nombre del archivo de respaldo
            $fechaBd = date("Ymd-His");
            $salidaSql = $dbname . '_' . $fechaBd . '.sql';

            // Comando para crear el respaldo de la base de datos
            $command = "mysqldump -h$dbhost -u$dbuser -p$dbpass --opt $dbname > $salidaSql";

            // Ejecutar el comando utilizando exec()
            exec($command, $output, $returnVar);

            $zip = new zipArchive();

            $salidaZip = $dbname . '_' . $fechaBd . '.zip';

            if($zip->open($salidaZip, ZIPARCHIVE::CREATE) === true)

            {
                $zip->addFile($salidaSql);
                $zip->close();

                unlink($salidaSql);

                return true;

            }else{

                return false;
            
            }
            
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}
