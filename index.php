<!DOCTYPE html>
<html>  
<link rel="stylesheet" type="text/css" href="estilo.css">
  <head>  
    <title>Formulário</title>  
  </head>  
<body>  
  <form method="POST" action="POST">  
    <label>Login: </label><input type="text" name="login" id="emailTxt"><br>  
    <label>Senha: </label><input type="password" name="senha" id="senhaTxt"><br>  
    <input type="submit" value="Entrar"  name="login" id="loginBtn"/>  
    <input type="button" value="Cancelar" class="cancel"/>
  </form>  
</body>  
<script src="view/JS/jquery-3.6.0.min.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#loginBtn').on('click', async function(e) {
      e.preventDefault();
      const config = {
        method: "post",
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          emailView: $('#emailTxt').val(),
          senhaView: $('#senhaTxt').val()
        })
      };  
        const request = await fetch('controllers/logar.php', config);
        const response = await request.json();
        if (response.status == 1){
          alert("Usuario Encontrado")
        }
        else{
          alert("Dados Incorretos!")
        }
    });
  });
</script>
</html>  
