<div class="container">
	
	<div class="page-header">
		<h1>Trabalhe Conosco</h1>
	</div> <!--./page-header-->

	<div class="row">
		<div class="col-md-8">

			<?php if($formErrors){ ?>
			<div class="alert alert-danger">
				<?php echo $formErrors;?>
			</div> <!--./alert alert-danger-->
			<?php } else { ?>
				<?php if($this->session->flashdata('success-msg')) { ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('success-msg');?>
				</div> <!--./alert alert-success-->
			<?php }}?>

			<?php echo form_open_multipart(base_url('trabalhe-conosco'), array("class"=>"form-horizontal", "method"=>"POST")); ?>
				
				<div class="form-group">
					<?php
						$atl_nome = array("class" => "col-md-2 control-label");
						echo form_label('Nome','nome', $atl_nome);
					?>
					<div class="col-md-8">
						<?php
						echo form_input(
							array("name"=>"nome","id"=>"nome"),
							set_value('nome'),
							array("class"=>"form-control input-md","required"=>"","type"=>"text","placeholder"=>"Nome")
						);
						?>	
					</div> <!--./col-md-8-->
				</div> <!--./form-group-->

				<div class="form-group">
					<?php
						$atl_email = array("class" => "col-md-2 control-label");
						echo form_label('E-mail','email', $atl_email);
					?>
					<div class="col-md-8">
						<?php
						echo form_input(
							array("name"=>"email","id"=>"email"),
							set_value('email'),
							array("class"=>"form-control input-md","required"=>"","type"=>"text","placeholder"=>"E-mail")
						);
						?>
						<span class="help-block">Ex.: email@example.com</span>
					</div> <!--./col-md-8-->
				</div> <!--./form-group-->

				<div class="form-group">
					<?php
						$atl_telefone = array("class" => "col-md-2 control-label");
						echo form_label('Telefone de Contato','telefone', $atl_telefone);
					?>
					<div class="col-md-8">
						<?php
						echo form_input(
							array("name"=>"telefone","id"=>"telefone"),
							set_value('telefone'),
							array("class"=>"form-control input-md","required"=>"","type"=>"text","placeholder"=>"Telefone de Contato")
						);
						?>	
					</div> <!--./col-md-8-->
				</div> <!--./form-group-->

				<div class="form-group">
					<?php
						$atl_mensagem = array("class" => "col-md-2 control-label");
						echo form_label('Mensagem','mensagem', $atl_mensagem);
					?>
					<div class="col-md-8">
						<?php
						echo form_textarea(
							array("name"=>"mensagem","id"=>"mensagem", "rows" => "10"),
							set_value('mensagem'),
							array("class"=>"form-control input-md","required"=>"","type"=>"text","placeholder"=>"Mensagem")
						);
						?>	
					</div> <!--./col-md-8-->
				</div> <!--./form-group-->

				<div class="form-group">
					<?php
						$atl_curriculo = array("class" => "col-md-2 control-label");
						echo form_label('Currículo','curriculo', $atl_curriculo);
					?>
					<div class="col-md-8">
						<?php
						echo form_upload(
							array("name"=>"curriculo","id"=>"curriculo"),
							set_value('curriculo'),
							array("class"=>"input-file form-control input-md","required"=>"","type"=>"text")
						);
						?>
						<abbr title="(doc|docx|pdf|zip|rar / 5120Kb)"><span class="help-block">(Arq. Aceitos / Tam. Máximo)</span></abbr>
					</div> <!--./col-md-8-->
				</div> <!--./form-group-->

				<div class="form-group">
					<div class="col-md-10">
						<?php 
						echo form_submit(
							array("name"=>"Enviar","id"=>"enviar"),
							"Enviar",
							array("class"=>"btn	btn-default	pull-right")
						);	
						?>
					</div> <!--./col-md-8-->
				</div> <!--./form-group-->

			<?=form_close(); ?>
		</div> <!--./col-md-8-->

		<div class="col-md-4">
			<h4>Telefones</h4>
			<p>+55 99 99999-9999 | +55 88 98888-8888</p>
			<hr>
			<h4>E-mail</h4>
			<p>contato@empresa.com.br</p>
			<hr>
			<h4>Endereço</h4>
			<p>Rua Quinze de Novembro - Praia da Costa, Vila Velha - ES</p>
			<hr>
			<div class="embed-responsive embed-responsive-4by3">
				<iframe	src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.1532158870327!2d-40.286650485399!3d-20.335288186378026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb8163812c6b305%3A0xe71db7e3d9c94285!2sR.+Quinze+de+Novembro+-+Praia+da+Costa%2C+Vila+Velha+-+ES!5e0!3m2!1spt-BR!2sbr!4v1449523768427" width="600"	height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div> <!--./embed-responsive embed-responsive-4by3-->
		</div> <!--./col-md-4-->

	</div> <!--./row-->