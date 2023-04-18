
app.controller('ControllerSite', function ($scope, $http,$sce) {

    const st  =  this;
    const valid = new funcValid(); 

    st.openModalEncontrei = openModalEncontrei;
    st.enviar = enviar;
    st.listaDePets = []; 
    st.modelEncontrei = {}; 
    st.dadoSelecionado = {};  
  
    st.loading = false;

    tel.mask('(00) 0000-0000');



    function openModalEncontrei(obj){        
        st.modelEncontrei = {}; 
        st.dadoSelecionado = {};  
        st.dadoSelecionado = obj;       
        $('#openModalEncontrei').modal('show');        
    }

    function enviar(){     

        st.modelEncontrei.idpets = st.dadoSelecionado.idpets
        st.modelEncontrei.iduser = st.dadoSelecionado.iduser

        try {
            if (navigator.onLine) {  
                st.loading = true;            
                var postData = {
                    action: 2,
                    params: st.modelEncontrei
                }
                $http.post('site/service/principal/', postData)
                    .then(function(response) {
                        if (response.data.success) {
                            valid.logMyErrors(3,response.data.message);
                            st.loading = false;
                        } else {        
                            valid.logMyErrors(4,response.data.message);   
                            st.loading = false;
                        }
                        $('#openModalEncontrei').modal('hide');       
                    })
                    .catch(function(e) {
                        valid.logMyErrors(2);
                        st.loading = false;
                    })
            } else {
                valid.logMyErrors(6);
                st.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7)
            st.loading = false;
        }
    }


    

    function listarPets(){
        try {
            if (navigator.onLine) {  
                st.loading = true;            
                var postData = {
                    action: 1,
                    params: {      
                        perdido : 1                 
                    }
                }
                $http.post('site/service/principal/', postData)
                    .then(function(response) {
                        if (response.data.success) {
                            st.listaDePets = response.data.elements;  
                            st.listaDePets.forEach( (element, i) => {                                
                                st.listaDePets[i].location = $sce.trustAsResourceUrl("https://www.google.com.br/maps?q="+element.cep+",%20Brasil&output=embed");
                            });
                            st.loading = false;
                            $('.isotope').removeClass('fadeIn').attr('style','overflow:inherit');
                            valid.logMyErrors(0);                            
                        } else {                           
                            valid.logMyErrors(0);
                            st.loading = false;
                        }
                    })
                    .catch(function(e) {
                        valid.logMyErrors(2);
                        st.loading = false;
                    })
            } else {
                valid.logMyErrors(6);
                st.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7)
            st.loading = false;
        }
    }

    function init(){
        listarPets();
    }

    init();
});

