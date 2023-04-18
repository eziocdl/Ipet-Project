(function() {
    angular
        .module('app')
        .filter('setSexo', setSexo)
        
    function setSexo(){
        
        return (v) =>{
            console.log(v)
            switch (v) {
                case 1:
                    return "Macho";
                    break;
                case 2:
                    return "Fêmea";
                    break;
                case 3:
                    return "Não sei";
                    break;            
                default:
                    return "Não informado";
                    break;
            }
        }
    }
}());