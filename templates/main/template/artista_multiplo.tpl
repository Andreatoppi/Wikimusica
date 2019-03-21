 <div class="col-lg-8">

 <div class="well">
 	<table class="table">
  					<thead class="thead-inverse">
    					<tr>
      						<th>Forse cercavi...</th>
    					</tr>
  					</thead>

  					<tbody>
  						{section name=i loop=$artisti}
    						<tr>
								<td><a href="index.php?controller=artista&task=ricercabis&nome_artista={$artisti[i].nome_artista}">{$artisti[i].nome_artista}</a></td>
							</tr>
    						
    					{/section}
  					</tbody>
	</table>			
		
</div>
</div>
