var className = document.getElementsByClassName("accordion");
	for (var i = 0; i < className.length; i++) {
		className[i].addEventListener("click", function() {
		 this.classList.toggle("active");
		 var body = this.nextElementSibling;
		 if (body.style.maxHeight){
		   body.style.maxHeight = null;
		 } else {
		   body.style.maxHeight = body.scrollHeight + "px";
		 } 
	});
}

var excluir = (link)=>{
	$(function () {
		$("#messagem").dialog({
			buttons: {
				"Excluir": function () {
					 window.location.href = link;
				},
				"Cancelar": function () {
					 $(this).dialog("close");
				}
			}
		});
	});
};

$('#abrir').click(()=>{
	$('#nav').toggle("fadding");
});

// Mascaras

 $('#cel_responsavel').mask('(99) 99999-9999');
 $('#cpf_responsavel').mask('000.000.000-00', {reverse: true});
 $('#cpf_atleta').mask('000.000.000-00', {reverse: true});
 $('#rg_atleta').mask('0.000.000', {reverse: true});
 $('#rg_responsavel').mask('0.000.000', {reverse: true});


var form_idade = (option)=>{
	if(option == 'faixaetária de idade'){
		document.querySelector('#form_filter').style.display = 'none';
		document.querySelector('#form_filter_idade').style.display = 'block';
	}
}