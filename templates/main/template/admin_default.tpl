<div class="col-lg-8">
	<p><h2>{$bentornato_admin}</h2></p>
	<div class="well">
		
        <h3 align="center"><b>Ultime richieste di pubblicazione:</b></h3>

        <hr>
		<br>
			<h4>{$no_pending}</h4>

				<table class="table">
  					<thead class="thead-inverse">
    					<tr>
      						<th>#</th>
      						<th>Artista</th>
      						<th>Id scheda</th>
      						<th>Autore</th>
      						<th>Stato</th>
      						<th>Pubblicazione</th>
    					</tr>
  					</thead>
  					<tbody>
  						{section name=i loop=$pending}
    						<tr>
      							<th scope="row"><a href="index.php?controller=artista&task=visualizza&id={$pending[i].id}">visualizza</a></th>
      								<td>{$pending[i].nome_artista}</td>
									<td>{$pending[i].id}</td>
									<td>{$pending[i].autore}</td>
									<td>{$pending[i].stato}</td>
									<td>
									<a class="btn btn-primary" href="index.php?controller=scheda&task=accettata&id={$pending[i].id}" role="button">Accetta</a>
										
									<a class="btn btn-primary" href="index.php?controller=scheda&task=rifiuta&id={$pending[i].id}" role="button">Rifiuta</a>
									</td>
    						</tr>
    						
    					{/section}
  					</tbody>
				</table>
	</div>
	<div class="well">
		<h3 align="center"><b>Elenco utenti registrati</b><br><br>
		&nbsp;&nbsp;<input align="right" type="submit" class="btn btn-primary" value="Mostra/Nascondi" id="mostrautenti"/>
				<table class="table" id="prova">
  					<thead class="thead-inverse">
    					<tr>
							<th>#</th>
      						<th>Username</th>
      						<th>Nome</th>
      						<th>Cognome</th>
      						<th>Email</th>
    					</tr>
  					</thead>
  					<tbody id="tbody" class="thead-inverse">
  						<div class="overlay" id="overlay">
							<p>Pagine artista di questo utente</p>
							<p id="testo"></p>
							
							<input align="right" type="submit" class="btn btn-primary" value="Chiudi" id="chiudi"/>
						</div>
  					</tbody>
				</table>
        <hr>
		<br>
		
	</div>
</div