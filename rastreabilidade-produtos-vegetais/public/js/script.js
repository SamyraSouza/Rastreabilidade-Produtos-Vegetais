function aleatorio(){

    var codigo = Math.floor(Math.random() * 99999) + 1;

    console.log(codigo);

    var aleatorio = document.querySelector('#code');

    aleatorio.value = "PRD-" + codigo;

}