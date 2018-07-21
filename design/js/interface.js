/** 
All animations and features scripted by :
Lukia
contact@anesis.tk
Free to use and fork and anything you want ! 

                         ___     ___
                ___   __|   |   |   |__   ___
               /  /  / /|   |   |   |\ \  \  \
              /  /  / / |   |___|   | \ \  \  \
             /  /__/ /  |           |  \ \__\  \
            /  __   /   |    ___    |   \   __  \
           /  / /  /    |   |   |   |    \  \ \  \
 _________/__/ /__/_____|___|   |___|_____\__\ \__\__________
|############################################################|
|       HARDCORE           HENTAI           HEADQUARTER      |
|############################################################|
|###########_____SITE V3 - POLE DEVELOPPEMENT_____###########|

**/
$(document).ready( function () {

	/////////// TOOLBOX ///////////////
	//on récupère les dimensions internes du navigateur.
	function dimensions(){
			largeur=window.innerWidth;
			hauteur=window.innerHeight;
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


	// vérification du navigateur pour la correction de bug au cas par cas
	// utilisation: $.browser['navigateur'] = renvoi true ou false.
	var userAgent = navigator.userAgent.toLowerCase();
	$.browser = {
	   version: (userAgent.match( /.+(?:rv|it|ra|ie|me)[\/: ]([\d.]+)/ ) || [])[1],
	   chrome: /chrome/.test( userAgent ),
	   safari: /webkit/.test( userAgent ) && !/chrome/.test( userAgent ),
	   opera: /opera/.test( userAgent ),
	   msie: /msie/.test( userAgent ) && !/opera/.test( userAgent ),
	   mozilla: /mozilla/.test( userAgent ) && !/(compatible|webkit)/.test( userAgent )
	};
	/////////////////////////////////////////////////////////

	
	if($.browser['msie'] && $.browser['version']<=8){
		alert("Votre navigateur est obsolète et peut rencontrer des problèmes pour parcourir ce site, veuillez le mettre à jour ou changer de navigateur pour une alternative fiable : Mozilla Firefox ou Google Chrome.");
	}
	
	/*disclaimer*/
	
	// si à l'entrée la date stockée est la même, on enlève le disclaimer automatiquement
	if(localStorage["disclaimer"]==datepicker()){
		// alert();
		$("#disclaimer").remove();
	}
	// sinon on vide la date stockée pour être sûr de pouvoir la réécrire ci dessous
	else {
		localStorage.removeItem("disclaimer");
	}
	
	// au clic à l'entrée sur le disclaimer on stock la date du jour
	$("#entree").click(function(){
		$("#disclaimer").fadeOut(400,function(){
			$(this).remove();
			var horodate=datepicker();
			localStorage["disclaimer"]=horodate;
		});
	});
	

	
	$("footer").click(function(){
		$(this).animate({"height":"380px"},300);
		$(this).addClass("deployed");
		$("#content").contents().click(function(){
			$("footer").animate({"height":"20px"},300);
			$("footer").removeClass("deployed");
		});
	});
	
	/*Affichage interne au chargement */
	
	function affichage(){

		$("header").perfectScrollbar();
		$("#content").perfectScrollbar();
		$("#disclaimer").perfectScrollbar();
		if($("header").attr("data-deploy")=="false"){
			var limitwrap=$("#wrapper").offset().left;
			var widthwrap=$("#wrapper").width();
			
			// $("#main").css("background-position",(limitwrap+widthwrap-70)+"px 122px,"+limitwrap-238+"px 122px");
			$("#main").css("background-position",limitwrap-238+"px 122px,"+(limitwrap+widthwrap-70)+"px 122px");
		}
		
	}
	affichage();
	
	// fonction d'évenement au resize
	$(window).resize(function() {
		affichage();
	});	

/***** comportement du menu ******/
	
	function deploymenu(){
		$("header").animate({width:300},400);
		$("header").scrollTop(0);
		$("#main").animate({left:300,right:-300},400,function(){
			$("header").attr("data-deploy","true");
		});
	}
	function reploymenu(){
		if($("header").attr("data-deploy")=="true"){
			$("header").animate({width:0},400);
			$("#main").animate({left:0,right:0},400,function(){
				$("header").attr("data-deploy","false");
			});
		}
	}
	
	$("#deploynav").click(function(){deploymenu();});
	$("#main").contents().click(function(){reploymenu();});
	$("#closemenu").click(function(){reploymenu();});
	

	// Quand la souris bouge sur le document
	$(document).mousemove(function (e){ 
		// on envoit les coordonnées de la souris
		mousecoord(e);
		if(mousex<=10 && $("header").attr("data-deploy")=="false"){
			setTimeout(function(){
				if(mousex<=10){
					deploymenu();
				}
			},800);
		}
	});
	
/**** deployement des news ***/
function deploynews (){
	$(".deploynews").click(function(){
		var elem=$(this).attr("data-newsid");
		$("article[data-newsid="+elem+"]").css("height","auto");

	});
}
deploynews();


/**** dire merci ****/
function thanx(){
	$(".thanks").click(function(){
		// on récupère l'id de la news
		var idnews=$(this).parents("article").attr("data-newsid");
		idnews=idnews.toString();
		
		if(localStorage["news"+idnews]){
			alert("Merci à vous de nous apprécier autant, vous nous avez déjà dit merci pour cette news");
		}
		else{
			// on incrémente tout de suite pour éviter les fous du click
			var compte=$("span",this).text();
			compte=parseInt(compte);
			compte +=1;
			$("span",this).text(compte);
			localStorage["news"+idnews] = "ok";
			// on incrémente la BDD
			$.ajax({
				type: "POST",
				url: "classdiremerci.php",
				data:{
				// on récupère la requete POST
				fd_idnews:idnews,
				confim:"ok"
				}
				// AJAX DEBUG pour le retour
				// ,success: function(data){
					// $('html').html(data);
				// }
			});
		}
	});
}
thanx();

/** contact ***/ 

// uniquement pour le popup
$("#triggercontact").click(function(){
	$("h2").before('<div id="contactpopup" class="contactbox"><span>&times;</span><div class="contacttitre">Une question en particulier ? Un remerciement ? Un coup de gueule ?<br/>Laissez-nous un message, nous vous répondrons si possible.<div class="gras">Pour tous bug ou erreur, veuillez vous reporter à la boite à erreur.</div></div><div class="contactitem">Pseudo*</div><input type="text" name="contactpseudo"><div class="contactitem">Email</div><input type="text" name="contactmail"><div class="contactitem">Votre message*</div><textarea name="contacttext" ></textarea><input type="text" name="dumbot"/><div id="contactsend">Envoyer</div></div>');
	dimensions();
	getsize("#contactpopup");
	$("#contactpopup").css({"top":50,"left":largeur/2-itemOW/2});
	$("#contactpopup #contactsend").click(function(){
		var parent=$(this).parents(".contactbox").attr("id");
		sendcontact(parent);
	});
	$("#contactpopup").find("span").click(function(){
		$("#contactpopup").remove();
	});
});

// pour la page contact
function contact(){
	$("#contactpage #contactsend").click(function(){
		var parent=$(this).parents(".contactbox").attr("id");
		sendcontact(parent);
	});
}
contact();

// envoi du message
function sendcontact(parent){
	var pseudo=$("#"+parent+" input[name='contactpseudo']").val();
	var mail=$("#"+parent+" input[name='contactmail']").val();
	var message=$("#"+parent+" textarea[name='contacttext']").val();
	var dumbot=$("#"+parent+" input[name='dumbot']").val();
	
	// vérification des champs obligatoire
	if(pseudo.trim()==="" || message.trim()===""){
		var verif=false;
	}else {
		var verif=true;
	}

	if(verif==true){
		// loader
		loader("init");
		// on envoi
		$.ajax({
			type: "POST",
			url: "classcontact.php",
			data:{
			// on récupère la requete POST
			fd_name:pseudo,
			fd_mail:mail,
			fd_content:message,
			fd_dumbot:dumbot
			}
			// AJAX DEBUG pour le retour
			// ,success: function(data){
				// $('html').html(data);
			// }
		}).done(function() {
			// popup de confirmation
			loader("destroy");
			dimensions();
			$('#'+parent+'.contactbox').before('<div id="formsubcont"><span>&times;</span>Votre message a bien été posté.</div></div>');
			
			$("#formsubcont").css({"top":hauteur/2-50,"left":largeur/2-50});

			//fermeture du popup
			$("#formsubcont").find("span").click(function(){
				$("#formsubcont").remove();
				$("#contactpopup").remove();
			});
			
			// vidange des champs
			$("input[name='contactpseudo'],input[name='contactmail'],textarea[name='contacttext']").each(function(){
				$(this).val("");
			});
		}).fail(function() {
			alert("ERREUR AJAX 02 : veuillez nous signaler l'erreur par mail : contact@anesis.tk");
		});
	}else {
		alert("Vous n'avez pas remplit tous les champs obligatoires (*).");
	}
}


/**** boite à erreur ****/

function errorbox(){
	$("#errorsend").click(function(){
		// on récupère le type d'erreur
		var errortype=$("input[name=errortype]:checked").attr("id");
		var errortype=$('label[for='+errortype+']').text();
		// on récupère l'intitulé de l'erreur
		var errortitre=$("input[name=errorintitule]").val();
		var dumbot=$("input[name=dumbot]").val();
		// puis le contenu
		var errorcontent=$("textarea[name=errortext]").val();
		console.log(errortype,errortitre,errorcontent);
	
		if(errortype.trim()==="" || errortitre.trim()==="" || errorcontent.trim()===""){
			var verif=false;
		}else {
			var verif=true;
		}
		
		if(verif==true){
				// loader
				loader("init");
				// on envoi
				$.ajax({
					type: "POST",
					url: "classerrorbox.php",
					data:{
					// on récupère la requete POST
					fd_errortype:errortype,
					fd_errortitre:errortitre,
					fd_content:errorcontent,
					fd_dumbot:dumbot
					}
					// AJAX DEBUG pour le retour
					// ,success: function(data){
						// $('html').html(data);
					// }
				}).done(function() {
					// popup de confirmation
					loader("destroy");
					dimensions();
					$('h2').before('<div id="formsubcont"><span>&times;</span>Votre erreur a bien été postée.</div></div>');
					
					$("#formsubcont").css({"top":hauteur/2-50,"left":largeur/2-50});

					//fermeture du popup
					$("#formsubcont").find("span").click(function(){
						$("#formsubcont").remove();
					});
					
					// vidange des champs
					$("input[name=errorintitule],textarea[name=errortext]").each(function(){
						$(this).val("");
					});
					$("input[name=errortype]:checked").attr("checked","");
				}).fail(function() {
					alert("ERREUR AJAX 06 : veuillez nous signaler l'erreur par mail : contact@anesis.tk");
				});
			}else {
				alert("Tous les champs sont obligatoires.");
			}		
		
	});

}

errorbox();


/**** NL2BR Javascript ****/
function nl2br (str, is_xhtml) {
    if(is_xhtml || typeof is_xhtml === 'undefined'){var breakTag = '<br />';}else{ var breakTag = '<br>';}
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}


/** commentaires de news **/	
function seecommnews(){
	// pour voir les commentaires des news
	$(".commentaires").click(function(){
		// on récupère les news
		var idnews=$(this).parents("article").attr("data-newsid");
		loader("init");
		getcommnews(idnews);


	});
}
seecommnews();

function getcommnews(news) {
	$.ajax({
		url: "classretourcomm.php?idnews="+news+"",
		success: function(data){
			loader("destroy");
			$("h2").before(data);
			$("#commclose").click(function(){
				$("#commentaire_box").remove();
			});
			$("#commentaire_content").perfectScrollbar();
			
			// prévisualiser un commentaire
			$("#preview_commentaire_button").click(function(){
				$("#commpreview, #commpreviewp").remove();
				var pseudo=$("#depot_commentaire_depotbox").find("input[name='pseudo']").val();
				var commentaire=nl2br($("#depot_commentaire_depotbox").find("textarea[name='commentaire']").val());
				if(pseudo.trim()==="" || commentaire.trim()===""){
					alert("Il n'y a rien à prévisualiser banane, il faut remplir tous les champs.");
					return;
				}
				var precontent=$("#commentaire_content").html();
				$("#commentaire_content").html('<div class="commentaire_auteur" id="commpreview"> Par '+pseudo+', le '+datepicker()+'.</div><p id="commpreviewp">'+commentaire+'</p>'+precontent)
			});
			
			// pour envoyer un commentaire
			$("#depot_commentaire_button").click(function(){
				// on envoi un nouveau commentaire
				var idnews=$(this).attr("data-commnewsid");
				var pseudo=$("#depot_commentaire_depotbox").find("input[name='pseudo']").val();
				var commentaire=$("#depot_commentaire_depotbox").find("textarea[name='commentaire']").val();
				var dumbot=$("#depot_commentaire_depotbox").find("input[name='dumbot']").val();
				postcommnews(idnews,pseudo,commentaire,dumbot);
		
			});
		}
	});
}

function postcommnews(news,pseudo,commentaire,dumbot){
	// vérification des champs obligatoire
	if(pseudo.trim()==="" || commentaire.trim()===""){
		var verif=false;
	}else {
		var verif=true;
	}

	if(verif==true){
		// loader
		loader("init");
		// on envoi
		$.ajax({
			type: "POST",
			url: "classaddcom.php",
			data:{
			// on récupère la requete POST
			fd_idnews:news,
			fd_name:pseudo,
			fd_content:commentaire,
			fd_dumbot:dumbot
			}
			// AJAX DEBUG pour le retour
			// ,success: function(data){
				// $('html').html(data);
			// }
		}).done(function() {
			// popup de confirmation
			loader("destroy");
			dimensions();
			$('#commentaire_box').before('<div id="formsubcont"><span>&times;</span>Votre commentaire a bien été posté.</div></div>');
			
			$("#formsubcont").css({"top":hauteur/2-50,"left":largeur/2-50});

			//fermeture du popup
			$("#formsubcont").find("span").click(function(){
				$("#formsubcont").remove();
				$("#commentaire_box").remove();
			});
			
			// vidange des champs
			$("input[name='pseudo'],textarea[name='commentaire']").each(function(){
				$(this).val("");
			});
		}).fail(function() {
			alert("ERREUR AJAX 01 : veuillez nous signaler l'erreur par mail : contact@anesis.tk");
		});
	}else {
	alert("Tous les champs sont obligatoires.");
	}
}

/*********** commentaires de projet **********/	
function seecommprojet(){
	// pour voir les commentaires des news
	$("#projetcommentaire").click(function(){
		// on récupère les news
		var idprojet=$(this).attr("data-idprojet");
		loader("init");
		getcommprojet(idprojet);


	});
}
seecommprojet();

function getcommprojet(projet) {
	$.ajax({
		url: "classretourcommprojet.php?idprojet="+projet+"",
		success: function(data){
			loader("destroy");
			$("h2").before(data);
			$("#commclose").click(function(){
				$("#commentaire_box").remove();
			});
			$("#commentaire_content").perfectScrollbar();
			
			// prévisualiser un commentaire
			$("#preview_commentaire_button").click(function(){
				$("#commpreview, #commpreviewp").remove();
				var pseudo=$("#depot_commentaire_depotbox").find("input[name='pseudo']").val();
				var commentaire=$("#depot_commentaire_depotbox").find("textarea[name='commentaire']").val();
				if(pseudo.trim()==="" || commentaire.trim()===""){
					alert("Il n'y a rien a prévisualiser banane.");
					return;
				}
				var precontent=$("#commentaire_content").html();
				$("#commentaire_content").html('<div class="commentaire_auteur" id="commpreview"> Par '+pseudo+', le '+datepicker()+'.</div><p id="commpreviewp">'+commentaire+'</p>'+precontent)
			});
			
			// pour envoyer un commentaire
			$("#depot_commentaire_button").click(function(){
				// on envoi un nouveau commentaire
				var idprojet=$(this).attr("data-commprojetid");
				var pseudo=$("#depot_commentaire_depotbox").find("input[name='pseudo']").val();
				var commentaire=$("#depot_commentaire_depotbox").find("textarea[name='commentaire']").val();
				var dumbot=$("#depot_commentaire_depotbox").find("input[name='dumbot']").val();
				postcommprojet(idprojet,pseudo,commentaire,dumbot);
		
			});
		}
	});

}

function postcommprojet(projet,pseudo,commentaire,dumbot){
	// vérification des champs obligatoire
	if(pseudo.trim()==="" || commentaire.trim()===""){
		var verif=false;
	}else {
		var verif=true;
	}

	if(verif==true){
		// loader
		loader("init");
		// on envoi
		$.ajax({
			type: "POST",
			url: "classaddcomprojet.php",
			data:{
			// on récupère la requete POST
			fd_idprojet:projet,
			fd_name:pseudo,
			fd_content:commentaire,
			fd_dumbot:dumbot
			}
			// AJAX DEBUG pour le retour
			// ,success: function(data){
				// $('html').html(data);
			// }
		}).done(function() {
			// popup de confirmation
			loader("destroy");
			dimensions();
			$('#commentaire_box').before('<div id="formsubcont"><span>&times;</span>Votre commentaire a bien été posté.</div></div>');
			
			$("#formsubcont").css({"top":hauteur/2-50,"left":largeur/2-50});

			//fermeture du popup
			$("#formsubcont").find("span").click(function(){
				$("#formsubcont").remove();
				$("#commentaire_box").remove();
			});
			
			// vidange des champs
			$("input[name='pseudo'],textarea[name='commentaire']").each(function(){
				$(this).val("");
			});
		}).fail(function() {
			alert("ERREUR AJAX 04 : veuillez nous signaler l'erreur par mail : contact@anesis.tk");
		});
	}else {
	alert("Tous les champs sont obligatoires.");
	}
}

/*** fonction du loader ***/
function loader(trigger){
	if(trigger==="init"){
		dimensions();
		$("h2").before('<div id="loader"><div></div></div>');
		$("#loader").fadeIn("fast");
		$("#loader").css({"top":hauteur/2-50,"left":largeur/2-50});
	}
	else if(trigger==="destroy") {
		$("#loader").remove();
	}
}

/*** systeme de notation ***/

function notebloc(){
	dimensions();
	getsize("#notebox");
	$("#notebox").css({"top":100,"left":largeur/2-itemOW/2});
	$("#notebox").find("span").click(function(){
		$("#notebox").remove();
	});
	$("#advice").find("div").click(function(){
		$("#advice").height("auto");
	});
	$(".blocknotation").click(function(){
		$(".radio").each(function(){
			$(this).attr("data-select","unselect");
		})
		$(".radio",this).attr("data-select","select");
	});
	
	// on envoi la note
	$("#sendnote").click(function(){
		var idprojet=$("#projetcommentaire").attr("data-idprojet");
		var note=$(".blocknotation").find("div[data-select=select]").attr("data-note");
		if(localStorage["note"+idprojet]){
			alert("Merci à vous d'apprécier autant notre travail mais vous avez déjà noté ce projet.");
		}
		else{
			localStorage["note"+idprojet] = "ok";
			$.ajax({
				type: "POST",
				url: "classnotation.php",
				data:{
				// on récupère la requete POST
				fd_note:note,
				fd_projet:idprojet
				}
				// AJAX DEBUG pour le retour
/*				,success: function(data){
					$('html').html(data);
				}*/
			}).done(function() {
				// popup de confirmation
				loader("destroy");
				dimensions();
				$('#notetitre').before('<div id="formsubcont"><span>&times;</span>Votre note a bien été prise en compte.</div></div>');
				
				$("#formsubcont").css({"left":$("#notebox").width()/2-90});

				//fermeture du popup
				$("#formsubcont").find("span").click(function(){
					$("#formsubcont").remove();
					$("#notebox").remove();
					
					// on ajoute la note pour éviter les gogols
					var finalnote=parseInt($("#note").text());
					note=parseInt(note);
					finalnote+=note;
					$("#note").text(finalnote)
				});
			}).fail(function() {
				alert("ERREUR AJAX 03 : veuillez nous signaler l'erreur par mail : contact@anesis.tk");
			});
		}
	});
}

function givenote(){
	$("#givenote").click(function(){
		$("section").before('<div id="notebox"><span>&times;</span><div id="notetitre">Comment avez-vous apprécié ce volume ?</div><div id="advice"><div>Quel est le système de notation ?</div><p>Le système de notation donne des points représentatifs de l\'appréciation du volume. En effet, tous les genres, auteur, dessin, ou intrigue ne peuvent pas forcément plaire à tout le monde, c\'est pourquoi il est donné la possibilité à ceux qui apprécient réellement le genre, l\'auteur, le dessin ou l\'intrigue de donner des points plus fort que ceux qui n\'ont qu\'une idée générale de leur lecture.</p></div><div id="notation"><div class="blocknotation"><div class="radio" data-select="unselect" data-note="-1"></div><div>Bidon : -1</div></div><div class="blocknotation"><div class="radio" data-select="unselect" data-note="0"></div><div>Bof : 0</div></div><div class="blocknotation"><div class="radio" data-select="unselect" data-note="1"></div><div>Bien : +1</div></div><div class="blocknotation"><div class="radio" data-select="unselect" data-note="2"></div><div>Excellent : +2</div></div></div><div id="sendnote">Noter !</div>');
		notebloc();
	});
}
givenote();
/*** Date picker ****/

function datepicker(){
	var d = new Date();
	var j=d.getDate();
	if (j<10){j="0"+j};
	var m =(d.getMonth()+1);
	if (m<10){m="0"+m};
	var a=d.getFullYear();
	a=a.toString();
	a=a.substr(2,4);
	return j+"-"+m+"-"+a;
}

/*** HHH chat ***/
function hhhchatcontrol(){

	
	
	// boutons de controle réduire/agrandir
	$("#chatheader").find("span:eq(1)").click(function(){
		
		if($(this).hasClass("reploy")){
			$(this).removeAttr("class");
			chatposition();
		}else {
			$(this).addClass("reploy");
			$("#hhhtchat").removeAttr("style");
			$("#hhhtchat").attr("data-chatdeploy","false");
		}
	});
	// boutons de controle fermer
	$("#chatheader").find("span:eq(0)").click(function(){
		$("#hhhtchat").remove();
	});
	
}

function chatposition(){
	dimensions();
	var w =(largeur/3)*2;
	var h= (hauteur/3)*2;
	$("#hhhtchat").attr("data-chatdeploy","true");
	$("#hhhtchat").css({"width":w,"height":h+50,"left":largeur/2-w/2, "top":hauteur/2-(h+50)/2});
	$("#hhhtchat").find("iframe").css({"width":w,"height":h-50});
}

function chatopen(){
	$('#chatbox, *[data-chat="true"]').click(function(e){
		e.preventDefault();
		// on vérifie l'existence ou pas de la boite de tchat et on envoit
		if($("#hhhtchat").length==0){
			$("h2").before('<div id="hhhtchat" data-chatdeploy="none"><div id="chatheader">HHH Chat<span>&times;</span><span></span></div><span>Bienvenu sur le web-irc de la HHH. Veuillez spécifier votre pseudonyme et validez avec "Connect".</span><iframe src="https://widget.mibbit.com/?settings=3b9920b4c6a7313052939b4016b74d0e&server=irc.worldnet.Net&channel=%23hhh"></iframe><br/><div id="chatnote">Veuillez noter que vous ne pouvez pas télécharger de releases avec cet applet.<br/> Pour cela vous devez vous munir d\'un "vrai" client IRC, celui de la team (Luxuria) est disponible sur le site.</div></div>');
			chatposition();
			hhhchatcontrol();
		}
	});
}
chatopen();

/***** Pages projets *****/	

function projet(){
	// au click sur un projet
	$(".projetprez a").click(function(e){
	
		e.preventDefault();
		// s'il y en a déjà un d'ouvert, on le ferme
		$(".projetwrap.projetdeploy").each(function(){
			$(this).removeClass("projetdeploy");
		});
		// on affiche les détails du projet
		$(this).parents(".projetwrap").addClass("projetdeploy");
		
		// variable globale pour la navigation
		lienprojet=$(this).text();
	});

	// click sur le bouton de fermeture
	$(".dlink:contains(Fermer)").click(function(){
		$(this).parents(".projetwrap.projetdeploy").removeClass("projetdeploy");
	});
}
projet();	

/*****Boite à filtre liste des releases ****/

function boitafiltre(){
/* remplissage de la boite à filtre */

// on récupère les différents contenu des filtre

var titrearray= new Array();// titres
$(".listrlz_line").each(function(){
	var title=$(".listrlz_titre",this).text();
	var verif=titrearray.indexOf(title);
	if(verif<0){
		titrearray.push(title);
	}
}); 
titrearray.sort();

var genrearray= new Array();// genres
$(".listrlz_line").each(function(){
	var genre1=$(".listrlz_genre:nth-child(4)",this).text();
	var verif=genrearray.indexOf(genre1);
	if(verif<0){
		if(genre1!="-"){
			genrearray.push(genre1);
		}
	}
	var genre2=$(".listrlz_genre:nth-child(5)",this).text();
	var verif=genrearray.indexOf(genre2);
	if(verif<0){
		if(genre2!="-"){
			genrearray.push(genre2);
		}
	}
	var genre3=$(".listrlz_genre:nth-child(6)",this).text();
	var verif=genrearray.indexOf(genre3);
	if(verif<0){
		if(genre3!="-"){
			genrearray.push(genre3);
		}
	}
}); 
genrearray.sort();

var typearray= new Array(); // types
$(".listrlz_line").each(function(){
	var title=$(".listrlz_type",this).text();
	var verif=typearray.indexOf(title);
	if(verif<0){
		typearray.push(title);
	}
}); 
typearray.sort();

var auteurarray= new Array(); // auteurs
$(".listrlz_line").each(function(){
	var title=$(".listrlz_auteur",this).text();
	var verif=auteurarray.indexOf(title);
	if(verif<0){
		if(title!="_"){
			auteurarray.push(title);
		}
	}
}); 
auteurarray.sort();

// on remplit les boites à filtre

for(var i=0;i<titrearray.length;i++){
	$(".filter").has('.filtername:contains("Titre")').append(function(){
		var content=$(this).html();
		$(this).html(content+'<div class="filteritem">'+titrearray[i]+'</div>');
	});
}

for(var i=0;i<genrearray.length;i++){
	$(".filter").has('.filtername:contains("Genre")').append(function(){
		var content=$(this).html();
		$(this).html(content+'<div class="filteritem">'+genrearray[i]+'</div>');
	});
}

for(var i=0;i<typearray.length;i++){
	$(".filter").has('.filtername:contains("Type")').append(function(){
		var content=$(this).html();
		$(this).html(content+'<div class="filteritem">'+typearray[i]+'</div>');
	});
}

for(var i=0;i<auteurarray.length;i++){
	$(".filter").has('.filtername:contains("Auteur")').append(function(){
		var content=$(this).html();
		$(this).html(content+'<div class="filteritem">'+auteurarray[i]+'</div>');
	});
}

	var eventfiltre=false;
	/* animation des filtres */
	$(".filterreploy").click(function(){
		// alert("La fonctionnalité de filtre n'a pas encore été développée, ça arrive !");
		
		if(eventfiltre==false){
			//filtres
			if($(this).hasClass("filter")){
				$(".filter").each(function(){
					// pour ceux déjà ouvert
					if($(this).not(".filterreploy")){
						$(this).removeClass("filterdeploy");
						$(this).addClass("filterreploy");
					}
					
				});
				
				// on affiche la page à la bonne hauteur;
				getpos(this);
				$("#content").scrollTop(posY-82);
				// on ouvre le concerné
				$(this).removeClass("filterreploy");
				$(this).addClass("filterdeploy");

			}
			//boite principale
			else {
				$(this).attr("class","filterdeploy");
			}
		}
		
	});

	/* au click sur un des filtres simple */
	$(".filteritem,#filtrerladate").click(function(){
			eventfiltre=true;
			// on replie tous les bloc et on temporise la variable eventfiltre pour éviter le redéployement
			$("#filterbox").removeClass("filterdeploy");
			$("#filterbox").addClass("filterreploy");
			$(".filter").each(function(){$(this).removeClass("filterdeploy")});
			$(".filter").each(function(){$(this).addClass("filterreploy")});

			setTimeout(function(){eventfiltre=false;},100);
			
			// on trie la recherche
			if($(this).is(".filteritem")){
				$("#content").scrollTop(0);
				var catfiltre=$(this).siblings(".filtername").text();
				var filtreur=$(this).text();
				// on cache toute les lignes
				$(".listrlz_line").each(function(){
					$(this).css("display","none");
				});
				// on trie les selecteur
				if(catfiltre=="Genre"){
					var selector=".listrlz_genre";
				}
				else if(catfiltre=="Titre") {
					var selector=".listrlz_titre";
				}
				else if(catfiltre=="Type") {
					var selector=".listrlz_type";
				}
				else if(catfiltre=="Auteur") {
					var selector=".listrlz_auteur";
				}
				// on affiche en fonction du type de filtre et du filtre
				$(selector+":contains("+filtreur+")").parents(".listrlz_line").each(function(){
						$(this).css("display","block");
				});
				$("#resetfilter").css("display","block");
			}
	});

	/* filtre par date */
	$(".filteryear,.filtermonth").click(function(){
	// on s'assure qu'un seul choix est fait pour le mois ou l'année
		var filt=$(this).attr("class");

		$("."+filt+"[data-dateselect=true]").each(function(){
				$(this).attr("data-dateselect","false");
		});

		$(this).attr("data-dateselect","true");

	});
	// on envoi le choix 
	$("#filtrerladate").click(function(){
		$(".listrlz_line,.listnews_line").each(function(){
					$(this).css("display","none");
		});
		exists="undefined";
		var filtreannee=$(".filteryear[data-dateselect=true]").text().substr(2);
		var filtremois=$(".filtermonth[data-dateselect=true]").text().substr(0,2);
		if(filtreannee=="" || filtremois==""){
			alert("vous devez indiquer l'année et le mois de sortie");
		}
		else {
			var filtredate="/"+filtremois+"/"+filtreannee;
			$(".listrlz_datesortie:contains("+filtredate+"),.listnews_date:contains("+filtredate+")").parents(".listrlz_line,.listnews_line").each(function(){	
				$(this).css("display","block");
				exists="ok";
			});
			$("#resetfilter").css("display","block");
		}
		if(exists=="undefined"){
			alert("Aucune entrée disponible pour "+filtremois+"/"+filtreannee);
		}
		// console.log(filtremois,filtreannee);
	});
	
	$("#resetfilter").click(function(){
		$(".listrlz_line,.listnews_line").each(function(){
			$(this).css("display","block");
		});
		$(".filteryear,.filtermonth").each(function(){
			$(this).attr("data-dateselect","false");
		});
	});
}
boitafiltre();

/******* Visionneuse ********/	

function visionneuse(){
// visionneuse d'extrait
	$("#projetextrait a,.projetextend a,.artworks a").click(function(e){e.preventDefault();});
	$("#projetextrait, .dlink[data-link=extrait],.artworks a").click(function(){
		// on récupère le lien de l'image
			//si c'est un lien
		if($(this).is("a")){
			var link=$(this).attr("href");
		}
			// si c'est un conteneur de lien
		else{
		var link=$("a",this).attr("href");
		}
		dimensions(); 
		$("h2").before('<div id="hhh_viewer"><div id="viewerclose">&times;</div><img src="'+link+'" height="'+(hauteur-40)+'" alt="extrait"></div>');
		
		$("#hhh_viewer").not("#hhh_viewer img").click(function(){
			$(this).remove();
		});
	});
}
visionneuse();

/****** page membre *******/

function seemembres(){
	$(".membre").click(function(){
		var membre=$(this).text();
		// console.log(membre);
		loader("init");
		$.ajax({
			url: "classmembres.php?pseudo="+membre+"",
			success: function(data){
				loader("destroy");
				$("#rightmembres").html(data);
				// console.log(data);
			}
		}).fail(function() {
			alert("ERREUR AJAX 05 : veuillez nous signaler l'erreur par mail : contact@anesis.tk");
		});
	});

}
seemembres(); 
/********* FUCKIN' NAVIGATION **********/

// émulation du scroll au clic molette

var middlescroll=false;
$(document).mousedown(function(e){
 // on récupère le clic central et l'élément clické
	var element = e.target.nodeName;
	var elementParent=e.target.parentNode.nodeName;
	var clicmouse=e.which; 
	// si l'élément est un lien, on ne fait rien
	if(element=="A" || elementParent=="A"){
		
		return;
		
	}
	else if(clicmouse==2 && middlescroll==false){
		// on permet le scroll 
		middlescroll=true;
		$("#content").css("cursor","move");
		// on récupère la position de référence de la souris
		var mousey = e.pageY;	
		$(document).mousemove(function (e){ 
		// quand la souris bouge
			if(middlescroll==true){
			// on calcule la différence entre la position de référence et la position actuelle de la souris
				var mouselive=(mousey-e.pageY)*-1;
				// on récupère le scrolltop de base du contenu
				var contentscroll=$("#content").scrollTop();
				// on calcule de combien on doit faire scroller le document
				var scroller=contentscroll+mouselive;
						// console.log(mouselive,contentscroll,scroller);
						
				// on applique le scroll avec un timeout de 1ms pour éviter qu'il aille trop vite 
				setTimeout(function(){$("#content").scrollTop(scroller);},1);
			}
		});
	}
	else if(clicmouse==2 && middlescroll==true) {
		// on tue le scroll au reclic 
		$("#content").removeAttr("style");
		return middlescroll=false;
		
	}
		// console.log(middlescroll);
}) 
	
		/******** Navigation ajax ALLER **********/
	$(document).on( "click", "nav a, a[data-link=internal],a[data-link=projet],a[data-link=listeprojet],a[data-link=liennewsprojet],a[data-link=archnews],a[data-link=news],a[data-link=seemembre]", function(e) {
	
		var lien = $(this).attr("href");
		// on trie les liens au cas par cas
		
		if(lien=="https://lel.anesis.tk/"){
			window.open(lien);
		}else{
				
				//liens pour des pages internes sans autres GET
			if($(this).is($("a[data-link=internal]"))){
				titrepage=$('nav a[href="'+lien+'"]').text()
				request="?request=ajax";
			}
				// liens de projet
			else if($(this).is($("a[data-link=projet]"))){
				titrepage=lienprojet;
				request="&request=ajax";
				// alert();
				// console.log(titrepage);
			}
				// liens d'un projet depuis une news
			else if($(this).is($("a[data-link=liennewsprojet]"))){
				titrepage=$(this).text();
				request="&request=ajax";
			}
				// liens de liste projet
			else if($(this).is($("a[data-link=listeprojet]"))){
				titrepage=$(".listrlz_titre",this).text();
				request="&request=ajax";

				
			}
				// news seule depuis l'index
			else if($(this).is($("a[data-link=news]"))){
	 
				titrepage=$(this).parents("article").children("h3").text();
				request="&request=ajax";
			}
				// news seule depuis les archives
			else if($(this).is($("a[data-link=archnews]"))){
				titrepage=$(".listnews_titre",this).text();
				request="&request=ajax";
			}

				// membre
			else if($(this).is($("a[data-link=seemembre]"))){
				titrepage="Les membres";
				request="&request=ajax";
				flag=$(this).attr("href");
				// flag="askmembre";
			}

				// liens du menu
			else {
				titrepage = $(this).text();
				request="?request=ajax";
			}
			loader("init");
			$.ajax({
				url: lien + request,
				success: function(data){
					loader("destroy");
					$("#content").animate({scrollTop:0});
					reploymenu();
					$("h2").text(titrepage);
					$("#dynabox").html(data);
					
					// lancement des différents modules
					affichage();
					seecommnews();
					seecommprojet();
					visionneuse();
					boitafiltre();
					projet();
					thanx();
					contact();
					givenote();
					seemembres();
					chatopen();
					errorbox();
					deploynews();
					
					// quand on a fait un lien depuis un membre
					
					if (typeof (flag) != 'undefined'){
						flag=flag.substr(23);
						// les-membres.php?member=Lukia
						$.ajax({
							url: "classmembres.php?pseudo="+flag+"",
							success: function(data){
								$("#rightmembres").html(data);
							}
						})
					}
					
					// on pousse la page vue dans le tableau Google Analytics
					_gaq.push(['_trackPageview','/'+lien]);
					// controle IE ( IE <=9 incompatible avec history.pushState)
					if($.browser['msie']===false || $.browser['msie']===true && version>=10.0){
						history.pushState('','Hardcore Hentai Heaquarter V3 - '+titrepage, lien); 
					}
					document.title = 'Hardcore Hentai Heaquarter V3 - '+titrepage;
					
					
				}
			});
		}
		e.preventDefault();

	});

/******** Navigation ajax RETOUR (et aller via les boutons d'historique **********/
	window.onpopstate = function(event){
		var bowl = String(location.pathname);
		// on enleve l'adresse http
		bowl= bowl.substr(bowl.lastIndexOf("/")+1);

		// on recherche le texte du lien qui = bowl
		if(bowl===""){bowl="index.php"};
		var previoustitre=$('nav a[href="'+bowl+'"]').text();
		loader("init");
		$.ajax({
			url: location.pathname + "?request=ajax",
			success: function(data){
				loader("destroy");
				//○ $("#content").animate({scrollTop:0}); fout la merde avec des liens à ancre.
				$("h2").text(previoustitre);
				$("#dynabox").html(data);
				
				// lancement des différents modules
				affichage();
				seecommnews();
				seecommprojet();
				visionneuse();
				boitafiltre();
				projet();
				thanx();
				contact();
				givenote();
				seemembres();
				chatopen();
				errorbox();
				deploynews();

				
				
				if($.browser['msie']===false || $.browser['msie']===true && version>=10.0){
					history.replaceState('','Hardcore Hentai Heaquarter V3 - '+previoustitre, bowl); 
				}
				document.title = 'Hardcore Hentai Heaquarter V3 - '+previoustitre;
			}
		});
	}

	
}); //END OF DR

	