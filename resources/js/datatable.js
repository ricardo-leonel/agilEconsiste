// document ready function
$(document).ready(function() {

	jQuery.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
	{
		// DataTables 1.10 compatibility - if 1.10 then `versionCheck` exists.
		// 1.10's API has ajax reloading built in, so we use those abilities
		// directly.
		if ( jQuery.fn.dataTable.versionCheck ) {
			var api = new jQuery.fn.dataTable.Api( oSettings );

			if ( sNewSource ) {
				api.ajax.url( sNewSource ).load( fnCallback, !bStandingRedraw );
			}
			else {
				api.ajax.reload( fnCallback, !bStandingRedraw );
			}
			return;
		}

		if ( sNewSource !== undefined && sNewSource !== null ) {
			oSettings.sAjaxSource = sNewSource;
		}

		// Server-side processing should just call fnDraw
		if ( oSettings.oFeatures.bServerSide ) {
			this.fnDraw();
			return;
		}

		this.oApi._fnProcessingDisplay( oSettings, true );
		var that = this;
		var iStart = oSettings._iDisplayStart;
		var aData = [];

		this.oApi._fnServerParams( oSettings, aData );

		oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
			/* Clear the old information from the table */
			that.oApi._fnClearTable( oSettings );

			/* Got the data - add it to the table */
			var aData =  (oSettings.sAjaxDataProp !== "") ?
				that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;

			for ( var i=0 ; i<aData.length ; i++ )
			{
				that.oApi._fnAddData( oSettings, aData[i] );
			}

			oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();

			that.fnDraw();

			if ( bStandingRedraw === true )
			{
				oSettings._iDisplayStart = iStart;
				that.oApi._fnCalculateEnd( oSettings );
				that.fnDraw( false );
			}

			that.oApi._fnProcessingDisplay( oSettings, false );

			/* Callback user function - for event handlers etc */
			if ( typeof fnCallback == 'function' && fnCallback !== null )
			{
				fnCallback( oSettings );
			}
		}, oSettings );
	};

	$.fn.dataTable.pipeline = function ( opts ) {
		// Configuration options
		var conf = $.extend( {
			pages: 5,     // number of pages to cache
			url: '',      // script url
			data: null,   // function or object with parameters to send to the server
						  // matching how `ajax.data` works in DataTables
			method: 'GET' // Ajax HTTP method
		}, opts );

		// Private variables for storing the cache
		var cacheLower = -1;
		var cacheUpper = null;
		var cacheLastRequest = null;
		var cacheLastJson = null;

		return function ( request, drawCallback, settings ) {
			var ajax          = false;
			var requestStart  = request.start;
			var drawStart     = request.start;
			var requestLength = request.length;
			var requestEnd    = requestStart + requestLength;

			if ( settings.clearCache ) {
				// API requested that the cache be cleared
				ajax = true;
				settings.clearCache = false;
			}
			else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
				// outside cached data - need to make a request
				ajax = true;
			}
			else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
				JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
				JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
			) {
				// properties changed (ordering, columns, searching)
				ajax = true;
			}

			// Store the request for checking next time around
			cacheLastRequest = $.extend( true, {}, request );

			if ( ajax ) {
				// Need data from the server
				if ( requestStart < cacheLower ) {
					requestStart = requestStart - (requestLength*(conf.pages-1));

					if ( requestStart < 0 ) {
						requestStart = 0;
					}
				}

				cacheLower = requestStart;
				cacheUpper = requestStart + (requestLength * conf.pages);

				request.start = requestStart;
				request.length = requestLength*conf.pages;

				// Provide the same `data` options as DataTables.
				if ( $.isFunction ( conf.data ) ) {
					// As a function it is executed with the data object as an arg
					// for manipulation. If an object is returned, it is used as the
					// data object to submit
					var d = conf.data( request );
					if ( d ) {
						$.extend( request, d );
					}
				}
				else if ( $.isPlainObject( conf.data ) ) {
					// As an object, the data given extends the default
					$.extend( request, conf.data );
				}

				settings.jqXHR = $.ajax( {
					"type":     conf.method,
					"url":      conf.url,
					"data":     request,
					"dataType": "json",
					"cache":    false,
					"success":  function ( json ) {
						cacheLastJson = $.extend(true, {}, json);

						if ( cacheLower != drawStart ) {
							json.data.splice( 0, drawStart-cacheLower );
						}
						if ( requestLength >= -1 ) {
							json.data.splice( requestLength, json.data.length );
						}

						drawCallback( json );
					}
				} );
			}
			else {
				json = $.extend( true, {}, cacheLastJson );
				json.draw = request.draw; // Update the echo for each response
				json.data.splice( 0, requestStart-cacheLower );
				json.data.splice( requestLength, json.data.length );

				drawCallback(json);
			}
		}
	};


	//--------------- Data tables ------------------//
	if($('table').hasClass('dynamicTable')){
		 
		$('.dynamicTable').dataTable( {
			"sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
			"sPaginationType": "bootstrap",
			"bJQueryUI": false,
			"bAutoWidth": false,
			"oLanguage": {
            				"sEmptyTable": "Nenhum registro encontrado",
            				"sInfo": "Mostrando de _START_ at&eacute _END_ de _TOTAL_ registros",
            				"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            				"sInfoFiltered": "(Filtrados de _MAX_ registros)",
            				"sInfoPostFix": "",    "sInfoThousands": ".",
            				"sLengthMenu": "_MENU_",
            				"sLoadingRecords": "Carregando...",
            				"sProcessing": "Processando...",
            				"sZeroRecords": "Nenhum registro encontrado",
            				"sSearch": "",
            				"oPaginate": {
            					"sNext": "Próximo",
            					"sPrevious": "Anterior",
            					"sFirst": "Primeiro",
            					"sLast": "&Uacuteltimo"
            				},
            				"oAria": {
            					"sSortAscending": ": Ordenar colunas de forma ascendente",
            					"sSortDescending": ": Ordenar colunas de forma descendente"
            				}
            			}
		});

		$('.dataTables_length select').uniform();
		$('.dataTables_paginate > ul').addClass('pagination');
		$('.dataTables_filter>label>input').addClass('form-control');
	}

	if($('table').hasClass('tableTools')){
		jQuery.fn.dataTableExt.oPagination.iFullNumbersShowPages = 3;
		$('.tableTools').dataTable( {
			"sDom": "<'row'<'col-lg-4'l><'col-lg-4'T><'col-lg-4'f>r>t<'row'<'col-lg-4'i><'col-lg-4'i><'col-lg-4'p>>",
			"oTableTools": {
				"sSwfPath": "../resources/plugins/tables/dataTables/swf/copy_csv_xls_pdf.swf",
				"aButtons": [
					{
						"sExtends": "copy",
						"sButtonText": "Copiar",
						"sToolTip": "Copiar tabela para Área de Transferência",
						"sInfo": "<h6>Tabela copiada</h6><p>Tabela copiada para a Área de Transferência.</p>"
					},
					{
						"sExtends": "print",
						"sButtonText": "Imprimir",
					},
					{
						"sExtends":    "collection",
						"sButtonText": 'Salvar <span class="caret" />',
						"aButtons":    [ "csv", "xls", "pdf" ]
					}
				]
			},
			"sPaginationType": "two_button",
			"bJQueryUI": false,
			"bAutoWidth": false,
			"oLanguage": {
				"sEmptyTable": "Nenhum registro encontrado",
				"sInfo": "Mostrando de _START_ at&eacute _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				"sInfoFiltered": "(Filtrados de _MAX_ registros)",
				"sInfoPostFix": "",    "sInfoThousands": ".",
				"sLengthMenu": "_MENU_",
				"sLoadingRecords": "Carregando...",
				"sProcessing": "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "",
				"oPaginate": {
					"sNext": "Próximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast": "&Uacuteltimo"
				},
				"oAria": {
					"sSortAscending": ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			}
		});
		$('.dataTables_length select').uniform();
		$('.dataTables_paginate > ul').addClass('pagination');
		$('.dataTables_filter>label>input').addClass('form-control');
	}
	if($('table').hasClass('clienteTable')){
		//jQuery.fn.dataTableExt.oPagination.iFullNumbersShowPages = 3;
		var clienteTable = $('.clienteTable').dataTable( {
			"bProcessing": true,
			"sAjaxSource": "../../controllers/ClienteController.php",
			"aoColumns": [
				{ mData: 'Nome' } ,
				{ mData: 'CNPJ' },
				{ mData: 'Cidade' },
				{ mData: 'UF' },
				{ mData: 'Telefone' },
				{ mData: 'Email' },
				{ mData: 'Ativo' },
				{ mData: 'Ação' }
			],
			"sDom": "<'row'<'col-lg-4'l><'col-lg-4'T><'col-lg-4'f>r>t<'row'<'col-lg-4'i><'col-lg-4'i><'col-lg-4'p>>",
			"oTableTools": {
				"sSwfPath": "../resources/plugins/tables/dataTables/swf/copy_csv_xls_pdf.swf",
				"aButtons": [
					{
						"sExtends": "copy",
						"sButtonText": "Copiar",
						"sToolTip": "Copiar tabela para Área de Transferência",
						"sInfo": "<h6>Tabela copiada</h6><p>Tabela copiada para a Área de Transferência.</p>"
					},
					{
						"sExtends": "print",
						"sButtonText": "Imprimir",
					},
					{
						"sExtends":    "collection",
						"sButtonText": 'Salvar <span class="caret" />',
						"aButtons":    [ "csv", "xls", "pdf" ]
					}
				]
			},
			"sPaginationType": "two_button",
			"bJQueryUI": false,
			"bAutoWidth": false,
			"oLanguage": {
				"sEmptyTable": "Nenhum registro encontrado",
				"sInfo": "Mostrando de _START_ at&eacute _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				"sInfoFiltered": "(Filtrados de _MAX_ registros)",
				"sInfoPostFix": "",    "sInfoThousands": ".",
				"sLengthMenu": "_MENU_",
				"sLoadingRecords": "Carregando...",
				"sProcessing": "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "",
				"oPaginate": {
					"sNext": "Próximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast": "&Uacuteltimo"
				},
				"oAria": {
					"sSortAscending": ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			}
		});
		$('.dataTables_length select').uniform();
		$('.dataTables_paginate > ul').addClass('pagination');
		$('.dataTables_filter>label>input').addClass('form-control');
	}

	if($('table').hasClass('usuarioTable')){
		//jQuery.fn.dataTableExt.oPagination.iFullNumbersShowPages = 3;
		var clienteTable = $('.usuarioTable').dataTable( {
			"bProcessing": true,
			"sAjaxSource": "../../controllers/UserController.php",
			"aoColumns": [
				{ mData: 'Nome' } ,
				{ mData: 'Usuario' },
				{ mData: 'Email' },
				{ mData: 'Ativo' },
				{ mData: 'Ação' }
			],
			"sDom": "<'row'<'col-lg-4'l><'col-lg-4'T><'col-lg-4'f>r>t<'row'<'col-lg-4'i><'col-lg-4'i><'col-lg-4'p>>",
			"oTableTools": {
				"sSwfPath": "../resources/plugins/tables/dataTables/swf/copy_csv_xls_pdf.swf",
				"aButtons": [
					{
						"sExtends": "copy",
						"sButtonText": "Copiar",
						"sToolTip": "Copiar tabela para Área de Transferência",
						"sInfo": "<h6>Tabela copiada</h6><p>Tabela copiada para a Área de Transferência.</p>"
					},
					{
						"sExtends": "print",
						"sButtonText": "Imprimir",
					},
					{
						"sExtends":    "collection",
						"sButtonText": 'Salvar <span class="caret" />',
						"aButtons":    [ "csv", "xls", "pdf" ]
					}
				]
			},
			"sPaginationType": "two_button",
			"bJQueryUI": false,
			"bAutoWidth": false,
			"oLanguage": {
				"sEmptyTable": "Nenhum registro encontrado",
				"sInfo": "Mostrando de _START_ at&eacute _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				"sInfoFiltered": "(Filtrados de _MAX_ registros)",
				"sInfoPostFix": "",    "sInfoThousands": ".",
				"sLengthMenu": "_MENU_",
				"sLoadingRecords": "Carregando...",
				"sProcessing": "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "",
				"oPaginate": {
					"sNext": "Próximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast": "&Uacuteltimo"
				},
				"oAria": {
					"sSortAscending": ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			}
		});
		$('.dataTables_length select').uniform();
		$('.dataTables_paginate > ul').addClass('pagination');
		$('.dataTables_filter>label>input').addClass('form-control');
	}

	// Set the classes that TableTools uses to something suitable for Bootstrap
	$.extend( true, $.fn.DataTable.TableTools.classes, {
		"container": "btn-group",
		"buttons": {
			"normal": "btn",
			"disabled": "btn disabled"
		},
		"collection": {
			"container": "DTTT_dropdown dropdown-menu",
			"buttons": {
				"normal": "",
				"disabled": "disabled"
			}
		}
	} );

	// Have the collection use a bootstrap compatible dropdown
	$.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
		"collection": {
			"container": "ul",
			"button": "li",
			"liner": "a"
		}
	} );


});//End document ready functions

