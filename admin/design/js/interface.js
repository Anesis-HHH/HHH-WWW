/**
All animations and features scripted by :
Lukia
contact@hhh-world
Free to use and fork and anything you want ! 
**/
$(document).ready( function () {

	/////////// TOOLBOX ///////////////
	//on récupère les dimensions internes du navigateur.
	function dimensions(){
			largeur=window.innerWidth;
			hauteur=wi-ndow.innerHeight;
	}	

	// taille d'un élément
	function getsize(elem){
		itemW=$(elem).width();
		itemH=$(elem).height();
		ratio= itemW/itemH;
	}
	// taille d'un élément+padding
	function getsize(elem){
		itemOW=$(elem).outerWidth();
		itemOH=$(elem).outerHeight();
		Oratio= itemOW/itemOH;
	}

	// fonction de récuperation des coordonnées de la souris
	function mousecoord(event) {
		mousex = event.pageX; 
		mousey = event.pageY;	 
	}


	// fonction de récupération de la position des éléments
	function getpos(elem) {
					pos=$(elem);
					pos=pos.offset();
					posX=Math.floor(pos.left);
					posY=Math.floor(pos.top);

		}

$("#previsualisation").click(function(){
	$("#newspreview").css("display","block");
	var titre=$("input[name=titre]").val();
	var pseudo=$("input[name=pseudo]").val();
	var avatar=$("input[name=avatar]").val();
	var contenu=$("textarea[name=contenu]").val();
	// console.log(titre,pseudo,avatar,contenu);
	$("#newspreview h3").text(titre);
	$("#newspreview .newsaside img").attr("src",'../images/avatars/'+avatar+'');
	$("#newspreview .author a").text(pseudo);
	$("#contenunews").html(contenu);
	
	$("#contenunews img").each(function(){
		var imgnews=$(this).attr("src");
		$(this).attr("src","../"+imgnews);
		console.log(imgnews);

	});

	$("#newspreviewclose").click(function(){
		$("#newspreview").fadeOut(); 
	});
	
	function nl2br (str, is_xhtml) {
		if(is_xhtml || typeof is_xhtml === 'undefined'){var breakTag = '<br />';}else{ var breakTag = '<br>';}
		return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
	}
	
	nl2br($("#contenunews").text());
	
});
		

	
}); //END OF DR

	