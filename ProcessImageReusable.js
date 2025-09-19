$(document).ready(function(){
    var ProcessImageReusableField = $('#ProcessImageReusablePageTree');
    ProcessImageReusableField.on('pageSelected', ProcessImageReusableField, 
        function(e, data){
            console.log(data);
        }
    );

})