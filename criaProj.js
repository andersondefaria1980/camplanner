function draw() {
  var canvas = document.getElementById("canvas");

  //EventListener do click do mouse
  canvas.addEventListener('mousedown', onDown, false);
  
  var ctx = canvas.getContext("2d");
  var imgCam = new Image();

  //COORDENADAS PONTA ESQUERDA SUPERIOR ÁREA
  var x = 100;
  var y = 100; 

  //valores fixos do DCRI
  var percentD = 0.05;
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
  var ang = 80;

  //borda canvas
  ctx.strokeStyle = "rgba(0,0,0)";
  ctx.lineWidth = 1;
  ctx.strokeRect(0,0, 1000, 1000);

  //Criando a planta - quadrado ou retangulo
  ctx.strokeStyle = "rgba(0,0,0)";
  ctx.lineWidth = 1;
  ctx.strokeRect(x, y , larg*10, prof*10);

  //Calculo distância focal
  var b = lente/sensor;
  
  //Checkbox de ativação
  var detecCheckbox = document.querySelector('input[value="detec"]');
  var classCheckbox = document.querySelector('input[value="class"]');
  var reconCheckbox = document.querySelector('input[value="recon"]');
  var identCheckbox = document.querySelector('input[value="ident"]');

  function trianguloD(){
    //Cálculo distância da câmera para IDENTIFICAÇÃO
    var largObjD = (resolucao/(300*percentD));
    var distTD = (largObjD*b*0.7); 
    var catAdjA_ID = parseFloat(distTD.toFixed(2)) *10; //cateto adjacente de A

    //TRABALHANDO A VARIAÇÃO ANGULAR
    var varAngularD = (45 - ang/2)/45;
    var varAngularFinalD = (catAdjA_ID*varAngularD)/2;

    //TRIANGULO IDENTIFICAÇÃO
    ctx.fillStyle = "blue"
    ctx.beginPath();
    ctx.moveTo(x,y);
    //parte de baixo  (angulacao, tamanho) -- para deixar do mesmo tamanho o triangulo diminui 
    //de um lado e aumenta do outro
    ctx.lineTo(x+varAngularFinalD, y+catAdjA_ID - varAngularFinalD);
    //parte de cima (tamanho, angulação)
    ctx.lineTo(x+catAdjA_ID - varAngularFinalD, y+varAngularFinalD);
    ctx.fill();

  }
  
  function trianguloC(){
    //Cálculo distância da câmera para IDENTIFICAÇÃO
    var largObjC = (resolucao/(300*percentC));
    var distTC = (largObjC*b*0.7); 
    var catAdjA_C = parseFloat(distTC.toFixed(2)) *10; //cateto adjacente de A

    //TRABALHANDO A VARIAÇÃO ANGULAR
    var varAngularC = (45 - ang/2)/45;
    var varAngularFinalC = (catAdjA_C*varAngularC)/2;

    //TRIANGULO IDENTIFICAÇÃO
    ctx.fillStyle = "lime"
    ctx.beginPath();
    ctx.moveTo(x,y);
    //parte de baixo  (angulacao, tamanho) -- para deixar do mesmo tamanho o triangulo diminui 
    //de um lado e aumenta do outro
    ctx.lineTo(x+varAngularFinalC, y+catAdjA_C - varAngularFinalC);
    //parte de cima (tamanho, angulação)
    ctx.lineTo(x+catAdjA_C - varAngularFinalC, y+varAngularFinalC);
    ctx.fill();

  }

  function trianguloR(){
    //Cálculo distância da câmera para IDENTIFICAÇÃO
    var largObjR = (resolucao/(300*percentR));
    var distTR = (largObjR*b*0.7); 
    var catAdjA_R = parseFloat(distTR.toFixed(2)) *10; //cateto adjacente de A

    //TRABALHANDO A VARIAÇÃO ANGULAR
    var varAngularR = (45 - ang/2)/45;
    var varAngularFinalR = (catAdjA_R*varAngularR)/2;

    //TRIANGULO IDENTIFICAÇÃO
    ctx.fillStyle = "yellow"
    ctx.beginPath();
    ctx.moveTo(x,y);
    //parte de baixo  (angulacao, tamanho) -- para deixar do mesmo tamanho o triangulo diminui 
    //de um lado e aumenta do outro
    ctx.lineTo(x+varAngularFinalR, y+catAdjA_R - varAngularFinalR);
    //parte de cima (tamanho, angulação)
    ctx.lineTo(x+catAdjA_R - varAngularFinalR, y+varAngularFinalR);
    ctx.fill();

  }

  function trianguloI(){
    //Cálculo distância da câmera para IDENTIFICAÇÃO
    var largObj = (resolucao/(300*percentI));
    var distT = (largObj*b*0.7); 
    var catAdjA_I = parseFloat(distT.toFixed(2)) *10; //cateto adjacente de A

    //TRABALHANDO A VARIAÇÃO ANGULAR
    var varAngular = (45 - ang/2)/45;
    var varAngularFinal = (catAdjA_I*varAngular)/2;

    //TRIANGULO IDENTIFICAÇÃO
    ctx.fillStyle = "red"
    ctx.beginPath();
    ctx.moveTo(x,y);
    //parte de baixo  (angulacao, tamanho) -- para deixar do mesmo tamanho o triangulo diminui 
    //de um lado e aumenta do outro
    ctx.lineTo(x+varAngularFinal, y+catAdjA_I - varAngularFinal);
    //parte de cima (tamanho, angulação)
    ctx.lineTo(x+catAdjA_I - varAngularFinal, y+varAngularFinal);
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
    ctx.fillText(prof+"m", larg*10+x+5, ((prof*10)+y)/2);
  }

  //adicionando o icon de camera
  function desenhaImagem(){
    imgCam.src = "img/cctv.png";
    imgCam.onload = function(){
      ctx.drawImage( imgCam , x, y);
    }
  }

  function limpaArea(){
    //removendo triângulo
    for (var i = 0; i < 5; i++) {
      ctx.fillStyle = "rgba(255,255,255, 1)";
      ctx.fillRect(0,0, 1000,1000);

      ctx.strokeStyle = "rgba(0,0,0)";
      ctx.lineWidth = 1;
      ctx.strokeRect(0,0,1000,1000);
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
  }

  //mudando de posição pelo clique
  function onDown(event){
    cx = event.pageX;
    cy = event.pageY;

    //removendo triângulo
    limpaArea();

    //MUDANDO A POSIÇÃO DO TRIÂNGULO CONFORME O CLICK
    ctx.fillStyle = "rgba(255,0,0,0.5)"
    ctx.beginPath();
    ctx.moveTo(x+10,y+10);
    ctx.lineTo(cx, cy-25);
    ctx.lineTo(cy-25, cx);

    ctx.fill();

    //Sabendo onde esá com click
    //***ADICIONAR DISTANCIA EM METROS A PARTIR DO CLIQUE****
    //alert(cx+" "+cy);
  }

  trianguloD();
  trianguloC();
  trianguloR();
  trianguloI();

//AJEITAR A PARTE DE SELEÇÃO E DESELEÇÃO(CORES SE PERDENDO)
  detecCheckbox.onchange = function() {
    if(detecCheckbox.checked) {
      limpaArea();
      trianguloD();
      if(classCheckbox.checked) {      
        trianguloD();
        trianguloC();
      } 
      if(reconCheckbox.checked) {
        trianguloD();
        trianguloR();
      }
      if(identCheckbox.checked) {
        trianguloD();
        trianguloI();
      }

      if(classCheckbox.checked && reconCheckbox.checked) {
        trianguloD();
        trianguloC();
        trianguloR();
      } 
      if(classCheckbox.checked && identCheckbox.checked) {
        trianguloD();
        trianguloC();
        trianguloI();
      }
      if(identCheckbox.checked && reconCheckbox.checked) {
        trianguloD();
        trianguloR();
        trianguloI();
      }
      if(identCheckbox.checked && reconCheckbox.checked && classCheckbox.checked){
        trianguloD();
        trianguloC();
        trianguloR();
        trianguloI();
      }

    }else{
      limpaArea();
      if(classCheckbox.checked) {
        trianguloC();
      } 
      if(reconCheckbox.checked) {
        trianguloR();
      }
      if(identCheckbox.checked) {
        trianguloI();
      }
      if(classCheckbox.checked && reconCheckbox.checked) {
        trianguloC();
        trianguloR();
      } 
      if(classCheckbox.checked && identCheckbox.checked) {
        trianguloC();
        trianguloI();
      }
      if(identCheckbox.checked && reconCheckbox.checked) {
        trianguloR();
        trianguloI();
      }
      if(identCheckbox.checked && reconCheckbox.checked && classCheckbox.checked){
        trianguloC();
        trianguloR();
        trianguloI();
      }
    }
  }

  classCheckbox.onchange = function() {
    if(classCheckbox.checked) {
      limpaArea();
      trianguloC();
      if(detecCheckbox.checked) {
        trianguloD();
        trianguloC();

      } 
      if(reconCheckbox.checked) {
        trianguloC();
        trianguloR();
      }
      if(identCheckbox.checked) {
        trianguloC();
        trianguloI();
      }

      if(detecCheckbox.checked && reconCheckbox.checked) {
        trianguloD();
        trianguloC();
        trianguloR();
      } 
      if(detecCheckbox.checked && identCheckbox.checked) {
        trianguloD();
        trianguloC();
        trianguloI();
      }
      if(identCheckbox.checked && reconCheckbox.checked) {
        trianguloC();
        trianguloR();
        trianguloI();
      }
      if(identCheckbox.checked && reconCheckbox.checked && detecCheckbox.checked){
        trianguloD();
        trianguloC();
        trianguloR();
        trianguloI();
      }


      }else{
        limpaArea();
        if(detecCheckbox.checked) {
          trianguloD();
        }if(reconCheckbox.checked) {
          trianguloR();
        }if(identCheckbox.checked) {
          trianguloI();
        }
      if(detecCheckbox.checked && reconCheckbox.checked) {
        trianguloD();
        trianguloR();
      } 
      if(detecCheckbox.checked && identCheckbox.checked ) {
        trianguloD();
        trianguloI();
      }
      if(identCheckbox.checked && reconCheckbox.checked) {
        trianguloR();
        trianguloI();
      }
      if(identCheckbox.checked && reconCheckbox.checked && detecCheckbox.checked){
        trianguloD();
        trianguloR();
        trianguloI();
      }
      }
  }

  reconCheckbox.onchange = function() {
    if(reconCheckbox.checked) {
      limpaArea();
      trianguloR();

      
      if(detecCheckbox.checked) {
        trianguloD();
        trianguloR();
      }
      if(classCheckbox.checked) {
        trianguloC();
        trianguloR();
      } 
      if(identCheckbox.checked) {
        trianguloR();
        trianguloI();
      }

      if(classCheckbox.checked && detecCheckbox.checked) {
        trianguloD();
        trianguloC();
        trianguloR();
      } 
      if(classCheckbox.checked && identCheckbox.checked) {
        trianguloC();
        trianguloR();
        trianguloI();
      }
      if(identCheckbox.checked && detecCheckbox.checked) {
        trianguloD();
        trianguloR();
        trianguloI();
      }
      if(identCheckbox.checked && classCheckbox.checked && detecCheckbox.checked){
        trianguloD();
        trianguloC();
        trianguloR();
        trianguloI();
      }

    }else{
      limpaArea();
      if(detecCheckbox.checked) {
        trianguloD();
      }if(classCheckbox.checked) {
        trianguloC();
      }if(identCheckbox.checked) {
        trianguloI();
      }
      if(classCheckbox.checked && detecCheckbox.checked) {
        trianguloD();
        trianguloC();
      } 
      if(classCheckbox.checked && identCheckbox.checked) {
        trianguloC();
        trianguloI();
      }
      if(identCheckbox.checked && detecCheckbox.checked) {
        trianguloD();
        trianguloI();
      }
      if(identCheckbox.checked && classCheckbox.checked && detecCheckbox.checked){
        trianguloD();
        trianguloC();
        trianguloI();
      }
    }
  }

  identCheckbox.onchange = function() {
    if(identCheckbox.checked) {
      limpaArea();
      trianguloI();
      if(detecCheckbox.checked) {
        trianguloD();
        trianguloI();
      }
      if(classCheckbox.checked) {
        trianguloC();
        trianguloI();
      } 
      if(reconCheckbox.checked) {
        trianguloR();
        trianguloI();
      }

      if(classCheckbox.checked && reconCheckbox.checked) {
        trianguloC();
        trianguloR();
        trianguloI();
      } 
      if(classCheckbox.checked && detecCheckbox.checked) {
        trianguloD();
        trianguloC();
        trianguloI();
      }
      if(detecCheckbox.checked && reconCheckbox.checked) {
        trianguloD();
        trianguloR();
        trianguloI();
      }
      if(detecCheckbox.checked && reconCheckbox.checked && classCheckbox.checked){
        trianguloD();
        trianguloC();
        trianguloR();
        trianguloI();
      }

    }else{
      limpaArea();
      if(detecCheckbox.checked) {
        trianguloD();
      }if(classCheckbox.checked) {
        trianguloC();
      }if(reconCheckbox.checked) {
        trianguloR();
      }
      if(classCheckbox.checked && reconCheckbox.checked) {
        trianguloC();
        trianguloR();
      } 
      if(classCheckbox.checked && detecCheckbox.checked) {
        trianguloD();
        trianguloC();
      }
      if(detecCheckbox.checked && reconCheckbox.checked) {
        trianguloD();
        trianguloR();
      }
      if(detecCheckbox.checked && reconCheckbox.checked && classCheckbox.checked){
        trianguloD();
        trianguloC();
        trianguloR();
      }

    }
  }

  medidas();
  desenhaImagem();

}
  