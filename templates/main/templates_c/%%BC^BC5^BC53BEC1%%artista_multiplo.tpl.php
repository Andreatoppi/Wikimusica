<?php /* Smarty version 2.6.26, created on 2016-11-06 13:33:58
         compiled from artista_multiplo.tpl */ ?>
 <div class="col-lg-8">

 <div class="well">
 	<table class="table">
  					<thead class="thead-inverse">
    					<tr>
      						<th>Forse cercavi...</th>
    					</tr>
  					</thead>

  					<tbody>
  						<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['artisti']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<td><a href="index.php?controller=artista&task=ricercabis&nome_artista=<?php echo $this->_tpl_vars['artisti'][$this->_sections['i']['index']]['nome_artista']; ?>
"><?php echo $this->_tpl_vars['artisti'][$this->_sections['i']['index']]['nome_artista']; ?>
</a></td>
							</tr>
    						
    					<?php endfor; endif; ?>
  					</tbody>
	</table>			
		
</div>
</div>