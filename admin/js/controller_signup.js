
app.controller('ControllerSignup', function ($scope, $http) {

    const vm  =  this;
    const valid = new funcValid(); 
    const password = $('input[name=password]');
    const password_conf = $('input[name=password_conf]');
    
    password.mask('999999999');
    password_conf.mask('999999999');

    vm.loading = false;

    vm.cadastar = cadastrar;
    vm.resetSenha = resetSenha;
    vm.formSignup = {};
    vm.formRetrieve = {};

    function resetSenha(){       
        try {

            if (navigator.onLine) {
                vm.loading = true;
                const obj = {
                    action: 2,
                    params : vm.formRetrieve
                }  

                $http.post('service/signup/', obj)
                    .then(function (response) {
                        if(response.data.success){
                            valid.logMyErrors(3,response.data.message);
                            window.open('/ipet/index.php?page=2','_self')
                            vm.loading = false;
                        }else{                            
                            valid.logMyErrors(4,response.data.message);
                            vm.loading = false;
                        }
                    })
                    .catch(function () {
                        valid.logMyErrors(5, 'Error!');
                        vm.loading = false;
                    });
            } else {
                valid.logMyErrors(6);
                vm.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7);
            vm.loading = false;
        }
    }

    function cadastrar (){   
        try {

            if (navigator.onLine) {
                vm.loading = true;
                const obj = {
                    action: 1,
                    params : vm.formSignup 
                }  

                $http.post('service/signup/', obj)
                    .then(function (response) {
                        if(response.data.success){
                            valid.logMyErrors(3,response.data.message);
                            window.open('/ipet/index.php?page=2','_self')
                            vm.loading = false;
                        }else{                            
                            valid.logMyErrors(4,response.data.message);
                            vm.loading = false;
                        }
                    })
                    .catch(function () {
                        valid.logMyErrors(5, 'Error!');
                        vm.loading = false;
                    });
            } else {
                valid.logMyErrors(6);
                vm.loading = false;
            }
        } catch (e) {
            valid.logMyErrors(7);
            vm.loading = false;
        }
    }   
});


app.directive('sameAs', function() { return {
    require : 'ngModel',
    link : function(scope, elm, attrs, ngModelCtrl) {

        ngModelCtrl.$validators.sameAs = function(modelValue, viewValue) {
            var checkedVal = attrs.sameAs;
            var thisInputVal = viewValue;

            if (thisInputVal == checkedVal) {
                return true; // valid
            } else {
                return false;
            }
        };
    }
}; });