<script type="text/javascript">
	$(function(){
		$('.table-data').DataTable({
			"language": {
				"url": "/toponimicos/files/Portuguese.json"
			},
			"order": [[ 1, "asc" ]]
		});
	});
</script>
<style type="text/css">
	table {
		border-collapse: collapse;
	}

	table, th, td {

	}
</style>
<?php 
	echo $this->element('bar/bar-top', array('title' => 'Atlas Toponímicos'));
?>
<a style="float:right;margin-right:50px;margin-top:-60px;" href=<?php echo Router::url('/toponimicos/novo')?>><button id="btnSalvar"><span>Cadastrar</span></button></a>
<?php
	echo $this->Session->flash(); 
	if ($tipos != null) {
?> 
		<!-- upper section -->
		<div class="row" 
			 style="margin-left: 15px; 
			 		margin-right: 15px;">
			<div class="col-md-12">      
				<div class="row">	
					<table cellpadding="0" 
						   cellspacing="0" 
						   class="table table-hover table-data">
						<thead>
							<tr>
								<th width="5%">Código</th>
								<th width="25%">Municipio</th>
								<th width="30%">Localização</th>
								<th width="5%">UF</th>
								<th width="25%">Taxionomia</th>
								<th width="10%" class="actions"><center>Ações</center></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($tipos as $tipo): ?>
							<tr>
								<td><center><?php echo h($tipo['Toponimico']['id']); ?></center></td>
								<td><?php echo h($tipo['Municipio']['nome']); ?></td>
								<td><?php echo h($tipo['Municipio']['localizacao']); ?></td>
								<td><?php echo h($tipo['Municipio']['uf']); ?></td>
								<td><?php echo h($tipo['Toponimico']['taxionomia']); ?></td>
								<td class="actions">
									<center>								
										<?php 									
											echo $this->Html->link('<i class="fa fa-search fa-lg" style="color: #000;" title="Visualizar Registro"></i>', array('action' => 'visualizar', $tipo['Toponimico']['id']), array('escape' => false));	
											echo "<span style='margin-left:5px;'></span>";
											echo $this->Html->link('<i class="fa fa-pencil fa-lg" style="color: #000;" title="Editar Registro"></i>', array('action' => 'editar', $tipo['Toponimico']['id']), array('escape' => false));	
											echo "<span style='margin-left:5px;'></span>";
											echo $this->Form->postLink('<i class="fa fa-trash fa-lg" style="color: #000;" title="Deletar Registro"></i>', array('action' => 'deletar', $tipo['Toponimico']['id']), array('escape' => false, 'confirm' => 'Você tem certeza que deseja excluir este registro?'),null, $tipo['Toponimico']['id']);	
										?>
									</center>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div><!--/row-->
			</div><!--/col-span-9-->
		</div><!--/row-->
<?php
	}
?>