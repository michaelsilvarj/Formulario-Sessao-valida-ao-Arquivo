<?php
session_start();

$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); // PROTEÇÃO SITE CONTRA ATAQUES
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_GET, 'idade',FILTER_VALIDATE_INT);

if ($nome && $email) {

    $expiracao = time() + (86400 *30);
    setcookie('nome', $nome, $expiracao);

    echo 'NOME: '.$nome.'<br>';
    echo 'E-MAIL: '.$email.'<br>';
    echo 'IDADE: '.$idade.'<br>';
} else {
    $_SESSION['aviso'] = 'Preencha os itens corretamente';
    header("location: index.php") ;
    exit;
}



