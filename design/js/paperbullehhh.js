/**
All animations and features scripted by :
Lukia
contact@hhh-world.com
Free to use and fork and anything you want ! 
**/
$(document).ready( function () {



function config (){
	
// BULLES //
	dmini=25; // diamètre mini
	dmaxi=50; // diamètre maxi
	
//couleur des bulles	
	colorR=175; // fond canal rouge
	colorG=0; // fond canal vert
	colorB=0; // fond canal bleu

// animation	
	setbulle=30; // nombres de bulles 
	vitesse=50; // plus le chiffre est faible plus l'animation est rapide

// Effet des bulles 
	randomizecolor=false; // enclenche la randomisation de la couleur, by pass sur les précédents paramètre RGB
	alpha=false;// enclenche la transparence et la randomisation de l'alpha
	setalpha=0;// Définit la transparence (0.1 à 1) 
	alpharandom=true;// couche alpha aléatoire (plus joli, mais plus lourd à gérer), désactive le setalpha
	bulimage=""; // chemin vers l'image : syntaxe CSS ( url(adressedel'image)  (laissez vide pour désactiver: bulimage="")
	// bulimage="url(design/img/bulle.png)"; 

// couleur de fond du conteneur et de l'ombre de disparition 
	bgR=40; // fond canal rouge
	bgG=40; // fond canal rouge
	bgB=40; // fond canal rouge

// 	ombre des bulles.
	shadowfx=true;
	
// Effet de disparition des bulles
	setfading=true; // activation
	fadingheight=100; // limite de l'ombre depuis le haut de la page
	canvasBGcolorR= 255; // Couleur de fond et couleur du Fader : obligatoire si fading activé
	canvasBGcolorG= 255; // Couleur de fond et couleur du Fader : obligatoire si fading activé
	canvasBGcolorB= 255; // Couleur de fond et couleur du Fader : obligatoire si fading activé

// Profondeur de champs
	setfocus=false;
	
// LAVA LAMP config :)
	lavalamp= false;
	lavalimit= 100; // px

	
// 	Nom des éléments
	idcontent="myCanvas"; // nom du conteneur de bulles
	idbulle="bulle"; // nom des bulles
	
	idcontentjq="#"+idcontent+"";
	idbullejq="."+idbulle+""; 
};



/////////// dimensions ///////////////
//on récupère les dimensions du canvas.
function dimensions(){
		largeur=$(idcontentjq).width();
		hauteur=$(idcontentjq).height();
}	

//////////////////////////////////
// Lancement

config();
dimensions();
$(window).resize(function() {
		dimensions();
	});	

function random(){
		//disposition
		randleft=Math.floor(Math.random()*largeur); //px
		
		randtop=Math.floor(Math.random()*(Math.PI*500)); //px
		
		// taille
		randtaille=Math.floor(Math.random()*dmaxi); //px
		if (randtaille<dmini){
			randtaille=dmini;
			
		}
		
		// vitesse
		randvitesse=Math.floor(Math.random()*vitesse);
		if (randvitesse<1){
			randvitesse=1; // evite le 0
		}
		
		// couleur bulles
		if(randomizecolor==true){
			colorR=Math.floor(Math.random()*255); // canal rouge
			colorG=Math.floor(Math.random()*255); // canal vert
			colorB=Math.floor(Math.random()*255); // canal bleu
		}
		
		//couche alpha bulles
		if(alpha==true && alpharandom==true){  // RANDOM ACTIVE
		
			randalpha=Math.random();
			randalpha=randalpha.toString().substring(0,3);
			
			if (randalpha==0.0){
				randalpha=0.1;
			}
			
		}
		else if(alpha==true){ // PERSONNALISE
			randalpha=setalpha;
		}
		else if(alpha==false){ // RANDOM ET ALPHA DESACTIVE
			randalpha=1;
		}
		
		//echelle des bulles (item.radius n'est pas changeable une fois défini, obligé de passer par la méthode scale())
		randscale=Math.random()*1;
		randscalefactor=Math.random()*1;
		
		// constante définissant le point de départ des bulles 
		// inittop=hauteur+randtaille+10; // en bas
		inittop=-110; // en haut
}


/******initialisation des formes ******/

// colorisation du background si Fader activé
if(setfading==true){
	var fader=new Shape.Rectangle({
		point: [0,0],
		size: [largeur, hauteur],
		fillColor:"rgb("+canvasBGcolorR+","+canvasBGcolorG+","+canvasBGcolorB+")"
		
	});
}


// création des bulles 
var groupbulle=[];
var grouppath=[];

for (i=0; i<setbulle;i++) {
	random();
	dimensions();	
	var bubble = new Path({
	segments: [[0,0],[30,0],[30,40],[60,40],[60,0],[90,0],[90,110],[60,110],[60,110],[60,70],[30,70],[30,110],[0,110]],
	closed: true,
	position:[randleft,-randtop],
		

	});

bubble.scale(randscale);
// effet focu
if(setfocus==true){	
	
	focus(bubble,colorR, colorG, colorB);
	
}else {
	bubble.fillColor= "rgba("+colorR+","+colorG+","+colorB+","+randalpha+")"
}
	
	if(shadowfx==true){
		bubble.shadowColor= new Color(colorR, colorG, colorB),
		bubble.shadowBlur= 8,
		bubble.shadowOffset= new Point(0, 0)
	}
	
	groupbulle.push(bubble);
	// bubble.selected=true;
	// console.log(bubble);
	
	
	// création des objets lave pour chaque bulle
	if(lavalamp==true){
		var path = new Path({
			fillColor: "rgba("+colorR+","+colorG+","+colorB+","+randalpha+")",
			closed: true
		});
		grouppath.push(path);
		// path.selected=true;
	}
}

// création de la cire
if(lavalamp==true){
	var cireH= hauteur-lavalimit;
	var cire=new Path({

		segments: [[0,cireH],[largeur,cireH],[largeur,hauteur],[0,hauteur]],
		fillColor: "#000000",
		// strokeColor: "red",
		closed: true

	});
}

// création du fader
if(setfading==true){
	var fader=new Shape.Rectangle({
		point: [0,0],
		size: [largeur, fadingheight],
		fillColor:{
			gradient: {
				stops: [
				["rgba("+canvasBGcolorR+","+canvasBGcolorG+","+canvasBGcolorB+",1)",0],
				["rgba("+canvasBGcolorR+","+canvasBGcolorG+","+canvasBGcolorB+",0.8)",0.2],
				["rgba("+canvasBGcolorR+","+canvasBGcolorG+","+canvasBGcolorB+",0.1)",0.5],
				["rgba("+canvasBGcolorR+","+canvasBGcolorG+","+canvasBGcolorB+",0)",1]]
			},
			origin: [largeur/2,0],
			destination: [largeur/2,fadingheight]
		
		}
	});
	
}


// animation 
function gazes(event) {
	
	for (var i = 0; i < setbulle; i++) {
		// on récupère toutes les bulles du calque actif 
		var bulle = groupbulle[i];
		var path = grouppath[i];
		var cirelimit= view.bounds.height-lavalimit;
		// en fonction de la taille de la bulle, la montée sera différente
		bulle.position.y += bulle.bounds.width/ vitesse;
		// quand une bulle arrive en fin de parcours
		if(bulle.bounds.top > hauteur+bulle.bounds.width){
			// on applique le random et on applique les valeurs
			random();
			
			if(bulle.bounds.width<dmini){
				bulle.scale(randscale*3);
			}
			else if(bulle.bounds.width>dmaxi){
				bulle.scale(randscale+(randscalefactor*0.75));
			}else {
				bulle.scale(randscale);
			}
			
			bulle.position.y=0-randtop;
			bulle.position.x=randleft;
			
			if(setfocus==true && randomizecolor==true){	
				focus(bulle,colorR,colorG,colorB);
			
			}
			else if(randomizecolor==true && setfocus==false){
				bulle.fillColor="rgba("+colorR+","+colorG+","+colorB+","+randalpha+")";
			}
			
		}
		
		// quand une bulle sort de la cire
		if(bulle.bounds.top<cirelimit && lavalamp==true){

		// Création des connexions
			cirage(bulle,cirelimit,path);
		
		}
	}


	
}

// on lance l'animations

view.on('frame', gazes);


// EFFET LAVA LAMP

function cirage(bubble,wax,forme){

	// instanciation des variables
		var bubpos = bubble.position;
		var midbubble= bubble.bounds.width / 2;
		var bubtaille=midbubble*2
		var top = bubpos.y-midbubble; // le haut de la bulle
		var distance= (top-wax)*-1; // a partir du top. devient positif
		var topsegments = bubpos.y; 
	
		// coordonnées des points d'attache
		var midbulleft = bubpos.x-midbubble;
		var midbulright = bubpos.x+midbubble;
		var bottombulle = (distance-bubtaille)*-1;
		
		// animation des poignées inférieures
		var deflect=distance/Math.PI;
		
		// limite de brisure de la connexion
		var stopper=bubtaille+midbubble/Math.PI-5; // 10px de marge
	
		// préparation du sélecteurs de segment
		var segmentcolle= forme.segments;
		
		// variables propres aux formes
		var fpos=forme.position;
	var	forigin=fpos.y-(fpos.y/2)
	var	fdestination=fpos.y+(fpos.y/2)
	// on attribut à ce moment les dimension et propriété des paths des formes.
		// on pose les points de la forme
		forme.segments = [
			[midbulleft,wax], //BG
			[midbulleft,topsegments], //HG
			[midbulright,topsegments],  // HD
			[midbulright,wax] // BD
		];
		
	
		// Animation des segments,
		// on gère les courbes via les poignées
		
		// haut gauche
		segmentcolle[2].handleOut = [0,midbubble];
		
		// haut droite
		segmentcolle[1].handleIn = [0,midbubble];
		
		// bas gauche
		segmentcolle[3].handleIn = [-deflect,bottombulle+deflect];
		
		
		// bas droite
		segmentcolle[0].handleOut = [deflect,bottombulle+deflect];	

		
	if(distance>bubtaille+midbubble){
		// ARRONDI DES SEGMENTS INFERIEURS !!!
	}
	
	// si les courbes se croisent on arrête la progression de la cire
	if(deflect>stopper) {
		forme.segments = [[0,0],[0,0],[0,0],[0,0]];
	}

// DEBUG
	// segmentcolle[1].selected = true;
	// segmentcolle[2].selected = true;
	// segmentcolle[0].selected = true;
	// segmentcolle[3].selected = true;
	// console.log(segmentcolle[1].location,segmentcolle[3].location);

} // END OF CIRAGE

function focus(bioule,r,g,b){

	var thirdplan=dmaxi-dmini/3;
	var secondplan=thirdplan*1.5;
	var focuswidth=bioule.bounds.width;
	if(focuswidth<thirdplan){
		var blur=0.01;
		bioule.fillColor={
			gradient: {
				stops: [
				["rgba("+r+","+g+","+b+",0.5)",blur],
				["rgba("+r+","+g+","+b+",0)",1]],
				radial: true
			},
			origin: bioule.position,
			destination: bioule.bounds.rightCenter
		}
	}
	else if(focuswidth>thirdplan && focuswidth<secondplan){
		var blur=0.5;
		bioule.fillColor={
			gradient: {
				stops: [
				["rgba("+r+","+g+","+b+",0.6)",blur],
				["rgba("+r+","+g+","+b+",0)",1]],
				radial: true
			},
			origin: bioule.position,
			destination: bioule.bounds.rightCenter
		}
	}
	else if(focuswidth>thirdplan && focuswidth<secondplan){
		var blur=0.65;
		bioule.fillColor={
			gradient: {
				stops: [
				["rgba("+r+","+g+","+b+",0.8)",blur],
				["rgba("+r+","+g+","+b+",0)",1]],
				radial: true
			},
			origin: bioule.position,
			destination: bioule.bounds.rightCenter
		}
	}
	else if(focuswidth>secondplan){
		var blur=1;
		bioule.fillColor="rgba("+r+","+g+","+b+",1)";

		
	}
}

// ----------------------- CONTROLS -------------------------

launcher=true;
$("#animationcontrol").click(function(){
	// on stop l'animation
	if(launcher==true){
		view.detach('frame');
		launcher=false;
		$(this).text("Lancer l'animation du fond");
	}
	else {
		view.attach('frame',gazes);
		launcher=true;
		$(this).text("Arrêter l'animation du fond");
	}
});

}); //END OF DR

	