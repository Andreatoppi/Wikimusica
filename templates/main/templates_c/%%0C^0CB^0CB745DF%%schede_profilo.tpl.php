<?php /* Smarty version 2.6.26, created on 2016-11-02 17:34:30
         compiled from schede_profilo.tpl */ ?>
<div class="col-lg-8">
	<div class="well">
		
        <h3>Le tue schede:</h3>

        <hr>

			<h4><?php echo $this->_tpl_vars['no_schede']; ?>
</h4>

				<table class="table">
  					<thead class="thead-inverse">
    					<tr>
      						<th>#</th>
      						<th>Artista</th>
      						<th>Id scheda</th>
      						<th>Stato</th>
      						<th>Stato pubblicazione</th>
      						<th>Data</th>
      						<th>Elimina</th>
    					</tr>
  					</thead>
  					<tbody>
  						<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['schede']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      							<th scope="row"><a href="index.php?controller=scheda&task=modifica&id=<?php echo $this->_tpl_vars['schede'][$this->_sections['i']['index']]['id']; ?>
">Modifica</a></th>
      								<td><?php echo $this->_tpl_vars['schede'][$this->_sections['i']['index']]['nome_artista']; ?>
</td>
									<td><?php echo $this->_tpl_vars['schede'][$this->_sections['i']['index']]['id']; ?>
</td>
									<td><?php echo $this->_tpl_vars['schede'][$this->_sections['i']['index']]['stato']; ?>
</td>
									<td><?php echo $this->_tpl_vars['schede'][$this->_sections['i']['index']]['stato_pubblicazione']; ?>
</td>
									<td><?php echo $this->_tpl_vars['schede'][$this->_sections['i']['index']]['data']; ?>
</td>
									<td>
									<a class="btn btn-primary" href="index.php?controller=scheda&task=cancella&id=<?php echo $this->_tpl_vars['schede'][$this->_sections['i']['index']]['id']; ?>
" role="button">Cancella</a>
									</td>
    						</tr>
    						
    					<?php endfor; endif; ?>
  					</tbody>
				</table>
				
				<hr>
        		<h3>Cestino:</h3>

        		<hr>

			<h4><?php echo $this->_tpl_vars['no_schede_d']; ?>
</h4>
				<table class="table">
  					<thead class="thead-inverse">
    					<tr>
      						<th>#</th>
      						<th>Artista</th>
      						<th>Id scheda</th>
      						<th>Stato</th>
      						<th>Stato pubblicazione</th>
      						<th>Data</th>
    					</tr>
  					</thead>
  					<tbody>
  						<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['schede_d']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      							<th scope="row"><a href="index.php?controller=scheda&task=modifica&id=<?php echo $this->_tpl_vars['schede_d'][$this->_sections['i']['index']]['id']; ?>
">Modifica</a></th>
      								<td><?php echo $this->_tpl_vars['schede_d'][$this->_sections['i']['index']]['nome_artista']; ?>
</td>
									<td><?php echo $this->_tpl_vars['schede_d'][$this->_sections['i']['index']]['id']; ?>
</td>
									<td><?php echo $this->_tpl_vars['schede_d'][$this->_sections['i']['index']]['stato']; ?>
</td>
									<td><?php echo $this->_tpl_vars['schede_d'][$this->_sections['i']['index']]['stato_pubblicazione']; ?>
</td>
									<td><?php echo $this->_tpl_vars['schede_d'][$this->_sections['i']['index']]['data']; ?>
</td>
    						</tr>
    						
    					<?php endfor; endif; ?>
  					</tbody>
				</table>
	</div>
</div>