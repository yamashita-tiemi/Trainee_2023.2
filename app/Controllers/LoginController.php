<?php

namespace App\Controllers;

use App\Core\App;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/phpmailer/PHPMailer/src/PHPMailer.php';
// require 'vendor/phpmailer/PHPMailer/src/Exception.php';
require 'vendor/phpmailer/PHPMailer/src/SMTP.php';

class LoginController
{

    public function view()
    {
        session_start();
        return view('site/login');
    }

    public function admin()
    {
        return view('admin/dashboard');
    }


    public function autentica()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = App::get('database')->autenticar('users', $email, $password);
        
        session_start();

        if($id > 0)
        {
            $_SESSION['logado'] = $id;
            return redirect('admin');
        }

        $_SESSION['error_message'] = "E-mail ou senha incorretos";
        return redirect('admin/login');
    }


    public function logout()
    {
        session_start();
        unset($_SESSION['logado']);
        session_destroy();
        return redirect('admin/login');
    }


    public function senha(){
        $token = bin2hex(random_bytes(32));

        // Armazenar o token no banco de dados associado ao e-mail do usuário
        // Supondo que você tenha uma tabela "users" com colunas "id", "email", "password", e "reset_token"
        // e que você esteja utilizando PDO para interagir com o banco de dados
        $users = App::get('database')->selectAll('users');
        $email = $_POST['email'];

        App::get('database')->senha('users', $token, $email);

        // Enviar e-mail com o link de recuperação
        $reset_link = "localhost:8080/reset_password..view.php?token=$token";


        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '84073154ale@gmail.com';
            $mail->Password = 'birimbal';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configurações do e-mail
            $mail->setFrom('84073154ale@gmail.com', 'Áurea');
            $mail->addAddress($email);
            $mail->Subject = 'Recuperação de Senha';
            $mail->Body = "Clique no link para redefinir sua senha: $reset_link";

        } catch (Exception $e) {
            // Erro no envio
            echo "Erro no envio do e-mail: {$mail->ErrorInfo}";
        }

        // Enviar e-mail
        $mail->SMTPDebug = 2;

        $mail->send();

        // Sucesso
        echo 'E-mail enviado com sucesso!';

        // ini_set("SMTP", "smtp.gmail.com");
        // ini_set("smtp_port", "587");
        // ini_set("sendmail_from", "84073154alex@gmail.com");
        // ini_set("auth_username", "84073154alex@gmail.com");
        // ini_set("auth_password", "birimbal");
        // mail($email, 'Recuperação de Senha', "Clique no link para redefinir sua senha: $reset_link");

        // Redirecionar ou exibir mensagem de sucesso
        // return view("admin/reset_password", compact('token'));
    }

    public function pass(){
        $token = $_POST['token'];

        // Verificar se o token é válido
        $user = App::get('database')->pass('users', $token);
        // $users = compact($users);

        if (!$user) {
            // Token inválido ou expirado
            header('Location: token_invalido.php');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Processar o formulário de redefinição de senha
            $new_password = $_POST['new_password'];
            // $user = pass('users', $token);

            // Atualizar a senha no banco de dados
            // $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
            App::get('database')->redef($new_password, $user);

            // $users = App::get('database')->selectAll('users');

            // echo extract($users);
            // die;
            return redirect('admin/login');
        }
    }


}

?>