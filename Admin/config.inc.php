<?php 
// Conexão com servidor MySQL
$conn = mysqli_connect("127.0.0.1","root","");
// Conexão com o banco MySQL chamado bd_biblioteca
$db = mysqli_select_db($conn,"bd_biblioteca");

if($conn){
    echo "Conexão estabelecida com sucesso";
}else{
    echo "Erro na conexão com banco de dados.";
}
?>