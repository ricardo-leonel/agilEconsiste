$(document).ready(function () {
    $(document).on("click",".usuario",function(){
        $.ajax({
            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',
            data: {'acao':'getById','id':$(this).attr("id")},
            success: function(data) {
                $("#nomeModal").val(data[0][0].nome);
                $("#cnpjModal").val(data[0][0].cnpj);e
                $("#inscEstModal").val(data[0][0].inscEstadual);
                $("#enderecoModal").val(data[0][0].endereco);
                $("#cidadeModal").val(data[0][0].cidade);
                $("#bairroModal").val(data[0][0].bairro);
                $("#estadoModal").val(data[0][0].uf);
                $("#cepModal").val(data[0][0].cep);
                $("#telefoneModal").val(data[0][0].telefone);
                $("#emailModal").val(data[0][0].email);
            }
        });
    });
    $(document).on("click",".alterUsuario",function(){
        $.ajax({
            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',
            data: {'acao':'getById','id':$(this).attr("id")},
            success: function(data) {
                $("#nomeModal2").val(data[0][0].nome);
                $("#id").val(data[0][0].id);
                $("#cnpjModal2").val(data[0][0].cnpj);
                $("#inscEstModal2").val(data[0][0].inscEstadual);
                $("#enderecoModal2").val(data[0][0].endereco);
                $("#cidadeModal2").val(data[0][0].cidade);
                $("#bairroModal2").val(data[0][0].bairro);
                $("#estadoModal2").val(data[0][0].uf);
                $("#cepModal2").val(data[0][0].cep);
                $("#telefoneModal2").val(data[0][0].telefone);
                $("#emailModal2").val(data[0][0].email);
                $("#idModal2").val($(this).attr('id'));
                $('input:radio[name=statusRadio]').attr('checked',false);
                if(data[0][0].status == 2){
                    $("input:radio[name=statusRadio][value=1]").parent().attr('class','');
                    $("input:radio[name=statusRadio][value=2]").parent().attr('class','checked');
                    $("input:radio[name=statusRadio][value=2]").prop('checked','checked');
                }else{
                    $("input:radio[name=statusRadio][value=2]").parent().attr('class','');
                    $("input:radio[name=statusRadio][value=1]").parent().attr('class','checked');
                    $("input:radio[name=statusRadio][value=1]").prop('checked','checked');
                }
            }
        });
    });

    $(document).on("click","#alterarUsuario",function(){
        $.ajax({
            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',
            data: $('form#alterFormClient').serialize(),
            success: function(data) {
                if(data == "erro"){
                    $.pnotify({
                        type: 'error',
                        title: 'Alteração de Usuario',
                        text: 'Usuario não alterado, entre em contato com o adminstrador do sistema!',
                        icon: 'picon icon16 iconic-icon-check-alt white',
                        opacity: 0.95,
                        history: false,
                        sticker: false
                    });
                }else{
                    $('#alterClient').modal('toggle');
                    $.pnotify({
                        type: 'success',
                        title: 'Alteração de Usuario',
                        text: 'Usuario Alterado com sucesso!',
                        icon: 'picon icon16 iconic-icon-check-alt white',
                        opacity: 0.95,
                        history: false,
                        sticker: false
                    });

                    if($('table').hasClass('usuarioTable')){
                        var table = $('.usuarioTable').DataTable();
                        table.fnReloadAjax();
                    }
                }
            }
        });
    });

    $(document).on("click","#insertUsuario",function(){
        $.ajax({
            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',
            data: $('form#insertUsuarioForm').serialize(),
            success: function(data) {
                if(data == "erro"){
                    $.pnotify({
                        type: 'error',
                        title: 'Inclusão de Usuario',
                        text: 'Usuario não incluído, entre em contato com o adminstrador do sistema!',
                        icon: 'picon icon16 iconic-icon-check-alt white',
                        opacity: 0.95,
                        history: false,
                        sticker: false
                    });
                }else{
                    CollapsedCancel();
                    $.pnotify({
                        type: 'success',
                        title: 'Inclusão de Usuario',
                        text: 'Usuario Incluído com sucesso!',
                        icon: 'picon icon16 iconic-icon-check-alt white',
                        opacity: 0.95,
                        history: false,
                        sticker: false
                    });

                    if($('table').hasClass('usuarioTable')){
                        var table = $('.usuarioTable').DataTable();
                        table.fnReloadAjax();
                    }
                }
            }
        });
    });

    $(document).on("click",".removeClientId",function(){
        $.ajax({
            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',
            data: {'acao':'getById','id':$(this).attr("id")},
            success: function(data) {
                $("#idRemove").val(data[0][0].id);
            }
        });
    });

    $(document).on("click","#removerUsuario",function(){
        $.ajax({
            url: '../controllers/UserController.php',
            type: 'post',
            dataType: 'json',
            data: $('form#removeFormClient').serialize(),
            success: function(data) {
                if(data == "erro"){
                    $.pnotify({
                        type: 'error',
                        title: 'Eclusão de Usuario',
                        text: 'Usuario não excluido, entre em contato com o adminstrador do sistema!',
                        icon: 'picon icon16 iconic-icon-check-alt white',
                        opacity: 0.95,
                        history: false,
                        sticker: false
                    });
                }else{
                    $('#removeClient').modal('toggle');
                    $.pnotify({
                        type: 'success',
                        title: 'Exclusão de Usuario',
                        text: 'Usuario Excluido com sucesso!',
                        icon: 'picon icon16 iconic-icon-check-alt white',
                        opacity: 0.95,
                        history: false,
                        sticker: false
                    });

                    if($('table').hasClass('usuarioTable')){
                        var table = $('.usuarioTable').DataTable();
                        table.fnReloadAjax();
                    }
                }
            }
        });
    });

    $(document).on("click",".status",function(){
        if($(this).attr("class") == "icomoon-icon-checkmark status"){
            $.ajax({
                url: '../controllers/UserController.php',
                type: 'post',
                dataType: 'json',
                data: {'acao':'updateStatus','id':$(this).attr("id"), 'status': "1"},
                success: function(data) {
                }
            });
        }else{
            $.ajax({
                url: '../controllers/UserController.php',
                type: 'post',
                dataType: 'json',
                data: {'acao':'updateStatus','id':$(this).attr("id"), 'status': "2"},
                success: function(data) {
                }
            });
        }
        if($('table').hasClass('usuarioTable')){
            var table = $('.usuarioTable').DataTable();
            table.fnReloadAjax();
        }
    });
});