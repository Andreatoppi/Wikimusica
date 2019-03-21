<?php /* Smarty version 2.6.26, created on 2016-10-21 17:55:39
         compiled from artista_modifica.tpl */ ?>
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
				   <input type="file" name="foto" value="<?php echo $this->_tpl_vars['foto']; ?>
" />
				   <br>
            	<p><label for="nome:" class="left">Nome:</label>
                   &emsp;&emsp;&ensp;&ensp;<input type="text" name="nome_artista" value="<?php echo $this->_tpl_vars['nome_artista']; ?>
" id="nome_artista" class="field" tabindex="7"></p> 
                  
				   <p><label for="genere:" class="left">Genere:</label>
                   &emsp;&emsp;&ensp;&ensp;<input type="text" name="genere" value="<?php echo $this->_tpl_vars['genere']; ?>
" id="genere" class="field" tabindex="8"></p> 
              </fieldset>
			  
			   
              <fieldset>                   
						<p><label for="descrizione" class="left">Descrizione:</label>
                 <div class="box">
                <div class="txt">
						
						<textarea name="descrizione" value=""  class="code" rows=10 cols=88>
								<?php echo $this->_tpl_vars['descrizione']; ?>

						</textarea>
						</div>
                   </div>
                   	               
                <input type="hidden" name="controller" value="scheda" />
                <input type="hidden" name="task" value="salva" />
                <br>

                <p><input type="submit" name="submit" id="submit_1" class="button" value="Invia richiesta di pubblicazione" tabindex="10" /></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>
        </div>