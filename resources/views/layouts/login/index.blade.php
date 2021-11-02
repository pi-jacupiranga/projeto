<form action="login/auth" method="post">
    @csrf

    <input type="email" name="email" id="email" placeholder="Digite o email">
    <input type="password" name="password" id="password" placeholder="Digite a senha">

    <button type="submit">Entrar</button>

</form>