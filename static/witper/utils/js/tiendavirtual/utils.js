/* 20240204 UTILS */

/**
	Metodo que permite ingresar solo numeros al input
	parametros:
		id - id de input
*/
function soloNumeros(id){
	$("#"+id).keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});
}

function validarExpresion(valor, regExp) {
	var RegExPattern = regExp;
	if (valor.match(RegExPattern)) return true; 
	else return false; 
}

function getFechaActualYYYMMDD(){
    var f = new Date();
	var result =  f.getFullYear() + "-" +lpad((f.getMonth() +1),2)+ "-" + lpad(f.getDate(),2);
	return result;
}

function getFechaActual(){
	var f = new Date();
	var result = lpad(f.getDate(),2) + "/" + lpad((f.getMonth() +1),2) + "/" + f.getFullYear();
	return result;
}

function getStrFechaYYYMMDD(strFecha){
    var res = strFecha.split("/");
	var result = res[2]+ "-" + res[1] + "-" + res[0];
	return result;
}

function formatFechaNumeral(fecha) {
	return fecha.substring(0, 4) + fecha.substring(5, 7) + fecha.substring(8);
}

function lpad(n, width, z) {
	z = z || '0';
	n = n + '';
	return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

// 20260702 MENSAJE-INI
var MSG = {

	Tipo: {
		ERR: 'ERR',
		CON: 'CON',
		INF: 'INF',
		WAR: 'WAR'
	},

	Mensajes: {
		'M1': { tipo: "ERR", msg: 'Debe ingresar la información requerida', titulo: 'Información' }
	},

	fnGetModal: function () {
		return $("#divModalMsg");
	},

	fnGetModalSiNo: function () {
		return $("#divModalMsgSiNo");
	},

	showParent: function (msg) {

		if (msg.fnOk === undefined || msg.fnOk === null) {
			UTIL.dialogResponse.Ok = function () {
				$('#divModalMsg').modal('hide');
			};
		} else {
			UTIL.dialogResponse.Ok = function () {
				$('#divModalMsg').modal('hide');
				msg.fnOk();
			};
		}

		var div = MSG.fnGetModal();
		$("#divMsgTitulo").html(msg.titulo);
		$("#divMsgContenido").html(msg.mensaje);

		var divPanel = $("#divPanelModal");
		divPanel.removeClass('panel-warning');
		divPanel.removeClass('panel-danger');
		divPanel.removeClass('panel-info');
		divPanel.removeClass('panel-success');

		switch (msg.tipo) {
			case MSG.Tipo.ERR:
				divPanel.addClass('panel-danger');
				break;
			case MSG.Tipo.INF:
				divPanel.addClass('panel-info');
				break;
			case MSG.Tipo.WAR:
				divPanel.addClass('panel-danger');
				break;
			default:
				divPanel.addClass('panel-success');
		}

		$("#btnCerrarModalMsg").unbind("click");

		$('#btnCerrarModalMsg').on('click', function (e) {
			e.preventDefault();
			UTIL.dialogResponse.Ok();
		});

		$('#divModalMsg').modal({ backdrop: 'static', keyboard: false });

	},

	showParentSiNo: function (msg) {
		var div = MSG.fnGetModalSiNo();

		//console.debug("INI mostrarMensajeSiNo()");

		//console.debug(msg.titulo + ':' + msg.mensaje);
		// Por defecto ambos botones cerrarÃ¡n el modal
		if (msg.fnNo === undefined || msg.fnNo === null) {
			UTIL.dialogResponse.No = function () {
				$('#divModalMsgSiNo').modal('hide');
			};
		} else {
			UTIL.dialogResponse.No = function () {
				$('#divModalMsgSiNo').modal('hide');
				setTimeout(msg.fnNo, 600);
			};
		}

		if (msg.fnSi === undefined || msg.fnSi === null) {
			UTIL.dialogResponse.Si = function (e) {
				if (e !== undefined && e.preventDefault !== undefined) {
					e.preventDefault();
				}
				$('#divModalMsgSiNo').modal('hide');
			};
		} else {
			UTIL.dialogResponse.Si = function () {
				$('#divModalMsgSiNo').modal('hide');
				setTimeout(msg.fnSi, 600);
			};
		}

		$("#divMsgTituloSiNo").html(msg.titulo);
		$("#divMsgContenidoSiNo").html(msg.mensaje);
		$('#divModalMsgSiNo').modal({ backdrop: 'static', keyboard: false });

	},

	show: function (msg) {

		if (msg.tipo === undefined) {
			msg.tipo = MSG.Tipo.INF;
		}

		MODALDATA.mostrarMensaje = function (msg) {
			MSG.showParent(msg);
		};

		MODALDATA.mostrarMensajeSiNo = function (msg) {
			MSG.showParentSiNo(msg);
		};

		if (msg.tipo === MSG.Tipo.CON) {
			MODALDATA.mostrarMensajeSiNo(msg);
		} else {
			MODALDATA.mostrarMensaje(msg);
		}
	},

	showERR: function (msg) {
		if (typeof msg === 'string') {
			MSG.show({ titulo: 'Error', mensaje: msg, tipo: MSG.Tipo.ERR });
		} else {
			if (msg.fnOk === undefined && msg.fnSi !== undefined) {
				msg.fnOk = msg.fnSi;
			}
			msg.titulo = msg.titulo || 'Error';
			MSG.show({ titulo: msg.titulo, mensaje: msg.mensaje, tipo: MSG.Tipo.ERR, fnOk: msg.fnOk });
		}
	},

	showINF: function (msg) {
		if (typeof msg === 'string') {
			this.show({ titulo: 'Información', mensaje: msg, tipo: MSG.Tipo.INF });
		} else {
			this.show({ titulo: 'Información', mensaje: msg.mensaje, tipo: MSG.Tipo.INF, fnOk: msg.fnOk });
		}
	},

	showWAR: function (msg) {
		if (typeof msg === 'string') {
			MSG.show({ titulo: 'Advertencia', mensaje: msg, tipo: MSG.Tipo.WAR });
		} else {
			MSG.show({ titulo: msg.titulo || 'Advertencia', mensaje: msg.mensaje, tipo: MSG.Tipo.WAR });
		}
	},

	showCON: function (msg) {
		if (msg.titulo === undefined) {
			msg.titulo = "Confirmación";
		}

		if (msg.mensaje === undefined) {
			msg.mensaje = "Confirmación";
		}

		msg.fnSi = msg.fnSi || undefined;

		msg.titulo = msg.titulo || 'Confirmación';
		msg.tipo = MSG.Tipo.CON;
		MSG.show(msg);
	}
};

var MODALDATA = MODALDATA || {
	mostrarMensaje: function(){ },
	mostrarMensajeSiNo: function(){ }
}

var UTIL = UTIL || {
	downloadFile: function (respuesta) {
		var a = document.createElement('a');
		if (window.URL && window.Blob && 'download' in a && window.atob) {
			// Do it the HTML5 compliant way
			var blob = base64ToBlob(respuesta.datos, respuesta.mimeType);
			var url = window.URL.createObjectURL(blob);
			a.href = url;
			a.download = respuesta.nombreArchivo;
			a.click();
			window.URL.revokeObjectURL(url);
		}
	},

	base64ToBlob: function (base64, mimetype, slicesize) {
		if (!window.atob || !window.Uint8Array) {
			// The current browser doesn't have the atob function. Cannot continue
			return null;
		}
		mimetype = mimetype || '';
		slicesize = slicesize || 512;
		var bytechars = atob(base64);
		var bytearrays = [];
		for (var offset = 0; offset < bytechars.length; offset += slicesize) {
			var slice = bytechars.slice(offset, offset + slicesize);
			var bytenums = new Array(slice.length);
			for (var i = 0; i < slice.length; i++) {
				bytenums[i] = slice.charCodeAt(i);
			}
			var bytearray = new Uint8Array(bytenums);
			bytearrays[bytearrays.length] = bytearray;
		}
		return new Blob(bytearrays, { type: mimetype });
	},

	dialogResponse: {},

	fncMoneyFormat: function (valor) {
		return parseFloat(parseFloat(valor).toFixed(2)).toFixed(2);
	},

	fncMoneyFormatDisplay: function (valor, mostrarSimbolo) {
		if (mostrarSimbolo === undefined) {
			return (valor).toLocaleString('es-PE', { minimumFractionDigits: 2 });
		} else {
			return "S/" + " " + (valor).toLocaleString('es-PE', { minimumFractionDigits: 2 });
		}

	},

	isString: function (valor) {
		if (typeof valor === "string") {
			return true;
		} else {
			return false;
		}
	},

	toDate: function (valor) {
		if (valor === undefined || valor === null || valor === '' || valor === '0001-01-01' || valor === '0001-01-01T00:00:00') {
			return null;
		} else {
			if (valor instanceof Date && !isNaN(valor.valueOf())) {
				valor = UTIL.DateToString(valor);
			}
			var partes = [];
			partes = valor.split("/");
			return new Date(partes[1] + '/' + partes[0] + '/' + partes[2]);
		}
	},

	fromDate: function (valor) {
		if (valor === undefined || valor === null || valor === '' || valor === '0001-01-01' || valor === '0001-01-01T00:00:00' || valor === '0001-01-01T00:00:00-05:00') {
			return null;
		} else {
			valor = valor.replace(/\//g, '');
			valor = valor.replace('-0500)', ')');
			valor = valor.replace('-05:00', '');
			valor = valor.replace('T00:00:00', '');
			valor = valor.replace('T', ' ');

			// debugger;
			valor = valor.replace(/-/g, '/');
			// debugger;
			if (valor.indexOf("Date") === -1) {
				valor = "new Date('" + valor + "')";
			} else {
				valor = 'new ' + valor;
			}

			if ((eval(valor)).getFullYear() === 1) {
				return null;
			} else {
				return new Date(eval(valor));
			}
		}
	},

	DateToString: function (valor) {
		if (valor === undefined || valor === null || valor === '' || valor === '0001-01-01' || valor === '0001-01-01T00:00:00') {
			return null;
		} else {
			return valor.defaultView();
		}
	},

	DateTimeToString: function (valor) {
		if (valor === null) {
			return null;
		} else {
			return valor.defaultDateTimeView();
		}
	},

	StringToDate: function (valor) {
		if (valor === null) {
			return null;
		} else {
			var partes = [];
			partes = valor.split("/");
			return new Date(partes[1] + '/' + partes[0] + '/' + partes[2]);
		}
	},

	JSonDateToDate: function (valor) {
		return UTIL.fromDate(valor);
	},

	JSonDateToString: function (valor) {
		return UTIL.DateToString(UTIL.JSonDateToDate(valor));
	},

	JSonDateTimeToString: function (valor) {
		return UTIL.DateTimeToString(UTIL.JSonDateToDate(valor));
	},

	StringToJsonDate: function (valor) {
		valor = UTIL.toDate(valor);

		if (valor === null) {
			return null;
		} else {
			return '\/Date(' + valor.getTime() + '-050000)\/';
		}
	},

	// Esta función se usa para enviar los datos de los controles
	// al las propiedades del Json en el envío ajax
	StringTo: function (objeto) {

		if (objeto.tipo === 'Date') {
			return UTIL.StringToJsonDate(objeto.valor);
		} else if (objeto.tipo === 'DateTime') {
			return UTIL.StringToJsonDate(objeto.valor);
		} else if (objeto.tipo === 'Boolean') {
			if (objeto.valor !== undefined) {
				if (objeto.valor === "true" || objeto.valor === true || objeto.valor === 1) {
					return true;
				} else {
					return false;
				}
			} else {
				return null;
			}
		} else {
			return objeto.valor;
		}
	},

	StringToJsonProperty: function (objeto) {
		if (objeto.tipo === 'Date') {
			if (objeto.valor === undefined || objeto.valor === null || objeto.valor === '') {
				objeto.valor = new Date(978325200000);
			}
			return UTIL.StringToJsonDate(objeto.valor);
		} else if (objeto.tipo === 'DateTime') {
			if (objeto.valor === undefined || objeto.valor === null || objeto.valor === '') {
				objeto.valor = new Date(978325200000);
			}
			return UTIL.StringToJsonDate(objeto.valor);
		} else if (objeto.tipo === 'Boolean') {
			if (objeto.valor !== undefined) {
				if (objeto.valor === "true" || objeto.valor === true || objeto.valor === 1) {
					return true;
				} else {
					return false;
				}
			} else {
				return null;
			}
		} else {
			return objeto.valor;
		}
	},

	JSonPropertyToString: function (objeto) {
		if (objeto.tipo === 'Date') {
			return UTIL.JSonDateToString(objeto.valor);
		} else if (objeto.tipo === 'DateTime') {
			return UTIL.JSonDateTimeToString(objeto.valor);
		} else if (objeto.tipo === 'Boolean') {
			if (objeto.valor !== undefined) {
				if (objeto.valor === 'true' || objeto.valor === true || objeto.valor === 1) {
					return true;
				} else {
					return false;
				}
			} else {
				return null;
			}
		} else {
			return objeto.valor;
		}
	}
	,
	enmascarar: function (selector, mask, maxlength, placeholder, valorInicial) {
		$(selector).inputmask(mask, {placeholder:""});
		if(maxlength != null) $(selector).prop("maxlength", maxlength);
		if(placeholder != null) $(selector).prop("placeholder", placeholder);
		if(valorInicial != null) $(selector).val(valorInicial);
	}
};

// MENSAJE-FIN