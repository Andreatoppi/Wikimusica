<div class="col-lg-7">
	<div class="well">

        <h3><p align="center"><b>Ecco le tue schede personali:</b></h3></p>

        <hr>

			<h4>{$no_schede}</h4>
		
		<br>
		<br>
				<table class="table">
  					<thead class="thead-inverse">
    					<tr>
      						<th>#</th>
      						<th>Artista</th>
      						<th>Id scheda</th>
      						<th>Stato</th>
      						<th>Stato pubblicazione</th>
    					</tr>
  					</thead>
  					<tbody>
  						{section name=i loop=$schede}
    						<tr>
      							<th scope="row"><a href="index.php?controller=scheda&task=modifica&id={$schede[i].id}">Modifica</a></th>
      								<td>{$schede[i].nome_artista}</td>
									<td>{$schede[i].id}</td>
									<td>{$schede[i].stato}</td>
									<td>{$schede[i].stato_pubblicazione}</td>
									
    						</tr>

    					{/section}
  					</tbody>
				</table>
	</div>
</div>