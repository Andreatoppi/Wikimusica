<?php /* Smarty version 2.6.26, created on 2016-10-21 17:53:57
         compiled from artista_creazione.tpl */ ?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<div class="well">        
<a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          &emsp;&emsp;&emsp;&emsp;<h1 class="contact"><b>Creazione scheda artista:</b></h1>
          <div class="contactform">
            <form method="post" action="index.php">
              <fieldset>
				<br>
				<br>
				   <input type="file" name="foto" />
				   <br>
            	<p><label for="nome:" class="left">Nome:</label>
                   &emsp;&emsp;&ensp;&ensp;<input type="text" name="nome_artista" id="nome_artista" class="field" tabindex="7"></p> 
                  
				   
            	<p><label for="Genere:" class="left">Genere:
				&emsp;&emsp;&ensp;<select  name="genere" id="genere">
					<option value="rock">Rock</option>
					<option value="pop">Pop</option>
					<option value="classica">Classica</option>
					<option value="metal">Metal</option>
				</select>
					</label>
                   
              </fieldset>
			  
			   
              <fieldset>                   
						<p><label for="descrizione" class="left">Descrizione:</label>
                 <div class="box">
                <div class="txt">
						
						<textarea name="descrizione" wrap="off" class="code" rows=10 cols=88>

						</textarea>
						</div>
                   </div>
                   	               
                <input type="hidden" name="controller" value="scheda" />
                <input type="hidden" name="task" value="creazione" />
                <br>

                <p><input type="submit" name="submit" id="submit_1" class="button" value="Invia richiesta di creazione" tabindex="10" /></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>
        </div>