<?php
  // SEU CÓDIGO PHP AQUI

  function input_test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = input_test($_POST["nome"]);
    $email = input_test($_POST["email"]);
    $nomeErr = $emailErr = "";

    if (empty($nome)) {
        $nomeErr = "O campo do nome é obrigatório.";
    }

    if (empty($email)) {
        $emailErr = "O campo do email é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato de email inválido.";
    }

    if (!empty($nomeErr)) {
        echo "Erro no campo do nome: " . $nomeErr;
    }

    if (!empty($emailErr)) {
        echo "<br>Erro no campo do email: " . $emailErr;
    }


    if (empty($nomeErr) && empty($emailErr)) {
        echo "Dados recebidos:<br>";
        echo "Nome: " . $nome . "<br>";
        echo "Email: " . $email . "<br>";
    }
} else {
    echo "Erro!";
}
?>