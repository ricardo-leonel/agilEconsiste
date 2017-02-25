// document ready function
$(document).ready(function() {

    $('#modalAddCliente').click(function(){

            $('#myModal').modal("show");
            return false;
        });
    $('.modalAddProposta').click(function(){
            $("#salvaProposta").attr("cliente",$(this).attr("cliente"));
            $("#salvaProposta").attr("projeto",$(this).attr("projeto"));
            $("#salvaProposta").attr("sistema",$(this).attr("sistema"));
            $('#AddProposta').modal("show");
            jQuery.ajax({
                type: "GET",
                url: "recuperaProposta",
                dataType: 'json',
                data:{
                    'cliente':$(this).attr("cliente"),'sistema':$(this).attr("sistema"),'projeto':$(this).attr("projeto"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                },
                async: false ,
                success: function (data) {

                  var table = $('#historyPropostaFin').DataTable();
                  table.fnClearTable();

                  for(i=0;i<data.length;i++){
                     table.fnAddData( [
                             "R$ "+data[i].proposta,
                             data[i].status


                      ]);
                  }
                }

            });
            return false;
        });

    $('.modalAddNecessidade').click(function(){
        $(".idHiddenCliente").remove();
        $("#salvarNecessidade").attr("cliente",$(this).attr("cliente"));
        $("#atualizarNecessidade").attr("cliente",$(this).attr("cliente"));
        $("#headerNecessidade").append(' <input type="hidden" name="cliente1" class="idHiddenCliente" value="'+$(this).attr("cliente")+'" />');
            jQuery.ajax({
                    type: "GET",
                    url: "recuperaNecessidade",
                    dataType: 'json',
                    data:{
                        'cliente':$(this).attr("cliente"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                    },
                    async: false ,
                    success: function (data) {

                      var table = $('#necessidade').DataTable();
                      table.fnClearTable();

                      for(i=0;i<data.length;i++){
                         table.fnAddData( [
                                 data[i].descricao,
                                 '<a class="editNecessidade" cliente="'+data[i].cliente+'" necessidade="'+data[i].id+'" ><img class="icon-edit" /></a>&nbsp&nbsp&nbsp<a class="excluiNecessidade" cliente="'+data[i].cliente+'" necessidade="'+data[i].id+'" ><img class="icon-trash"/></a>'

                          ]);
                      }
                    }

                });

            $('#AddNecessidade').modal("show");
            return false;
        });

    $('.modalAddLenvTecnico').click(function(){
            $(".idHiddenCliente").remove();
            $("#salvarLevantamentoTecnico").attr("cliente",$(this).attr("cliente"));
           $("#salvarLevantamentoTecnico").attr("projeto",$(this).attr("projeto"));
            $("#salvarLevantamentoTecnico").attr("sistema",$(this).attr("sistema"));
            $("#atualizarLevantamentoTecnico").attr("cliente",$(this).attr("cliente"));
            $("#atualizarLevantamentoTecnico").attr("projeto",$(this).attr("projeto"));
                        $("#atualizarLevantamentoTecnico").attr("sistema",$(this).attr("sistema"));
            $("#headerLevantamentoTecnico").append(' <input type="hidden" name="cliente1" class="idHiddenCliente" value="'+$(this).attr("cliente")+'" />');
             jQuery.ajax({
                type: "GET",
                url: "recuperaLevantamentoTecnico",
                dataType: 'json',
                data:{
                    'cliente':$(this).attr("cliente"),'projeto':$(this).attr("projeto"),'sistema':$(this).attr("sistema"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                },
                async: false ,
                success: function (data) {

                  var table = $('#levantementoTecnico').DataTable();
                  table.fnClearTable();

                  for(i=0;i<data.length;i++){
                     table.fnAddData( [
                             data[i].levantamento,
                             '<a class="editLevantamentoTecnico" cliente="'+data[i].cliente+'" levantamentoID="'+data[i].id+'" projeto="'+data[i].projeto+'" sistema="'+data[i].sistema+'" ><img class="icon-edit" /></a>&nbsp&nbsp&nbsp<a class="excluiLevantamentoTecnico" cliente="'+data[i].cliente+'" levantamentoID="'+data[i].id+'" projeto="'+data[i].projeto+'" sistema="'+data[i].sistema+'" ><img class="icon-trash"/></a>'

                      ]);
                  }
                }

            });
            $('#AddLenvTecnico').modal("show");
            return false;
        });
    $('.modalAddContato').click(function(){
            $(".salva_contato").attr("cliente",$(this).attr("cliente"));
            $(".salva_contato").attr("projeto",$(this).attr("projeto"));
            $(".salva_contato").attr("sistema",$(this).attr("sistema"));
            jQuery.ajax({
                 type: "GET",
                 url: "recuperaContato",
                 dataType: 'json',
                 data:{
                     'cliente':$(this).attr("cliente"),'projeto':$(this).attr("projeto"),'sistema':$(this).attr("sistema"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                 },
                 async: false ,
                 success: function (data) {

                   var table = $('#historyContato').DataTable();
                   table.fnClearTable();
                   // alert(JSON.stringify(data));
                   for(i=0;i<data.length;i++){
                      table.fnAddData( [
                              data[i].tipo,
                              data[i].data_created,
                              data[i].lembrete,
                              data[i].status,
                              data[i].descricao,
                              '<a href="#" disabled class="icomoon-icon-pencil-3 not-active" ></a>&nbsp&nbsp&nbsp<a contato="'+data[i].id+'" cliente="'+data[i].cliente+'" class="icomoon-icon-remove-4 excluirContato" ></a>&nbsp&nbsp&nbsp<a contato="'+data[i].id+'" cliente="'+data[i].cliente+'"  class="icomoon-icon-thumbs-up-2 finalizarContato" ></a>'

                       ]);
                   }
                 }

             });
            $('#AddContato').modal("show");
            return false;
        });

    $(document).on("click",".editNecessidade",function(){
        var id = $(this).attr("cliente");
        $("#atualizarNecessidade").attr("necessidade",$(this).attr("necessidade"));
        $("#salvarNecessidade").css("visibility","hidden");
        $("#salvarNecessidade").css("margin-left","-90px");
        $("#atualizarNecessidade").css("display","");
        $("#formNecessidade").attr("action","atualiza_necessidade_cliente#");
        jQuery.ajax({
            type: "GET",
            url: "recuperaNecessidadeID",
            dataType: 'json',
            data:{
                'cliente':$(this).attr("cliente"),'necessidade':$(this).attr("necessidade"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
            },
            async: false ,
            success: function (data) {

              for(i=0;i<data.length;i++){
                $("#necessidade1").val(data[i].descricao);
              }
            }

        });

    });

    $("#atualizarNecessidade").click(function(){
        $("#salvarNecessidade").css("visibility","");
        $("#atualizarNecessidade").css("display","none");
        $("#formNecessidade").attr("action","salva_necessidade_cliente#");
        $("#salvarNecessidade").css("margin-left","0px");

         jQuery.ajax({
             type: "GET",
             url: "atualiza_necessidade_cliente",
             dataType: 'json',
             data:{
                 'cliente1':$(this).attr("cliente"),'necessidade1':$("#necessidade1").val(),'id':$(this).attr("necessidade"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
             },
             async: false ,
             success: function (data) {

             }

         });
          $("#necessidade1").val("");
         jQuery.ajax({
             type: "GET",
             url: "recuperaNecessidade",
             dataType: 'json',
             data:{
                 'cliente':$(this).attr("cliente"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
             },
             async: false ,
             success: function (data) {

               var table = $('#necessidade').DataTable();
               table.fnClearTable();

               for(i=0;i<data.length;i++){
                  table.fnAddData( [
                          data[i].descricao,
                          '<a class="editNecessidade" cliente="'+data[i].cliente+'" necessidade="'+data[i].id+'" ><img class="icon-edit" /></a>&nbsp&nbsp&nbsp<a class="excluiNecessidade" cliente="'+data[i].cliente+'" necessidade="'+data[i].id+'" ><img class="icon-trash"/></a>'

                   ]);
               }
             }

         });
    });

    $(document).on("click","#salvarNecessidade",function(){
        jQuery.ajax({
            type: "GET",
            url: "salva_necessidade_cliente",
            dataType: 'json',
            data:{
                'cliente1':$(this).attr("cliente"),'necessidade1':$("#necessidade1").val(),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
            },
            async: false ,
            success: function (data) {
            }

        });
         $("#necessidade1").val("");
        jQuery.ajax({
            type: "GET",
            url: "recuperaNecessidade",
            dataType: 'json',
            data:{
                'cliente':$(this).attr("cliente"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
            },
            async: false ,
            success: function (data) {

              var table = $('#necessidade').DataTable();
              table.fnClearTable();

              for(i=0;i<data.length;i++){
                 table.fnAddData( [
                         data[i].descricao,
                         '<a class="editNecessidade" cliente="'+data[i].cliente+'" necessidade="'+data[i].id+'" ><img class="icon-edit" /></a>&nbsp&nbsp&nbsp<a class="excluiNecessidade" cliente="'+data[i].cliente+'" necessidade="'+data[i].id+'" ><img class="icon-trash"/></a>'

                  ]);
              }
            }

        });
    });

    $(document).on("click",".excluiNecessidade",function(){
        var r = confirm("Você realmente deseja exluir essa Necessidade?");
        if(r == true){
            jQuery.ajax({
                 type: "GET",
                 url: "exclui_necessidade_cliente",
                 dataType: 'json',
                 data:{
                     'cliente1':$(this).attr("cliente"),'necessidade1':$("#necessidade1").val(),'id':$(this).attr("necessidade"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                 },
                 async: false ,
                 success: function (data) {
                    alert(data);
                 }

             });
             jQuery.ajax({
                 type: "GET",
                 url: "recuperaNecessidade",
                 dataType: 'json',
                 data:{
                     'cliente':$(this).attr("cliente"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                 },
                 async: false ,
                 success: function (data) {

                   var table = $('#necessidade').DataTable();
                   table.fnClearTable();

                   for(i=0;i<data.length;i++){
                      table.fnAddData( [
                              data[i].descricao,
                              '<a class="editNecessidade" cliente="'+data[i].cliente+'" necessidade="'+data[i].id+'" ><img class="icon-edit" /></a>&nbsp&nbsp&nbsp<a class="excluiNecessidade" cliente="'+data[i].cliente+'" necessidade="'+data[i].id+'" ><img class="icon-trash"/></a>'

                       ]);
                   }
                 }

             });
        }
    });


    $(document).on("click","#salvaProposta",function(){
                jQuery.ajax({
                    type: "GET",
                    url: "salva_proposta_cliente",
                    dataType: 'json',
                    data:{
                        'cliente':$(this).attr("cliente"),'proposta':$("#proposta1").val(),'sistema':$(this).attr("sistema"),'projeto':$(this).attr("projeto"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                    },
                    async: false ,
                    success: function (data) {
                        var table = $('#historyPropostaFin').DataTable();
                        table.fnClearTable();

                        for(i=0;i<data.length;i++){
                         table.fnAddData( [
                                 "R$ "+data[i].proposta,
                                 data[i].status


                          ]);
                        }
                    }

                });

                 $("#proposta1").val("");
            });


       $(document).on("click",".salva_contato",function(){

            var descricao;
            var tipo;
            if($("#TextAreavisita").val() != ""){
                descricao = $("#TextAreavisita").val();
                tipo = "Visita";
            }else if($("#TextAreareuniao").val() != ""){
              descricao = $("#TextAreareuniao").val();
              tipo = "Reunião";
            }else if($("#TextAreaproposta").val() != ""){
              descricao = $("#TextAreaproposta").val();
              tipo = "Proposta";
            }else if($("#TextArealigacao").val() != ""){
              descricao = $("#TextArealigacao").val();
              tipo = "Ligação";
            }

            var lembrete;
            if($("#TextAreavisita").val() != ""){
              lembrete = $("#lembreteVisita").val();
            }else if($("#TextAreareuniao").val() != ""){
              lembrete = $("#lembreteReuniao").val();
            }else if($("#TextAreaproposta").val() != ""){
              lembrete = $("#lembreteProposta").val();
            }else if($("#TextArealigacao").val() != ""){
              lembrete = $("#lembreteLigacao").val();
            }
            jQuery.ajax({
                type: "GET",
                url: "salva_contato_cliente",
                dataType: 'json',
                data:{
                    'cliente':$(this).attr("cliente"),
                    'descricao':descricao,
                    'lembrete':lembrete,
                    'sistema':$(this).attr("sistema"),
                    'projeto':$(this).attr("projeto"),
                    'tipo':tipo,
                    '_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                },
                async: false ,
                success: function (data) {

                }

            });
             if($("#TextAreavisita").val() != ""){
                $("#TextAreavisita").val("");
            }else if($("#TextAreareuniao").val() != ""){
              $("#TextAreareuniao").val("");
            }else if($("#TextAreaproposta").val() != ""){
              $("#TextAreaproposta").val("");
            }else if($("#TextArealigacao").val() != ""){
              $("#TextArealigacao").val("");
            }
             if($("#TextAreavisita").val() != ""){
              $("#lembreteVisita").val("");
            }else if($("#TextAreareuniao").val() != ""){
              $("#lembreteReuniao").val("");
            }else if($("#TextAreaproposta").val() != ""){
              $("#lembreteProposta").val("");
            }else if($("#TextArealigacao").val() != ""){
              $("#lembreteLigacao").val("");
            }
            jQuery.ajax({
                 type: "GET",
                 url: "recuperaContato",
                 dataType: 'json',
                 data:{
                     'cliente':$(this).attr("cliente"),'projeto':$(this).attr("projeto"),'sistema':$(this).attr("sistema"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                 },
                 async: false ,
                 success: function (data) {

                   var table = $('#historyContato').DataTable();
                   table.fnClearTable();
                    //alert(JSON.stringify(data));
                   for(i=0;i<data.length;i++){
                      table.fnAddData( [
                              data[i].tipo,
                              data[i].data_created,
                              data[i].lembrete,
                              data[i].status,
                              data[i].descricao,
                              '<a href="#"  disabled class="icomoon-icon-pencil-3  not-active" ></a>&nbsp&nbsp&nbsp<a contato="'+data[i].id+'" cliente="'+data[i].cliente+'" class="icomoon-icon-remove-4 excluirContato" ></a>&nbsp&nbsp&nbsp<a contato="'+data[i].id+'" cliente="'+data[i].cliente+'"  class="icomoon-icon-thumbs-up-2 finalizarContato" ></a>'

                       ]);
                   }
                 }

             });
       });

       $(document).on("click",".finalizarContato",function(){
           var contato = $(this).attr("contato");
           jQuery.ajax({
                type: "GET",
                url: "finalizaContato",
                dataType: 'json',
                data:{
                    'contato':$(this).attr("contato"),'cliente':$(this).attr("cliente"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                },
                async: false ,
                success: function (data) {
                    var table = $('#historyContato').DataTable();
                   table.fnClearTable();
                    //alert(JSON.stringify(data));
                   for(i=0;i<data.length;i++){
                      table.fnAddData( [
                              data[i].tipo,
                              data[i].data_created,
                              data[i].lembrete,
                              data[i].status,
                              data[i].descricao,
                              '<a href="#" disabled class="icomoon-icon-pencil-3  not-active" ></a>&nbsp&nbsp&nbsp<a contato="'+data[i].id+'" cliente="'+data[i].cliente+'" class="icomoon-icon-remove-4 excluirContato" ></a>&nbsp&nbsp&nbsp<a contato="'+data[i].id+'" cliente="'+data[i].cliente+'"  class="icomoon-icon-thumbs-up-2 finalizarContato" ></a>'

                       ]);
                   }
                }

            });

       });

       $(document).on("click",".excluirContato",function(){
          var contato = $(this).attr("contato");
          jQuery.ajax({
               type: "GET",
               url: "excluirContato",
               dataType: 'json',
               data:{
                   'contato':$(this).attr("contato"),'cliente':$(this).attr("cliente"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
               },
               async: false ,
               success: function (data) {
                   var table = $('#historyContato').DataTable();
                  table.fnClearTable();
                   //alert(JSON.stringify(data));
                  for(i=0;i<data.length;i++){
                     table.fnAddData( [
                             data[i].tipo,
                             data[i].data_created,
                             data[i].lembrete,
                             data[i].status,
                             data[i].descricao,
                             '<a href="#" disabled class="icomoon-icon-pencil-3  not-active" ></a>&nbsp&nbsp&nbsp<a contato="'+data[i].id+'" cliente="'+data[i].cliente+'" class="icomoon-icon-remove-4 excluirContato" ></a>&nbsp&nbsp&nbsp<a contato="'+data[i].id+'" cliente="'+data[i].cliente+'"  class="icomoon-icon-thumbs-up-2 finalizarContato" ></a>'

                      ]);
                  }
               }

           });

      });
    $(document).on("click",".excluiLevantamentoTecnico",function(){
          var levantamentoid = $(this).attr("levantamentoid");
          jQuery.ajax({
               type: "GET",
               url: "excluiLevantamentoTecnico",
               dataType: 'json',
               data:{
                   'levantamentoid':$(this).attr("levantamentoid"),'cliente':$(this).attr("cliente"),'projeto':$(this).attr("projeto"),'sistema':$(this).attr("sistema"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
               },
               async: false ,
               success: function (data) {
                    var table = $('#levantementoTecnico').DataTable();
                     table.fnClearTable();

                     for(i=0;i<data.length;i++){
                        table.fnAddData( [
                                data[i].levantamento,
                                '<a class="editLevantamentoTecnico" cliente="'+data[i].cliente+'" levantamentoID="'+data[i].id+'" projeto="'+$(this).attr("projeto")+'" sistema="'+$(this).attr("sistema")+'" ><img class="icon-edit" /></a>&nbsp&nbsp&nbsp<a class="excluiLevantamentoTecnico" cliente="'+data[i].cliente+'" levantamentoID="'+data[i].id+'" projeto="'+$(this).attr("projeto")+'" sistema="'+$(this).attr("sistema")+'"><img class="icon-trash"/></a>'

                         ]);
                     }
               }

           });

      });

       $(document).on("click","#salvarLevantamentoTecnico",function(){
          jQuery.ajax({
              type: "GET",
              url: "salva_levTecnico_cliente",
              dataType: 'json',
              data:{
                  'cliente':$(this).attr("cliente"),'levantamento':$("#levantamento").val(),'sistema':$(this).attr("sistema"),'projeto':$(this).attr("projeto"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
              },
              async: false ,
              success: function (data) {
                   var table = $('#levantementoTecnico').DataTable();
                   table.fnClearTable();

                   for(i=0;i<data.length;i++){
                      table.fnAddData( [
                              data[i].levantamento,
                              '<a class="editLevantamentoTecnico" cliente="'+data[i].cliente+'" levantamentoID="'+data[i].id+'" projeto="'+data[i].projeto+'" sistema="'+data[i].sistema+'" ><img class="icon-edit" /></a>&nbsp&nbsp&nbsp<a class="excluiLevantamentoTecnico" cliente="'+data[i].cliente+'" levantamentoID="'+data[i].id+'" projeto="'+data[i].projeto+'" sistema="'+data[i].sistema+'" ><img class="icon-trash"/></a>'

                       ]);
                   }
              }

          });

           $("#levantamento").val("");
      });

       $(document).on("click",".editLevantamentoTecnico",function(){
               var id = $(this).attr("cliente");
               var levantamentoID = $(this).attr("levantamentoID");
               var projeto = $(this).attr("projeto");
               var sistema = $(this).attr("sistema");
               $("#atualizarLevantamentoTecnico").attr("levantamentoID",$(this).attr("levantamentoID"));
               $("#salvarLevantamentoTecnico").css("visibility","hidden");
               $("#salvarLevantamentoTecnico").css("margin-left","-90px");
               $("#atualizarLevantamentoTecnico").css("display","");
               jQuery.ajax({
                   type: "GET",
                   url: "recuperalevTecnicoID",
                   dataType: 'json',
                   data:{
                       'levantamentoID':$(this).attr("levantamentoID"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                   },
                   async: false ,
                   success: function (data) {

                     for(i=0;i<data.length;i++){
                       $("#levantamento").val(data[i].levantamento);
                     }
                   }

               });

           });

      $("#atualizarLevantamentoTecnico").click(function(){
              $("#salvarLevantamentoTecnico").css("visibility","");
              $("#atualizarLevantamentoTecnico").css("display","none");
              $("#salvarLevantamentoTecnico").css("margin-left","0px");
               jQuery.ajax({
                   type: "GET",
                   url: "atualiza_levTecnico_cliente",
                   dataType: 'json',
                   data:{
                       'cliente':$(this).attr("cliente"),'levantamento':$("#levantamento").val(),'levantamentoID':$(this).attr("levantamentoID"),'sistema':$(this).attr("sistema"),'projeto':$(this).attr("projeto"),'_csrf':'608242cd-c2c2-4fac-bd81-ea7a446011cd'
                   },
                   async: false ,
                   success: function (data) {
                        var table = $('#levantementoTecnico').DataTable();
                       table.fnClearTable();

                       for(i=0;i<data.length;i++){
                          table.fnAddData( [
                                  data[i].levantamento,
                                  '<a class="editLevantamentoTecnico" cliente="'+data[i].cliente+'" levantamentoID="'+data[i].id+'" projeto="'+data[i].projeto+'" sistema="'+data[i].sistema+'" ><img class="icon-edit" /></a>&nbsp&nbsp&nbsp<a class="excluiLevantamentoTecnico" cliente="'+data[i].cliente+'" levantamentoID="'+data[i].id+'" projeto="'+data[i].projeto+'" sistema="'+data[i].sistema+'" ><img class="icon-trash"/></a>'

                           ]);
                       }
                   }

               });
                $("#levantamento").val("");
          });



});//End document ready functions