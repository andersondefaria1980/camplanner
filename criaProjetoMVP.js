function draw(largura=30, profundidade=30, distancia=0,resolucao=1280, lente=0.36, sensor=0.25, angulo=80.36) {
  console.log("resolucao: " + resolucao);
  console.log("lente: " + lente);
  console.log("sensor: " + sensor);
  console.log("angulo: " + angulo);

  var canvas = document.getElementById("canvas");

  //EventListener do click do mouse
  canvas.addEventListener('mousedown', onDown, false);
  
  var ctx = canvas.getContext("2d");
  var imgCam = new Image();

  //COORDENADAS PONTA ESQUERDA SUPERIOR ÁREA
  var x = 80;
  var y = 80; 

  //valores fixos do DCRI
  var percentD = 0.05;
  var percentC = 0.26;
  var percentR = 0.51;
  var percentI = 0.76;
  
  //informação que o usuário irá inserir
  var larg = largura;
  var prof = profundidade;
  var dist = distancia; 

  //informações que será pego do BD
  var resolucao = resolucao;
  var lente = lente;
  var sensor = sensor;
  var ang = angulo;

  //borda canvas
  ctx.strokeStyle = "rgba(0,0,0)";
  ctx.lineWidth = 1;
  ctx.strokeRect(0,0, 1000, 1000);

  function criaPlanta(){
    //Criando a planta - quadrado ou retangulo
    ctx.strokeStyle = "rgba(0,0,0)";
    ctx.lineWidth = 1;
    ctx.strokeRect(x, y , larg*10, prof*10);
  }
  //Calculo distância focal
  var b = lente/sensor;
  
  //Checkbox de ativação
  var detecCheckbox = document.querySelector('input[value="deteccao"]');
  var classCheckbox = document.querySelector('input[value="classificacao"]');
  var reconCheckbox = document.querySelector('input[value="reconhecimento"]');
  var identCheckbox = document.querySelector('input[value="identificacao"]');
  var distCheckbox = document.querySelector('input[value="distancia"]');


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
    ctx.fillText(larg +"m Largura", ((larg*10)+x)/2, y-3);  
    ctx.fillText(prof+"m Profundidade", larg*10+x+5, ((prof*10)+y)/2);
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

      medidas();

    }

    desenhaImagem();
  }


  //mudando de posição pelo clique
  //*****ARRUMAR PARTE DE MUDAR DE COR POR CLIQUE, COORDENADAS NÃO ESTÃO CORRETAS PELO CLIQUE
  function onDown(event){
    cx = event.pageX;
    cy = event.pageY;

    var calc1 = ((Math.sqrt(Math.pow(cx-x,2)+Math.pow(cy-y,2)))/10).toFixed(2);
    var calc2 = calc1 - 9;
    var distanciaDoClique = parseFloat(calc2.toFixed(2));

    //removendo triângulo
    limpaArea();

    //Cálculo distância da câmera
      var largObj1 = (resolucao/(300*percentD));
      var distT1 = (largObj1*b*0.7); 

      var largObj2 = (resolucao/(300*percentC));
      var distT2 = (largObj2*b*0.7); 

      var largObj3 = (resolucao/(300*percentR));
      var distT3 = (largObj3*b*0.7); 

      var largObj4 = (resolucao/(300*percentI));
      var distT4 = (largObj4*b*0.7); 


    //**arrumar isso aqui
    if(distanciaDoClique  <= distT4){
      ctx.fillStyle = "red"
      var distTF = distT4;
    }else if(distanciaDoClique > distT4 && distanciaDoClique <= distT3){
      ctx.fillStyle = "yellow"
      var distTF = distT3;
    }else if(distanciaDoClique > distT3 && distanciaDoClique <= distT2){ 
      ctx.fillStyle = "green"
      var distTF = distT2;
    }else{
      ctx.fillStyle = "blue"
      var distTF = distT1;
    }

    var catAdjA_F = parseFloat(distTF.toFixed(2)) *10; //cateto adjacente de A
    var varAngularF = (45 - ang/2)/45;
    var varAngularFinalF = (catAdjA_F*varAngularF)/2;


    ctx.beginPath();
    ctx.moveTo(cx-10, cy-110);
    ctx.lineTo(x+varAngularFinalF, y+catAdjA_F - varAngularFinalF);
    //parte de cima (tamanho, angulação)
    ctx.lineTo(x+catAdjA_F - varAngularFinalF, y+varAngularFinalF); 
    ctx.fill();
  

    //Distância do clique até a câmera
    distCheckbox.onchange = function(){
      if(distCheckbox.checked){
        alert("Você está à aproximadamente " + distanciaDoClique + " metros da câmera");
      }    
    }

  }

  limpaArea();
  trianguloD();
  trianguloC();
  trianguloR();
  trianguloI();
  criaPlanta();

//CHECKBOX DETECÇÃO
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

    criaPlanta();
  }

//CHECKBOX CLASSIFICAÇÃO
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
    criaPlanta();
  }
//CHECKBOX RECONHECIMENTO
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
    criaPlanta();
  }

//CHECKBOX IDENTIFICAÇÃO
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
    criaPlanta();
  }

  medidas();
  desenhaImagem();

}
  