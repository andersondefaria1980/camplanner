function draw() {
  var canvas = document.getElementById("canvas");

  //EventListener do click do mouse
  canvas.addEventListener('mousedown', onDown, false);
  
  var ctx = canvas.getContext("2d");
  var imgCam = new Image();

  //COORDENADAS PONTA ESQUERDA SUPERIOR ÁREA
  var x = 30;
  var y = 30; 
  var cordAx = 60;
  var cordAy = 205;
  var cordBx = 200;
  var cordBy = 100;
  var larg = 30;
  var prof = 30;

  //Criando a planta - quadrado ou retangulo
  ctx.strokeStyle = "rgba(0,0,0)";
  ctx.lineWidth = 1;
  ctx.strokeRect(x, y , larg*10, prof*10);

  //TRIANGULO IDENTIFICAÇÃO
  ctx.fillStyle = "rgba(255,0,0,0.5)"
  ctx.beginPath();
  //(x,y) ponta 1
  ctx.moveTo(x+10,y+10);  
  //(x,y) ponta 3
  ctx.lineTo(cordAx, cordAy);
  //(x,y) ponta 3
  ctx.lineTo(cordBx, cordBy);
  ctx.fill();


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

  //adicionando o icon de camera
  function desenhaImagem(){
    imgCam.src = "img/cctv.png";
    imgCam.onload = function(){
      ctx.drawImage( imgCam , x, y);
    }
  }

  desenhaImagem();

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

  }

}
