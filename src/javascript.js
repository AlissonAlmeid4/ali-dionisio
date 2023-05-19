//  src="src/jQuery-Mask-Plugin-master/src/jquery.mask.js" 
//  src="src/jquery-3.6.0.min.js"


// if(x < DataAtual){
//     alert("è o que é ")
// };

function enter(){
    //var x = document.getElementById("Login").value;
    window.location.href = "intranet.php";    
}
function login(){
    window.location.href = "../publico/login.php";
}
function cancelar(){
    window.location.href = "../publico/index.php";
}
function cancelarMorador() {
    window.location.href = "../intranet/moradores.php";
}
function cancelarIntra() {
    window.location.href = "../intranet/intranet.php";
}
function cancelarUsuario() {
    window.location.href = "../intranet/usuarios.php";
}
function cancelarSalao() {
    window.location.href = "../intranet/salao.php";
}
function cancelarVaga() {
    window.location.href = "../intranet/minhaVaga.php";
}
function consuhisto() {
    window.location.href = "../intranet/consultarHistorico.php";
}
function meuCadastro(){
    window.location.href = "meuCadastro.php";
}
function cadastrar() {
    window.location.href = "cadMorador.php";
}
function cadUsuario(){
    window.location.href = "cadUsuario.php";
}
function alterUsuario() {
    window.location.href = "alterUsuario.php";
}

function voltarCadVeiculo() {
    window.location.href = "cadVeiculo.php";
}
function cadastrarVaga(){
    window.location.href = "cadVaga.php";
}

function ValidarCPF(Objcpf) {
    var cpf = Objcpf.value;
    exp = /\.|\-/g
    cpf = cpf.toString().replace(exp, "");
    var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
    var soma1 = 0, soma2 = 0;
    var vlr = 11;

    for (i = 0; i < 9; i++) {
        soma1 += eval(cpf.charAt(i) * (vlr - 1));
        soma2 += eval(cpf.charAt(i) * vlr);
        vlr--;
    }
    soma1 = (((soma1 * 10) % 11) == 10 ? 0 : ((soma1 * 10) % 11));
    soma2 = (((soma2 + (2 * soma1)) * 10) % 11);

    var digitoGerado = (soma1 * 10) + soma2;
    if (digitoGerado != digitoDigitado)
        alert('CPF Invalido!');
}

document.onreadystatechange = () => {
    const field1 = document.getElementById("horaInicio");
    const field2 = document.getElementById("horaTermino");
  field1.addEventListener("change", function () {
    field2.value = field1.value;
  });

};
