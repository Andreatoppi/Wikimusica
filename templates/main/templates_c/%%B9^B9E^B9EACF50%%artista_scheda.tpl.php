<?php /* Smarty version 2.6.26, created on 2016-11-04 19:32:18
         compiled from artista_scheda.tpl */ ?>
 <div class="col-lg-8">

 <div class="well">
 	<p hidden><?php echo $this->_tpl_vars['id']; ?>
</p>     
        <table>
        	<tr>
        		<legend>&nbsp;Hai cercato...</legend>
        		
        	</tr>
			<tr>
				<h4><?php echo $this->_tpl_vars['nome_artista']; ?>
</h4>
				<br>
				
			</tr>
			<tr>
					<b>Genere: </b> <br><?php echo $this->_tpl_vars['genere']; ?>

			</tr>
			<tr>
				<br>
				<br>
					<b>Descrizione: </b> <br><?php echo $this->_tpl_vars['descrizione']; ?>

			</tr>
		</table>
		<br>
	<a class="btn-group hidden-xs" href="index.php" role="button"><?php echo $this->_tpl_vars['torna_indietro']; ?>
 </a><br>
	<a class="btn-group hidden-xs" href="index.php?controller=scheda&task=modifica&id=<?php echo $this->_tpl_vars['id']; ?>
" role="button"><?php echo $this->_tpl_vars['applica_modifica']; ?>
</a>					
		
</div>
</div>