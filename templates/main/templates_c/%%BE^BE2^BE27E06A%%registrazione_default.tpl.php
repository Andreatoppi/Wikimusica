<?php /* Smarty version 2.6.26, created on 2017-11-13 18:12:01
         compiled from registrazione_default.tpl */ ?>
<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="well">
		<a id="anchor-contact-1"></a>
			<div class="corner-content-1col-top"></div>        
			<div class="content-1col-nobox">
				<b><h1 class="contact" align="center"><b>Modulo registrazione utente :</b></h1></b>
				<hr>
				<div class="contactform">
					<form method="post" action="index.php" id="formreg">				              
				              <fieldset><legend align="center"><b>&nbsp;Dettagli anagrafici:&nbsp;</b></legend>
<table>
	<tr><td width=130px><p><label for="nome" class="left">Nome:</label></td><td width=130px><input type="text" name="nome" id="nome" class="field" value="" tabindex="8" required/></p></td></tr>
	<tr><td width=130px><p><label for="cognome" class="left">Cognome:</label></td><td width=130px><input type="text" name="cognome" id="cognome" class="field" value="" tabindex="9" required/></p></td></tr>
</table>
<br>
<br>
				               </fieldset>

				               <fieldset><legend align="center"><b>&nbsp;Credenziali di accesso:&nbsp;</b></legend>
				               <br>
<table>
	<tr><td width=130px><p><label for="username" class="left">Username:</label></td><td width=130px><input type="text" name="username" id="username" class="field" value="" tabindex="5" required/></p></td><td width=130px><p><span id="check_username"></span></p></td></tr>
	<tr><td width=130px><p><label for="password" class="left">Password:</label></td><td width=130px><input type="password" name="password" id="password" class="field" value="" tabindex="6" required/></p></td><td width=130px></td></tr>
	<tr><td width=130px><p><label for="ripetipassword" class="left">Ripeti password:</label></td><td width=130px><input type="password" name="ripetipassword" id="ripetipassword" class="field" value="" tabindex="6" required/></p></td><td width=300px><p><span id="check_password"></span></p></td></tr>
	<tr><td width=130px><p><label for="email" class="left">Email:</label></td><td width=130px><input type="text" name="email" id="email" class="field" value="" tabindex="7" required/></p></td><td width=130px><p><span id="check_email"></span></p></td></tr>



</table>
	<input type="hidden" name="controller" value="registrazione" />
	<input type="hidden" name="task" value="autentica" />
	<p align="right"><input type="submit" name="submit" id="submit" class="button" value="Registrati" tabindex="200" align="right"/></p>
				              </fieldset>
				        </form>
				</div>
			</div>
		<div class="corner-content-1col-bottom"></div>
		</div>
		</div>