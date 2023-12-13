<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtém os dados enviados pelo usuário
  $nome = $_POST['txtNome'];
  $email = $_POST['txtEmail'];
  $assunto = $_POST['txtAssunto'];
  $mensagem = $_POST['txtObs'];

  // Valida os dados enviados pelo usuário
  if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
    // Se algum campo estiver vazio, exibe uma mensagem de erro
    echo 'Por favor, preencha todos os campos do formulário.';
  } else {
    // Envia o e-mail
    $para = 'gabrieldeiro2018@gmail.com';
    $cabecalho = "From: $nome <$email>\r\n";
    $cabecalho .= "Reply-To: $email\r\n";
    $cabecalho .= "Content-Type: text/html; charset=utf-8\r\n";
    $mensagem_email = "Assunto: $assunto<br><br>";
    $mensagem_email .= "Mensagem: $mensagem";
    $enviado = mail($para, $assunto, $mensagem_email, $cabecalho);

    // Exibe uma mensagem de confirmação
    if ($enviado) {
      echo 'Obrigado por entrar em contato. Sua mensagem foi enviada com sucesso.';
    } else {
      echo 'Houve um problema ao enviar a mensagem. Por favor, tente novamente mais tarde.';
    }
  }
} else {
  // Se o formulário não foi enviado, redireciona para a página do formulário
  header('Location: index.html');
  exit;
}
?>