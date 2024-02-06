<?php


include '../conectarbanco.php';

$conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

try {
    date_default_timezone_set('America/Sao_Paulo'); // Define o fuso horÃ¡rio para BrasÃ­lia
    
    $agora = new DateTime();
    $agora->sub(new DateInterval('PT30M')); // Subtrai 30 minutos
    
    $duasHorasAtras = $agora->format('Y-m-d H:i:s');
    

    
    $query = "DELETE FROM appconfig
                WHERE saldo = 0
                AND saldo_cpa = ''
                AND data_cadastro <= ?";

    
    $statement = $conn->prepare($query);

    
    $statement->bind_param('s', $duasHorasAtras);

    
    $statement->execute();

   
    echo "Registros deletados com sucesso.";

} catch (Exception $e) {
    
    echo "Erro de banco de dados: " . $e->getMessage();
} finally {
    
    $conn->close();
}

?>