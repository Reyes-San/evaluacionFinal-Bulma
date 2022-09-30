    $(document).ready(function(){
    $('#entrar').click(function(){
    var rut = $('inptRut').val().trim();
    var con = $('#inptCon').val().trim();
    var tipo = $('input:radio[name=usuario]:checked').val();
    
    var formData = new FormData();
    formData.append('ru', rut);
    formData.append('con', con);
    formData.append('tipo', tipo);

    $.ajax({
        url:'control/controlLogin.php?do=1',
        type:'POST',
        dataType:'json',
        data: formData,
        cache:false,
        contentType:false,
        processData:false
    }).done(function(json){
        if(json['valor']){
            toastr.success(json['mensaje']);
        }
        else{
            toastr.error(json['mensaje']);
        }
        
    });

    });

    });