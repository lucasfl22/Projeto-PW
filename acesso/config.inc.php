<?php

$conexao = mysqli_connect("localhost:3306", "root", "", "bd_livraria");

$bd = mysqli_select_db($conexao,"bd_livraria");