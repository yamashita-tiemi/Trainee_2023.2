<?php

namespace App\Controllers;
namespace App\Core\Database;

use PDO, Exception;

use App\Controllers\LoginController;

use App\Core\App;

?>

<!-- Formulário de redefinição de senha -->
<form action="/pass" method="post">
    <input name="token" value="<?=$token?>" hidden>
    <label for="new_password">Nova Senha:</label>
    <input type="password" name="new_password" required>
    <button type="submit">Redefinir Senha</button>
</form>
