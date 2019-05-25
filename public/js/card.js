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