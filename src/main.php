<?php

require_once(__DIR__."/../vendor/autoload.php");

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\Model\bandas;

$a = new bandas();

$logger = new Logger('aprendendoPDO');
$logger->pushHandler(new StreamHandler(__DIR__.'/app.log',Logger::DEBUG));
$logger->info("Meu primeiro log de verdade... profissional hein...");

$db_host ='localhost';
$db_name ='bandasderockdb';
$db_user ='root';
$db_password ='';

function get_connection()
{
    global $db_host, $db_name, $db_user, $db_password;

    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
    $connection = new \PDO($dsn, $db_user, $db_password);
    $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    return $connection;
}

$c = get_connection();

$query = "SELECT * FROM bandas";
$statement = $c->prepare($query);
$statement->execute();
$result = $statement->fetchAll(\PDO::FETCH_ASSOC);

if (!empty($result)) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>Gênero</th>";
    echo "<th>Ano de Formação</th>";
    echo "<th>País de Origem</th>";
    echo "</tr>";

    foreach ($result as $dados) {
        echo "<tr>";
        echo "<td style='text-align: center;'>" . $dados['ID'] . "</td>";
        echo "<td style='text-align: center;'>" . $dados['Nome'] . "</td>";
        echo "<td style='text-align: center;'>" . $dados['Genero'] . "</td>";
        echo "<td style='text-align: center;'>" . $dados['AnoFormacao'] . "</td>";
        echo "<td style='text-align: center;'>" . $dados['PaisOrigem'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum dado encontrado.";
}


?>