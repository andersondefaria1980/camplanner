function draw() {
  var canvas = document.getElementById("canvas");

  //EventListener do click do mouse
  canvas.addEventListener('mousedown', onDown, false);
  
  var ctx = canvas.getContext("2d");
  var imgCam = new Image();

  //COORDENADAS PONTA ESQUERDA SUPERIOR ÁREA
  var x = 30;
  var y = 30; 
  var cordAx = 200;
  var cordAy = 300;
  var cordBx = 300;
  var cordBy = 200;

  var percentD = 0.01;
  var percentC = 0.26;
  var percentR = 0.51;
  var percentI = 0.76;
  
  //informação que o usuário irá inserir
  var larg = 30;
  var prof = 30;
  var dist = 0; 

  //informações que será pego do BD
  var resolucao = 1280;
  var lente = 0.36;
  var sensor = 0.25;
  var ang = 80.36

  //Criando a planta - quadrado ou retangulo
  ctx.strokeStyle = "rgba(0,0,0)";
  ctx.lineWidth = 1;
  ctx.strokeRect(x, y , larg*10, prof*10);

  //Cálculos gerais
  var b = lente/sensor;
  var angb = 180 - 90 - (ang/2); //angulo B
  var angOK = parseFloat(angb.toFixed(2));
  
  function trianguloD(){
    //Cálculo distância da câmera para DETECÇÃO
    var largObj = (resolucao/(300*percentD));
    var distT = (largObj*b*0.7); //cateto adjacente de A
    var catAdjA_D = parseFloat(distT.toFixed(2)); 
    var hipB = catAdjA_D/(Math.sin(angOK)); //hipotenusa é a distancia entre o (x0,y0) e (x,y)
    var catOpostoA_D = Math.sqrt((Math.pow(hipB, 2))-(Math.pow(catAdjA_D, 2))); //achando o cateto oposto A
    var catOpOK = parseFloat(catOpostoA_D.toFixed(2));

    //TRIANGULO DETECÇÃO
    ctx.fillStyle = "rgba(0,0,255,0.5)"
    ctx.beginPath();
    ctx.moveTo(x+10,y+10);  
    ctx.lineTo((catOpOK*10)+x+10, (catAdjA_D*10)+y+10);
    ctx.lineTo((catAdjA_D*10)+y+10, (catOpOK*10)+x+10);
    ctx.fill();
  } 

  function trianguloC(){
    //Cálculo distância da câmera para IDENTIFICAÇÃO
    var largObj = (resolucao/(300*percentC));
    var distT = (largObj*b*0.7); //cateto adjacente de A
    var catAdjA_C = parseFloat(distT.toFixed(2)); 
    var hipB = catAdjA_C/(Math.sin(angOK)); //hipotenusa é a distancia entre o (x0,y0) e (x,y)
    var catOpostoA_C = Math.sqrt((Math.pow(hipB, 2))-(Math.pow(catAdjA_C, 2))); //achando o cateto oposto A
    var catOpOK = parseFloat(catOpostoA_C.toFixed(2));

    //TRIANGULO IDENTIFICAÇÃO
    ctx.fillStyle = "rgba(0,255,0,0.5)"
    ctx.beginPath();
    ctx.moveTo(x+10,y+10);  
    ctx.lineTo((catOpOK*10)+x+10, (catAdjA_C*10)+y+10);
    ctx.lineTo((catAdjA_C*10)+y+10, (catOpOK*10)+x+10);
    ctx.fill();
  }

  function trianguloR(){
    //Cálculo distância da câmera para IDENTIFICAÇÃO
    var largObj = (resolucao/(300*percentR));
    var distT = (largObj*b*0.7); //cateto adjacente de A
    var catAdjA_R = parseFloat(distT.toFixed(2)); 
    var hipB = catAdjA_R/(Math.sin(angOK)); //hipotenusa é a distancia entre o (x0,y0) e (x,y)
    var catOpostoA_R = Math.sqrt((Math.pow(hipB, 2))-(Math.pow(catAdjA_R, 2))); //achando o cateto oposto A
    var catOpOK = parseFloat(catOpostoA_R.toFixed(2));

    //TRIANGULO IDENTIFICAÇÃO
    ctx.fillStyle = "rgba(255,255,0,0.5)"
    ctx.beginPath();
    ctx.moveTo(x+10,y+10);  
    ctx.lineTo((catOpOK*10)+x+10, (catAdjA_R*10)+y+10);
    ctx.lineTo((catAdjA_R*10)+y+10, (catOpOK*10)+x+10);
    ctx.fill();
  }

  function trianguloI(){
    //Cálculo distância da câmera para IDENTIFICAÇÃO
    var largObj = (resolucao/(300*percentI));
    var distT = (largObj*b*0.7); //cateto adjacente de A
    var catAdjA_I = parseFloat(distT.toFixed(2)); 
    var hipB = catAdjA_I/(Math.sin(angOK)); //hipotenusa é a distancia entre o (x0,y0) e (x,y)
    var catOpostoA_I = Math.sqrt((Math.pow(hipB, 2))-(Math.pow(catAdjA_I, 2))); //achando o cateto oposto A
    var catOpOK = parseFloat(catOpostoA_I.toFixed(2));

    //TRIANGULO IDENTIFICAÇÃO
    ctx.fillStyle = "rgba(255,0,0,0.5)"
    ctx.beginPath();
    ctx.moveTo(x+10,y+10);  
    ctx.lineTo((catOpOK*10)+x+10, (catAdjA_I*10)+y+10);
    ctx.lineTo((catAdjA_I*10)+y+10, (catOpOK*10)+x+10);
    ctx.fill();
  }

  function medidas(){
    //ADICIONANDO O QUE É LARGURA E O QUE É PROFUNDIDADE
    ctx.fillStyle = "rgba(0,0,0,0.5)"
    ctx.font = "bold 10px Time New Roman";
    ctx.fillText("Largura", 30, 28);
    ctx.fillText(larg +"m", ((larg*10)+x)/2, y-3);
    ctx.fillText("P",21,40)
    ctx.fillText("r",21,48)
    ctx.fillText("o",21,56)
    ctx.fillText("f",21,64)
    ctx.fillText("u",21,72)
    ctx.fillText("n",21,80)
    ctx.fillText("d",21,88)
    ctx.fillText("i",21,96)
    ctx.fillText("d",21,104)
    ctx.fillText("a",21,112)
    ctx.fillText("d",21,120)
    ctx.fillText("e",21,128)   
    ctx.fillText(y+"m", larg*10+x+5, ((prof*10)+y)/2);
  }

  //adicionando o icon de camera
  function desenhaImagem(){
    imgCam.src = "img/cctv.png";
    imgCam.onload = function(){
      ctx.drawImage( imgCam , x, y);
    }
  }

  //mudando de posição pelo clique
  function onDown(event){
    cx = event.pageX;
    cy = event.pageY;

  //removendo triângulo
    for (var i = 0; i < 5; i++) {
      ctx.fillStyle = "rgba(255,255,255, 1)";
      ctx.fillRect(0,0, 500, 500);

      ctx.strokeStyle = "rgba(0,0,0)";
      ctx.lineWidth = 1;
      ctx.strokeRect(x, y , larg*10, prof*10);

      ctx.fillStyle = "rgba(0,0,0,0.5)"
      ctx.font = "bold 10px Time New Roman";
      ctx.fillText("Largura", 30, 28);
      ctx.fillText(larg +"m", ((larg*10)+x)/2, y-3);
      ctx.fillText("P",21,40)
      ctx.fillText("r",21,48)
      ctx.fillText("o",21,56)
      ctx.fillText("f",21,64)
      ctx.fillText("u",21,72)
      ctx.fillText("n",21,80)
      ctx.fillText("d",21,88)
      ctx.fillText("i",21,96)
      ctx.fillText("d",21,104)
      ctx.fillText("a",21,112)
      ctx.fillText("d",21,120)
      ctx.fillText("e",21,128)   
      ctx.fillText(y+"m", larg*10+x+5, ((prof*10)+y)/2);
    }

    desenhaImagem();

  //MUDANDO A POSIÇÃO DO TRIÂNGULO CONFORME O CLICK
    ctx.fillStyle = "rgba(255,0,0,0.5)"
    ctx.beginPath();
    ctx.moveTo(x+10,y+10);  
    ctx.lineTo(cx-10,cy-10);
    ctx.lineTo(cx+(cordBx - cordAx), cy-(cordAy - cordBy));
    ctx.fill();

  //Sabendo onde esá com click
  //***ADICIONAR DISTANCIA EM METROS A PARTIR DO CLIQUE****
   alert(cx+" "+cy);

  }

  trianguloD();
  trianguloC();
  trianguloR();
  trianguloI();
  medidas();
  desenhaImagem();


}
