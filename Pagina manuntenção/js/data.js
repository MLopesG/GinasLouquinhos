
setInterval(()=>{
	let data = new Date();
	let dia  = data.getDate();           
	let dia_sem = data.getDay();           
	let mes  = data.getMonth();          
	let ano2  = data.getYear();         
	let ano4 = data.getFullYear();      
	let hora = data.getHours();          
	let min  = data.getMinutes();        
	let seg  = data.getSeconds();       
	let mseg = data.getMilliseconds();   
	let tz  = data.getTimezoneOffset(); 
	let str_data = dia + '/' + (mes+1) + '/' + ano4;
	let str_hora = hora + ':' + min + ':' + seg;

	document.querySelector('#data').innerHTML =('Data atual:  ' + str_data + ' às ' + str_hora);

}, 100);