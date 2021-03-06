﻿<?php
	function thumb($foto) {
		$arquivo = "fotos/$foto";	
		if (is_null($foto) || !file_exists($arquivo)){
			return "fotos/indisponivel.png";
		} else {
			return $arquivo;
		} 
	}

	function voltar(){
		return "<a href='index.php'><i class='material-icons'>arrow_back_ios</i></a>";
	}

	function msg_sucesso($m){
		$resp = "<div class='sucesso'><i class='material-icons'>check_circle</i>$m</div>";
		return $resp;
	}

	function msg_aviso($m){
		$resp = "<div class='aviso'><i class='material-icons'>info</i>$m</div>";
		return $resp;
	}

	function msg_erro($m){
		$resp = "<div class='erro'><i class='material-icons'>error</i>$m</div>";
		return $resp;
	}