//sparkline in sidebar area
var positive = [1,5,3,7,8,6,10];
var negative = [10,6,8,7,3,5,1]
var negative1 = [7,6,8,7,6,5,4]

$('#stat1').sparkline(positive,{
	height:15,
	spotRadius: 0,
	barColor: '#9FC569',
	type: 'bar'
});
$('#stat2').sparkline(negative,{
	height:15,
	spotRadius: 0,
	barColor: '#ED7A53',
	type: 'bar'
});
$('#stat3').sparkline(negative1,{
	height:15,
	spotRadius: 0,
	barColor: '#ED7A53',
	type: 'bar'
});
$('#stat4').sparkline(positive,{
	height:15,
	spotRadius: 0,
	barColor: '#9FC569',
	type: 'bar'
});
//sparkline in widget
$('#stat5').sparkline(positive,{
	height:15,
	spotRadius: 0,
	barColor: '#9FC569',
	type: 'bar'
});

$('#stat6').sparkline(positive, { 
	width: 70,//Width of the chart - Defaults to 'auto' - May be any valid css width - 1.5em, 20px, etc (using a number without a unit specifier won't do what you want) - This option does nothing for bar and tristate chars (see barWidth)
	height: 20,//Height of the chart - Defaults to 'auto' (line height of the containing tag)
	lineColor: '#88bbc8',//Used by line and discrete charts to specify the colour of the line drawn as a CSS values string
	fillColor: '#f2f7f9',//Specify the colour used to fill the area under the graph as a CSS value. Set to false to disable fill
	spotColor: '#e72828',//The CSS colour of the final value marker. Set to false or an empty string to hide it
	maxSpotColor: '#005e20',//The CSS colour of the marker displayed for the maximum value. Set to false or an empty string to hide it
	minSpotColor: '#f7941d',//The CSS colour of the marker displayed for the mimum value. Set to false or an empty string to hide it
	spotRadius: 3,//Radius of all spot markers, In pixels (default: 1.5) - Integer
	lineWidth: 2//In pixels (default: 1) - Integer
});