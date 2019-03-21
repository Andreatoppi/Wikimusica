 <div class="col-lg-8">

 <div class="well">
 	<p hidden>{$id}</p>     
        <table>
        	<tr>
        		<legend>&nbsp;Hai cercato...</legend>
        		
        	</tr>
			<tr>
				<h4>{$nome_artista}</h4>
				<br>
				
			</tr>
			<tr>
					<b>Genere: </b> <br>{$genere}
			</tr>
			<tr>
				<br>
				<br>
					<b>Descrizione: </b> <br>{$descrizione}
			</tr>
		</table>
		<br>
	<a class="btn-group hidden-xs" href="index.php" role="button">{$torna_indietro} </a><br>
	<a class="btn-group hidden-xs" href="index.php?controller=scheda&task=modifica&id={$id}" role="button">{$applica_modifica}</a>					
		
</div>
</div>
