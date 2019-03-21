<?php /* Smarty version 2.6.26, created on 2016-10-11 19:40:58
         compiled from login.tpl */ ?>
<div class="login">
                <h4>Login - Registrati</h4>
						<form method="post">
							Username: <input name="username"><br><br>
							Password: <input name="password"><br><br>
							<input type="hidden" name="controller" value="login" />
							<input type="hidden" name="task" value="autentica" />
							<input type="submit" class="button" value="Login" />
							<a href="index.php?controller=registrazione&task=modulo">Non sono registrato</a>
						</form>
					</div>