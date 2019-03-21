<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        <div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class=well>
				<h1 class="contact" align="center"><b>Creazione scheda artista:</b></h1>
				<hr>
          <div class="contactform">
            <form method="post" action="index.php?controller=scheda&task=salva">
              <fieldset>
				   <br>
            	<p><label for="nome:" class="left">Nome:</label>
                   &emsp;&emsp;&ensp;<input type="text" name="nome_artista" value="{$nome_artista}" id="nome_artista" class="field" readonly="readonly"></p>          
				   <p><label for="genere:" class="left">Genere:</label>
                   &emsp;&emsp;<input type="text" name="genere" value="{$genere}" id="genere" class="field"></p> 
              </fieldset>
			  <br>
              <fieldset>                   
						<p><label for="descrizione" class="left">Descrizione:</label>
                 <div class="box">
                <div class="txt">
						
						<textarea name="descrizione" value=""  class="code" rows=15 cols=100>
								{$descrizione}
						</textarea>
						</div>
                   </div>					
                <br>

                <p align="center"><input type="submit" name="submit" id="submit_1" class="button" value="Invia richiesta di pubblicazione" tabindex="10" /></p>
               </fieldset>
            </form>
			</div>
		</div>
	<div class="col-lg-2"></div>
        