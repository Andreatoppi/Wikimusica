<?php /* Smarty version 2.6.26, created on 2017-11-22 16:56:01
         compiled from admin_default.tpl */ ?>
<div class="col-lg-8">
	<p><h2><?php echo $this->_tpl_vars['bentornato_admin']; ?>
</h2></p>
	<div class="well">
		
        <h3 align="center"><b>Ultime richieste di pubblicazione:</b></h3>

        <hr>
		<br>
			<h4><?php echo $this->_tpl_vars['no_pending']; ?>
</h4>

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
  						<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['pending']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
    						<tr>
      							<th scope="row"><a href="index.php?controller=artista&task=visualizza&id=<?php echo $this->_tpl_vars['pending'][$this->_sections['i']['index']]['id']; ?>
">visualizza</a></th>
      								<td><?php echo $this->_tpl_vars['pending'][$this->_sections['i']['index']]['nome_artista']; ?>
</td>
									<td><?php echo $this->_tpl_vars['pending'][$this->_sections['i']['index']]['id']; ?>
</td>
									<td><?php echo $this->_tpl_vars['pending'][$this->_sections['i']['index']]['autore']; ?>
</td>
									<td><?php echo $this->_tpl_vars['pending'][$this->_sections['i']['index']]['stato']; ?>
</td>
									<td>
									<a class="btn btn-primary" href="index.php?controller=scheda&task=accettata&id=<?php echo $this->_tpl_vars['pending'][$this->_sections['i']['index']]['id']; ?>
" role="button">Accetta</a>
										
									<a class="btn btn-primary" href="index.php?controller=scheda&task=rifiuta&id=<?php echo $this->_tpl_vars['pending'][$this->_sections['i']['index']]['id']; ?>
" role="button">Rifiuta</a>
									</td>
    						</tr>
    						
    					<?php endfor; endif; ?>
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