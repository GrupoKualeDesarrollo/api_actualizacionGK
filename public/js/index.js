let _token = document.getElementById("token");

const table = $("#tabla_actualizacion").DataTable({
    dom: "frtip",
    ordering: true,
    searching: true,
    paging: true,
    lengthMenu: [15],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json", // Reemplaza 'Spanish' por el idioma deseado
    },
});

function consultar() {
    Swal.fire({
        title: "Buscando ticket",
        allowOutsideClick: false,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
    });

    const fecha_inicio = document.getElementById("desde").value;
    const fecha_fin = document.getElementById("hasta").value;

    const data = {
        desde: fecha_inicio,
        hasta: fecha_fin,
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
        })
        .catch((error) => console.error("Error:", error));

    Swal.close();
}
