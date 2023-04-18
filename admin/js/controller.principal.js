app.controller('ControllerPrincipal', function ($scope, $http, Upload) {

    const pc =  this;
    const valid = new funcValid(); 
    const d = new Date();
    $scope.date = d.getTime();
    pc.mensagemDigitada = "";
    pc.mensagemDigitadaInteracao = "";
    pc.objetoSelecionado = {};
    objetoSelecionadoInteracao = {};
  
    pc.loading = false;    
    pc.url = "view/view.meu_pets.html";
    pc.funcMenu = funcMenu;
    pc.cadastrarStatusPerdido = cadastrarStatusPerdido;
    pc.classActive = 1;

    

    function funcMenu (v,obj){

        switch (v) {
            case 1:
                pc.listagemMensagens = [];
                pc.classActive = 1;
                pc.url = "view/view.meu_pets.html";               
                break;
            case 2:
                pc.url = "view/view.message.html";                  
                funcListaUsuariosResposta(obj);             
                break;
            case 3:   
                pc.classActive = 2;                           
                pc.url = "view/view.interacao.html"; 
                funcListaPetsInteracao();
                break;
            case 4:  
                pc.classActive = 2;                         
                pc.url = "view/view.message_interacao.html";                  
                funcListaMensagensRespostaInteracao(obj);      
                break;
            default:
                pc.classActive = 1;
                pc.url = "view/view.meu_pets.html";               
                break;
        }
    }



    // Novo Pet
    pc.formPet = {};
    pc.formCEP ={};
    pc.cadastrarPet = cadastrarPet;
    pc.funcPerdido = funcPerdido;
    pc.openModalFormPet = openModalFormPet;
    pc.limparDados = limparDados;
    pc.editarPet = editarPet;
    pc.carregarMensagens = carregarMensagens;
    pc.enviarMensagem = enviarMensagem;
    pc.enviarMensagemInteracao = enviarMensagemInteracao;
    pc.listaDePets = [];
    pc.listaDePetsInteracao = [];
    pc.idSelecionado = null;
    pc.listaUsuariosResposta = {};
    pc.listagemMensagens = [];
    pc.listagemMensagensInteracao = [];



    function enviarMensagemInteracao(){
        try {

            if (navigator.onLine) {

                pc.loading = true;    
                           
                const obj = {
                    action: 10,
                    params : {
                        mensagem : pc.mensagemDigitadaInteracao,
                        id_pet_perdido : pc.objetoSelecionadoInteracao.id_pet_perdido,
                        id_user_encontrou : pc.objetoSelecionadoInteracao.id_user_encontrou,
                        id_user_perdeu : pc.objetoSelecionadoInteracao.id_user_perdeu                      
                    }
                } 
                $http.post('service/principal/', obj)
                    .then(function (response) {                        
                        if(response.data.success){  
                            pc.mensagemDigitadaInteracao = '';                          
                            funcListaMensagensRespostaInteracao(pc.objetoSelecionadoInteracao);
                        }else{                                          
                            valid.logMyErrors(4,response.data.message);
                            pc.loading = false;
                        }
                    })
                    .catch(function () {
                        valid.logMyErrors(5, 'Error!');
                        pc.loading = false;
                    });
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7);
            pc.loading = false;
        }  
    }


    function funcListaMensagensRespostaInteracao(obj){
     
        pc.objetoSelecionadoInteracao = obj;
        try {
            if (navigator.onLine) {                
                var postData = {
                    action: 9,
                    params: pc.objetoSelecionadoInteracao
                }
                $http.post('service/principal/', postData)
                    .then(function(response) {
                        if (response.data.success) {                            
                            if(response.data.elements.length > 0){
                                pc.listagemMensagensInteracao = response.data.elements;
                            }else{
                                valid.logMyErrors(3, "Nenhuma mensagem enviada!");
                            }                            
                            pc.loading = false;
                        } else {  
                            pc.listagemMensagensInteracao = [];                         
                            valid.logMyErrors(0);
                            pc.loading = false;
                        }
                    })
                    .catch(function(e) {
                        valid.logMyErrors(2);
                        pc.loading = false;
                    })
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7)
            pc.loading = false;
        }
    }


    function funcListaPetsInteracao(){       
        try {
            if (navigator.onLine) {                
                var postData = {
                    action: 8,
                    params: {     
                       
                    }
                }
                $http.post('service/principal/', postData)
                    .then(function(response) {
                        if (response.data.success) {                            
                            if(response.data.elements.length > 0){
                                pc.listaDePetsInteracao = response.data.elements;                                 
                            }else{
                                valid.logMyErrors(3, "Nenhuma mensagem enviada!");
                            }                            
                            pc.loading = false;
                        } else {  
                            pc.listagemMensagens = [];                         
                            valid.logMyErrors(0);
                            pc.loading = false;
                        }
                    })
                    .catch(function(e) {
                        valid.logMyErrors(2);
                        pc.loading = false;
                    })
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7)
            pc.loading = false;
        }
    }

    // function listarPets(v){
    //     try {
    //         if (navigator.onLine) {                
    //             var postData = {
    //                 action: 1,
    //                 params: {      
    //                     perdido : null                 
    //                 }
    //             }
    //             $http.post('service/principal/', postData)
    //                 .then(function(response) {
    //                     if (response.data.success) {
    //                         pc.listaDePets = response.data.elements;                                                       
    //                         valid.logMyErrors(0);
    //                         if(v == 1){
    //                             $('#modalFormPet').modal('hide');
    //                         } 
    //                         pc.loading = false;
    //                     } else {                           
    //                         valid.logMyErrors(0);
    //                         pc.loading = false;
    //                     }
    //                 })
    //                 .catch(function(e) {
    //                     valid.logMyErrors(2);
    //                     pc.loading = false;
    //                 })
    //         } else {
    //             valid.logMyErrors(6);
    //             pc.loading = false;
    //         }
    //     } catch (e) {
    //         valid.logMyErrors(7)
    //         pc.loading = false;
    //     }
    // }


    function enviarMensagem(){       
       
        try {

            if (navigator.onLine) {

                pc.loading = true;    
                           
                const obj = {
                    action: 7,
                    params : {
                        mensagem : pc.mensagemDigitada,
                        id_pet_perdido : pc.objetoSelecionado.id_pet_perdido,
                        id_user_encontrou : pc.objetoSelecionado.id_user_encontrou,
                        id_user_perdeu : pc.objetoSelecionado.id_user_perdeu                      
                    }
                } 
                $http.post('service/principal/', obj)
                    .then(function (response) {                        
                        if(response.data.success){  
                            pc.mensagemDigitada = '';                          
                            carregarMensagens(pc.objetoSelecionado);
                        }else{                                          
                            valid.logMyErrors(4,response.data.message);
                            pc.loading = false;
                        }
                    })
                    .catch(function () {
                        valid.logMyErrors(5, 'Error!');
                        pc.loading = false;
                    });
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7);
            pc.loading = false;
        }       
    }

    function carregarMensagens(obj){
        pc.objetoSelecionado = obj;

        try {
            if (navigator.onLine) {                
                var postData = {
                    action: 6,
                    params: {      
                        id_pet_perdido: obj.id_pet_perdido,                              
                        id_user_encontrou: obj.id_user_encontrou
                    }
                }
                $http.post('service/principal/', postData)
                    .then(function(response) {
                        if (response.data.success) {                            
                            if(response.data.elements.length > 0){
                                pc.listagemMensagens = response.data.elements;
                            }else{
                                valid.logMyErrors(3, "Nenhuma mensagem enviada!");
                            }                            
                            pc.loading = false;
                        } else {  
                            pc.listagemMensagens = [];                         
                            valid.logMyErrors(0);
                            pc.loading = false;
                        }
                    })
                    .catch(function(e) {
                        valid.logMyErrors(2);
                        pc.loading = false;
                    })
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7)
            pc.loading = false;
        }
    }

    function openModalFormPet(){
        const idade =  $('input[name=idade]');
        idade.mask('9999');
        pc.formPet = {};
        $('#modalFormPet').modal('show');
    }

    function limparDados(){
        pc.formPet = {};
    }


    function editarPet(pet){
        pc.formPet = {};
        $object = angular.copy(pet);
        pc.formPet.nome = $object['nome'];
        pc.formPet.especie = $object['especie'];
        pc.formPet.raca = $object['raca'];
        pc.formPet.idade = $object['idade'];
        pc.formPet.sexo = String($object['sexo']);
        pc.formPet.predominante = $object['predominante'];
        pc.formPet.idpets = $object['idpets'];
        pc.formPet.iduser = $object['iduser'];
        pc.formPet.path_img = "/ipet/internetFiles/profilePet_"+$object['iduser']+$object['idpets']+".jpg?"+$scope.date;      
       
        $('#modalFormPet').modal('show');
    }

    function cadastrarStatusEncontrado(){       

        if(!pc.idSelecionado){
            valid.logMyErrors(4,'Pet não encontrado!');
            return false;
        }

        try {

            if (navigator.onLine) {

                pc.loading = true;    
                           
                const obj = {
                    action: 4,
                    params : {
                        idpet : pc.idSelecionado
                    }
                } 

                pc.idSelecionado = null;

                $http.post('service/principal/', obj)
                    .then(function (response) {                        
                        if(response.data.success){
                            // valid.logMyErrors(3,response.data.message);         
                            // setTimeout(function(){
                                listarPets();   
                            // }, 1000);
                        }else{                                          
                            valid.logMyErrors(4,response.data.message);
                            pc.loading = false;
                        }
                    })
                    .catch(function () {
                        valid.logMyErrors(5, 'Error!');
                        pc.loading = false;
                    });
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7);
            pc.loading = false;
        }

    }
  

    function cadastrarStatusPerdido(){

        pc.formCEP.idpet = pc.idSelecionado;

        if(!pc.formCEP.idpet){
            valid.logMyErrors(4,'Pet não encontrado!');
            return false;
        }

        try {

            if (navigator.onLine) {

                pc.loading = true;    
                           
                const obj = {
                    action: 3,
                    params : pc.formCEP
                }  

                $('#modalPerdidoConfirmar').modal('hide');
                pc.formCEP ={};
                pc.idSelecionado = null;

                $http.post('service/principal/', obj)
                    .then(function (response) {                        
                        if(response.data.success){
                            // valid.logMyErrors(3,response.data.message);         
                            // setTimeout(function(){
                                listarPets();   
                            // }, 1000);
                        }else{                                          
                            valid.logMyErrors(4,response.data.message);
                            pc.loading = false;
                        }
                    })
                    .catch(function () {
                        valid.logMyErrors(5, 'Error!');
                        pc.loading = false;
                    });
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7);
            pc.loading = false;
        }
    }

    function funcPerdido(val,id){

        pc.idSelecionado = id;

        if(val == 1){
            Swal.fire({
                title: "Que notícia boa!",
                text: "Agora é só clicar em Confirmar",
                icon: "success",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confimar'
                }).then((result) => {
                if (result.isConfirmed) {                   
                    cadastrarStatusEncontrado();
                }
            });
        }else{
            Swal.fire({
                title: "Perdeu seu Pet?",
                // text: "Perdeu seu Pet?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim'
                }).then((result) => {
                if (result.isConfirmed) {  
                    pc.formCEP ={};                   
                    const cep = $('input[name=cep]');
                          cep.mask('99999-999');               
                    $('#modalPerdidoConfirmar').modal('show');
                }
            });
        }
    }

    function cadastrarPet(){       

        try {
            if (navigator.onLine) {
                pc.loading = true;
                var file = pc.formPet.photo;
                Upload.upload({
                    url: 'service/principal/',
                    method: 'POST',
                    file: file,
                    data: {
                        action: 2,
                        params: pc.formPet
                    }
                })
                .then(function(response){                   
                    if (response.data.success) {
                        valid.logMyErrors(3,response.data.message); 
                        let d = new Date();
                        $scope.date = d.getTime();
                        setTimeout(function(){                          
                            listarPets(1);  
                            $scope.$apply();
                        }, 500);
                    }else{
                        valid.logMyErrors(4,response.data.message);
                        pc.loading = false;
                    }
                })
                .catch(function(response) {
                    valid.logMyErrors(5, response.data.message);
                    pc.loading = false;
                });

            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7);
            pc.loading = false;
        }
    }

    function listarPets(v){
        try {
            if (navigator.onLine) {                
                var postData = {
                    action: 1,
                    params: {      
                        perdido : null                 
                    }
                }
                $http.post('service/principal/', postData)
                    .then(function(response) {
                        if (response.data.success) {
                            pc.listaDePets = response.data.elements;                                                       
                            valid.logMyErrors(0);
                            if(v == 1){
                                $('#modalFormPet').modal('hide');
                            } 
                            pc.loading = false;
                        } else {                           
                            valid.logMyErrors(0);
                            pc.loading = false;
                        }
                    })
                    .catch(function(e) {
                        valid.logMyErrors(2);
                        pc.loading = false;
                    })
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7)
            pc.loading = false;
        }
    }

    function funcListaUsuariosResposta(obj){      
        try {
            if (navigator.onLine) {                
                var postData = {
                    action: 5,
                    params: {      
                        idpets: obj.idpets                              
                    }
                }
                $http.post('service/principal/', postData)
                    .then(function(response) {
                        if (response.data.success) {
                            if(response.data.elements.length > 0){
                                pc.listaUsuariosResposta = response.data.elements;
                            }else{
                                valid.logMyErrors(3, "Nenhuma mensagem enviada!");
                            }                            
                            pc.loading = false;
                        } else {  
                            pc.listaUsuariosResposta = [];                         
                            valid.logMyErrors(0);
                            pc.loading = false;
                        }
                    })
                    .catch(function(e) {
                        valid.logMyErrors(2);
                        pc.loading = false;
                    })
            } else {
                valid.logMyErrors(6);
                pc.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7)
            pc.loading = false;
        }
    }


    function init(){
        pc.loading = true;
        listarPets();
    }

    init();


});