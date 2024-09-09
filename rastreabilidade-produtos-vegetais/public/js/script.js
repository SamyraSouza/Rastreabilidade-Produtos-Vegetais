//fazer código aleatório produto
function aleatorio(){

    var codigo = Math.floor(Math.random() * 99999) + 1;


    var aleatorio = document.querySelector('#codeproduct');

    aleatorio.value = "PRD-" + codigo;

}

function mostrar(){
  var menu = document.getElementById('menu');
  
  if (menu.style.display === "none" || menu.style.display === "") {
    menu.style.display = "block"; 
  } else {
    menu.style.display = "none"; 
  }

}

function cadastro(){
  var entrar = document.getElementById('entrar');
  
  if (entrar.style.display === "none" || entrar.style.display === "") {
    entrar.style.display = "block"; 
  } else {
    entrar.style.display = "none"; 
  }

}

//fazer código aleatório lote
function aleatoriolote(){

    var codigo = Math.floor(Math.random() * 99999) + 1;

    var aleatorio = document.querySelector('#codebatch');

    aleatorio.value = "LOT-" + codigo;

}

//select de produtos
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});


//Check-in inativar produto
function inativar(id){
    Swal.fire({
        title: "Tem certeza?",
        text: "Se você inativar o produto irá inativar o lote!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Inativar"
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/products/inativar/"+id;
        }
      });
}

function inativarsobre(id){
    Swal.fire({
        title: "Tem certeza?",
        text: "Se você inativar o produto irá inativar o lote!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Inativar"
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/products/inativarsobre/"+id;
        }
      });
}


//Check-in ativar lote
function ativar(id){
    Swal.fire({
        title: "Tem certeza?",
        text: "Se você ativar o lote, irá ativar o produto!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ativar"
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/batchs/ativar/"+id;
        }
      });
}

function ativarsobre(id){
    Swal.fire({
        title: "Tem certeza?",
        text: "Se você ativar o lote, irá ativar o produto!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ativar"
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/batchs/ativarsobre/"+id;
        }
      });
}

function deletarmovimentacao(id){
  Swal.fire({
      title: "Tem certeza?",
      text: "Você está deletando a movimentação!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Deletar"
    }).then((result) => {
      if (result.isConfirmed) {
          window.location.href = "/movement/delete/"+id;
      }
    });
}

function mudarimagem() {
  var fotinha = document.getElementById('fotinha');
  var edite = document.getElementById('editar');
  var teste = document.getElementById('foto');
  var enviar = document.getElementById('enviar');

  edite.style.display = 'none';
  fotinha.style.display = 'none';
  teste.style.display = 'block';
  enviar.style.display = 'block';

}

function mudarsenha(){

  Swal.fire({
    title: "Digite sua nova senha: ",
    input: "password",
    inputAttributes: {
      autocapitalize: "off"
    },
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    confirmButtonText: "Mudar",
    showLoaderOnConfirm: true,
    preConfirm: async (senha) => {
      try {
        var senha = `${senha}`;

        window.location.href = "/senha/"+senha;

      } catch (error) {
        Swal.showValidationMessage(`
          Request failed: ${error}
        `);
      }
    }
    });
    
} 


function esqueceusenha(){

  Swal.fire({
    title: "Digite seu email: ",
    input: "text",
    inputAttributes: {
      autocapitalize: "off"
    },
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    confirmButtonText: "Mandar",
    showLoaderOnConfirm: true,
    preConfirm: async (email) => {
      try {
        var email = `${email}`;

        window.location.href = "/forgotpassword/"+email;

      } catch (error) {
        Swal.showValidationMessage(`
          Request failed: ${error}
        `);
      }
    }
    });
    
} 

// validar email
$('#emailcadas').blur(function (e) { 


  e.preventDefault();

  var u_email = $('#emailcadas').val();

  $.ajax({ 
      url: '/validar',
      method: 'GET' ,
      data: {email: u_email},
      dataType:'json'

  }).done(function(result){
      if(result==1){
          Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Este email já está cadastrado!",         
            });

      $('#bot').hide();
        
      }   
      else{
      $('#bot').show();
  
  }
  });
});

// validar código produto
$('#codeproduct').blur(function (e) { 

  e.preventDefault();

  var code = $('#codeproduct').val();

  $.ajax({ 
      url: '/validarproduto',
      method: 'GET' ,
      data: {code: code},
      dataType:'json'

  }).done(function(result){
      if(result!="n"){
          Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Este código já está cadastrado em outro produto!", 
              html: `<a href="/products/`+result+`" autofocus>Ver Produto</a>`,          
            });

      $('#bot').hide();
        
      }   
      else{
      $('#bot').show();
  
  }
  });
});

// validar código lote
$('#codebatch').blur(function (e) { 

  e.preventDefault();

  var code = $('#codebatch').val();

  $.ajax({ 
      url: '/validarlote',
      method: 'GET' ,
      data: {code: code},
      dataType:'json'

  }).done(function(result){
      if(result!="n"){
          Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Este código já está cadastrado em outro lote!", 
              html: `<a href="/batch/`+result+`" autofocus>Ver Lote</a>`,          
            });

      $('#bot').hide();
        
      }   
      else{
      $('#bot').show();
  
  }
  });
});

function saveAsPNG() {

  var element =  document.getElementById('qrcode');

  html2canvas(element).then(function(canvas) {
    const link = document.createElement('a');
    link.href = canvas.toDataURL("/img");
    link.download = 'qrcode.png';
    link.click();
  });
}


function abrir(){
  var lado = document.getElementById('lado');

  if (lado.style.display === "none" || lado.style.display === "") {
    lado.style.display = "block"; 
  } else {
    lado.style.display = "none"; 
  }

}


