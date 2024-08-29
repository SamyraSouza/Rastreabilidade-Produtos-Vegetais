//fazer código aleatório produto
function aleatorio(){

    var codigo = Math.floor(Math.random() * 99999) + 1;

    console.log(codigo);

    var aleatorio = document.querySelector('#code');

    aleatorio.value = "PRD-" + codigo;

}

//fazer código aleatório lote
function aleatoriolote(){

    var codigo = Math.floor(Math.random() * 99999) + 1;

    console.log(codigo);

    var aleatorio = document.querySelector('#code');

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
      confirmButtonText: "Deletar"
    }).then((result) => {
      if (result.isConfirmed) {
          window.location.href = "/movement/delete/"+id;
      }
    });
}

