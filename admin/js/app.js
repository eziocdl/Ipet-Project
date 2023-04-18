var app = angular.module('app', ['ngFileUpload']);

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "300",
    "timeOut": "3000",
    "extendedTimeOut": "300",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
} 


function funcValid(){   
	
	this.logMyErrors = function (id,msn =''){ 		

		switch (id) {
			case 1:
				toastr.warning("Você precisa preencher os campos obrigatórios * ","Oops...!");
				break;
			case 2:
				toastr.error("Não foi possível estabelecer uma conexão com o Banco de Dados. Conecte-se à internet e tente novamente.","Houve um erro!");
				break;
			case 3:
				toastr.success(msn,'Sucesso!');
				break;
			case 4:
				toastr.warning(msn,'Oops...!');
				break;
			case 5:
				toastr.error(msn,'Oops...!');
				break;
			case 6:
				toastr.warning("Conecte-se à internet e tente novamente.","Você está Offline!");
				break;
			case 7:
				toastr.error("Por favor entre em contato com o suporte técnico.","Houve um erro!");
				break;
			case 8:
				toastr.warning("Nenhum resultado encontrado.",'Oops...!');
				break;
			default:
				break;
		}
	}  
}

