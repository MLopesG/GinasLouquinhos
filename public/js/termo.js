const loadFile = (url,callback)=> {
    JSZipUtils.getBinaryContent(url,callback);
}
const print_termo = (json)=>{
	if(window.location.pathname == '/ginas/painel'){
			loadFile("public/termo/termo.doc", function(err, content) {
		    doc =  new DocxGen(content);
		    doc.setData(json); 
		    doc.render();
		    out=doc.getZip().generate({type:"blob"});
		    saveAs(out,"Termo "+json['nome_atleta']+'.doc');
		});
	}else{
		loadFile("../../public/termo/termo.doc", function(err, content) {
		    doc =  new DocxGen(content);
		    doc.setData(json); 
		    doc.render();
		    out=doc.getZip().generate({type:"blob"});
		    saveAs(out,"Termo "+json['nome_atleta']+'.doc');
		});
	}
}