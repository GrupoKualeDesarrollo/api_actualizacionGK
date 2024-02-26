let _token = document.getElementById("token");
document.addEventListener("DOMContentLoaded", function () {
    $("#tabla_actualizacion").DataTable({
        dom: "frtip",
        ordering: true,
        searching: true,
        paging: true,
        lengthMenu: [15],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json", // Reemplaza 'Spanish' por el idioma deseado
        },
    });
});

let selectEmpresa = document.getElementById("empresa");
let selectTipoDocumento = document.getElementById("tipoDocumento");

selectEmpresa.addEventListener("change", () => {
    selectTipoDocumento.innerHTML = "";

    const empresaSeleccionada = selectEmpresa.value;
    console.log(empresaSeleccionada);

    if(empresaSeleccionada === ""){
        return
    }

    if (empresaSeleccionada === "3") { //Tinto
        const opcionesEmpresa = [
            { value: "38", text: "38 - Pago en efectivo del cliente" },
            { value: "55", text: "55 - Ingreso por Traspaso" },
            { value: "56", text: "56 - Ingreso Bancario Tinto TC" },
            { value: "57", text: "57 - Ingreso Bancario Tinto TD" },
            { value: "58", text: "58 - Egreso Bancario Comisiones - IVA TINTO TCredito" },
            { value: "59", text: "59 - Egreso Bancario Comisiones - IVA TINTO TDebito" },
        ];  
        opcionesEmpresa.forEach(opcion => {
            const opcionElemento = document.createElement("option");
            opcionElemento.value = opcion.value;
            opcionElemento.text = opcion.text;
            selectTipoDocumento.appendChild(opcionElemento);
        });
    } else { // CJr y DQ
        
        const opcionesEmpresa = [
            { value: "56", text: "56 - Ingreso Bancario Panamericano" },
            { value: "57", text: "57 - Egreso Comisiones - IVA" },
            { value: "58", text: "58 - Ingreso Bancario Tarjetas" }
        ];

        opcionesEmpresa.forEach(opcion => {
            const opcionElemento = document.createElement("option");
            opcionElemento.value = opcion.value;
            opcionElemento.text = opcion.text;
            selectTipoDocumento.appendChild(opcionElemento);
        });
    }

    
});

//DATOS DEL FORMULARIO
let fecha_inicio;
let fecha_fin;
let empresa;
let tipoDocumento;

function consultar() {
    Swal.fire({
        title: "Buscando ticket",
        allowOutsideClick: false,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
    });

    fecha_inicio = document.getElementById("desde").value;
    fecha_fin = document.getElementById("hasta").value;
    empresa = document.getElementById("empresa").value;
    tipoDocumento = document.getElementById("tipoDocumento").value;

    const data = {
        desde: fecha_inicio,
        hasta: fecha_fin,
        empresa: empresa,
        tipoDocumento: tipoDocumento,
    };

    console.log(data);

    fetch("/consultarInformacion", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token.value,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            console.log(response.respuesta);
            console.log(response.mensaje);
            alertas(response.respuesta, response.mensaje);

            console.log(response.datos);
            const respuesta = response.respuesta;

            // switch (respuesta) {
            //     case 1:
            //         var tabla = "";
            //         destruirDataTable();
            //         document.querySelector(
            //             "#tabla_actualizacion tbody"
            //         ).innerHTML = "";

            //         datos = response.datos;

            //         datos.forEach((dato) => {
            //             var metodoPago = ""
            //             if(dato.OtroMetodoDePago === "" || dato.OtroMetodoDePago === " "){
            //                 metodoPago = "No registrado"
            //             }else{
            //                 metodoPago = dato.OtroMetodoDePago
            //             }
            //             var fecha = dato.Fecha.slice(0, 10);
            //             let fila = "<tr>";
            //             fila += "<td>" + dato.Folio + "</td>";
            //             fila += "<td>" + fecha + "</td>";
            //             fila += "<td>" + dato.Concepto + "</td>";
            //             fila += "<td>" + dato.NumPol + "</td>";
            //             fila +=
            //                 "<td>" +
            //                 formatoFinal(formatearNumero(dato.Total)) +
            //                 "</td>";
            //             fila += "<td>" + metodoPago + "</td>";
            //             fila += "</tr>";
                        

            //             document.querySelector(
            //                 "#tabla_actualizacion tbody"
            //             ).innerHTML += fila;
            //         });

            //         datateibol();
            //         Swal.close();
            //         alertas(respuesta, response.mensaje);
            //         break;
            //     case 2:
            //         alertas(respuesta, response.mensaje);
            //         break;
            //     default:
            //         break;
            // }
        })
        .catch((error) => console.error("Error:", error));
}

function destruirDataTable() {
    if ($.fn.DataTable.isDataTable("#tabla_actualizacion")) {
        $("#tabla_actualizacion").DataTable().destroy();
        console.log("destruido tabla actualizacion");
    }
}

function datateibol() {
    $("#tabla_actualizacion").DataTable({
        dom: "frtip",
        ordering: true,
        searching: true,
        paging: true,
        lengthMenu: [15],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json", // Reemplaza 'Spanish' por el idioma deseado
        },
    });
}

function formatearNumero(numero) {
    // Redondear a 2 decimales
    const numeroRedondeado = Math.round(numero * 100) / 100;

    // Convertir a número con 2 decimales
    const numeroFormateado = parseFloat(numeroRedondeado.toFixed(2));

    let numeroEntero;
    if (numeroFormateado < 0) {
        numeroEntero = numeroFormateado * -1;
    } else {
        numeroEntero = numeroFormateado;
    }
    return numeroEntero;
}

function formatoFinal(cifra) {
    let numeroFinal = Number(cifra).toLocaleString("es-MX", {
        style: "decimal",
        currency: "MXN",
    });

    return numeroFinal;
}

function actualizar() {
    console.log("Datos a enviar para modificar");
    // console.log(fecha_inicio, fecha_fin, empresa, tipoDocumento);

    const data = {
        desde: fecha_inicio,
        hasta: fecha_fin,
        empresa: empresa,
        tipoDocumento: tipoDocumento,
    };

    console.log(data);

    fetch("/actualizarInformacion", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token.value,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            const respuesta = response.respuesta;
            const mensaje = response.mensaje;

            alertas(respuesta, mensaje);
        })
        .catch((error) => console.error("Error:", error));
}
