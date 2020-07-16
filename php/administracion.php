<?php
	include 'configuracion.php';
	extract($_GET);
?>
<!-- JQUERY -->
<script type="text/javascript" src="<?php echo _ROOT; ?>js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo _ROOT; ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo _ROOT; ?>js/jquery.form.js"></script>

	
<form method="post" id="FormBolsa" class="FormBolsa">
	<input type="text" name="nombre" placeholder="Nombre:" autocomplete="name" required>
	<div class="clear10"></div>
	<input type="tel" name="telefono" placeholder="Teléfono:" autocomplete="tel">
	<div class="clear10"></div>
	<input type="email" name="correo" placeholder="Correo Electrónico:" autocomplete="email" required>
	<div class="clear10"></div>
	<label>Adjunta tu CV (máx. 4MB):</label>
	<input type="file" name="file" required>
	<div class="clear10"></div>
	<input type="submit" value="Enviar" id="SubmitBolsa">
	<div class="clear"></div>
</form>
<script>
$(document).ready(function() {
	
	var dominio = 'https://desarrollo.prognosis.mx/plastictrends/';
    //FORMULARIO CURRICULUM
    $('#FormBolsa').validate();
    
    $('#SubmitBolsa').on("click", function(e){
        var formData = new FormData($("#FormBolsa")[0]);        

        $('#FormBolsa').ajaxForm({
            beforeSubmit: function(){
                $('#SubmitBolsa').attr('disabled','disabled');
                return true;
            },
            success:function(){
                $.ajax({
                    type: "POST",
                    url: dominio + "php/valida_bolsa.php",
                    data: formData,
                    success: function(data){
                        console.log(data);
						if(data == 'alta_registro'){
							swal("Bien hecho!", "Mensaje enviado Correctamente!!", "success");
							$("#FormBolsa")[0].reset();
							$('body').removeClass('fixed');
							$('.Bolsa').fadeOut('slow');
							$('.Overlay').fadeOut('slow');
							$("#AbrirBolsa").empty();
							$('#AbrirBolsa').removeClass('activo');
						}else{
							swal("Ooops!", "Por favor revisa los campos de nuevo!!", "warning");
						}
                        $('#SubmitBolsa').removeAttr('disabled');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            }
        })
    });	
});
</script>