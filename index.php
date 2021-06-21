<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
?>
	<div class="row">
		<div class="col s12 m6 push-m3">
			<h3 class="light">Clientes</h3>
			<table class="striped">
				<thead>
					<th>Nome:</th>
					<th>Sobrenome:</th>
					<th>Email:</th>
					<th>Idade:</th>
				</thead>
				<tbody>
					<?php 
				$sql = "SELECT * FROM clientes";
				$result = mysqli_query($connect, $sql);

				if(mysqli_num_rows($result)>0):

				while($dados = mysqli_fetch_array($result)):
			?>
						<tr>
							<td>
								<?php echo $dados['nome'];?>
							</td>
							<td>
								<?php echo $dados['sobrenome'];?>
							</td>
							<td>
								<?php echo $dados['email'];?>
							</td>
							<td>
								<?php echo $dados['idade'];?>
							</td>
							<td><a href="editar.php?id=<?php echo $dados['id'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
							<td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
							<!-- Modal Structure -->
							<div id="modal<?php echo $dados['id'];?>" class="modal">
								<div class="modal-content">
									<h2 class="center-align">Tem certeza que deseja excluir?</h2> </div>
								<div class="modal-footer">
									<form action="php_action/delete.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
										<button type="submit" name="btn-deletar" class="btn waves-effect waves-red red btn-flat">Sim, tenho certeza.</button> <a href="#!" class="modal-close waves-effect waves-green btn-flat">Não</a> </form>
								</div>
							</div>
						</tr>
						<?php 
				endwhile;
			else:?>
							<tr>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>
							<?php
endif;
?>
				</tbody>
			</table>
			<br> <a href="add.php" class="btn">Adicionar cliente</a> </div>
	</div>
	<?php
include_once 'includes/footer.php';
?>