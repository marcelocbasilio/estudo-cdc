<?php
if(($this->router->class == 'Institucional') && ($this->router->method == 'index')) {
?>
	<ul class="nav masthead-nav">
<?php } else {?>
	<ul class="nav navbar-nav"> 
<?php } ?>
	
	<li class="<?php echo (($this->router->class== 'Institucional') && ($this->router->method == 'index')) ? 'active' : null;?>">
		<a href="<?=base_url()?>">Home</a>
	</li>
	<li class="<?=(($this->router->class == 'Empresa') && ($this->router->method == 'index')) ? 'active' : null;?>">
		<a href="<?=base_url('empresa')?>">A Empresa</a>
	</li>
	<li class="<?=(($this->router->class == 'Servicos') && ($this->router->method == 'index')) ? 'active' : null;?>">
		<a href="<?=base_url('servicos')?>">Serviços</a>
	</li>
	<li class="<?=(($this->router->class == 'Contato') && ($this->router->method == 'TrabalheConosco')) ? 'active' : null;?>">
		<a href="<?=base_url('trabalhe-conosco')?>">Trabalhe Conosco</a>
	</li>
	<li class="<?=(($this->router->class == 'Contato') && ($this->router->method == 'FaleConosco')) ? 'active' : null;?>">
		<a href="<?=base_url('fale-conosco')?>">Fale Conosco</a>
	</li>
	
</ul>