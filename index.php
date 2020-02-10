<?php
    session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="https://fonts.googleapis.com/css?family=Anton|Noto+Sans+KR|Roboto+Mono" rel="stylesheet">
		<link rel="shortcut icon" href="img/cadeado.png" type="image/x-png/">
		<link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
	</head>

	<body>
		<center>
			<div class="painel">
				<form action="src/login.php" method="post">
					<h1>Login: </h1><input class="caixa" name="user" type="text">
					<h1>Senha: </h1><input class="caixa" name="pass" type="password"><br><br>
					<input class="btn" value="Entrar" type="submit">
				</form>
			</div>
		</center>
		<script>
			const queryString = window.location.search;
			if(queryString == "?failedLogin"){
				const div = document.querySelector("div")
				let texto = document.createElement("h2")
				texto.setAttribute('class','teste')
				texto.innerHTML = 'Usuário ou Senha Incorretos!'
				div.appendChild(texto)
			}
			if(queryString == "?verificacao"){
				const div = document.querySelector("div")
				let texto = document.createElement("h2")
				texto.setAttribute('class','teste')
				texto.innerHTML = 'Preencha todos os campos!'
				div.appendChild(texto)
			}
		</script>
	</body>
</html>