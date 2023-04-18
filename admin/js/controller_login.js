
app.controller('ControllerLogin', function ($scope, $http) {

    const vm  =  this;
    const valid = new funcValid(); 
    const password = $('input[name=password]');
    password.mask('999999999');

    vm.loading = false;

    vm.login = login;
    vm.redefinirSenha = redefinirSenha;
    vm.formSignup = {};
    vm.formForgot = {};

    function redefinirSenha(){
        try {

            if (navigator.onLine) {
                vm.loading = true;
                const obj = {
                    action: 2,
                    params : vm.formForgot.email            
                }                 
                $http.post('service/login/', obj)
                    .then(function (response) {                      
                        if(response.data.success){
                            valid.logMyErrors(3,response.data.message);
                            vm.loading = false;
                            window.open('/ipet/index.php?page=2','_self');
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

    function login (){   
        try {

            if (navigator.onLine) {
                vm.loading = true;
                const obj = {
                    action: 1,
                    params : vm.formLogin 
                }                 
                $http.post('admin/service/login/', obj)
                    .then(function (response) {                        
                        if(response.data.success){
                            // valid.logMyErrors(3,response.data.message);
                            window.open('/ipet/admin/index.php','_self');
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