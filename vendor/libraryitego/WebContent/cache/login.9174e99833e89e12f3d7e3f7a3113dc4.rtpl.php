<?php if(!class_exists('Rain\Tpl')){exit;}?>   <!-- <link rel="icon" href="/../../../../favicon.ico"> -->
   <link href="/vendor/libraryitego/WebContent/view/bootstrap/css/login.css" rel="stylesheet">
  <body class="text-center">
    <div class="container">
    <div class="tamanho">
    <form class="form-signin" method="post" action="/login">
      <img class="mb-4 imagem" src="/vendor/libraryitego/WebContent/view/img/biblioteca.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Faça seu Login</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
      <label>Esqueceu sua senha ou ela foi alterada sem sua permissão?
      <a href="/crud/alter/usuario/senha/email/forget">Clique aqui!</a>
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>
  </div>
  </div>
  </body>

