function alertas(idAlerta, mensaje) {
    switch (idAlerta) {
        case 1: //registro exitoso
            Swal.fire({
                position: "center",
                icon: "success",
                title: mensaje,
                showConfirmButton: false,
                timer: 2000,
            });
            break;
        case 2: //error
            Swal.fire({
                position: "center",
                icon: "error",
                title: mensaje,
                showConfirmButton: false,
                timer: 2000,
            });
            break;
        case 3: //datos incompletos
            Swal.fire({
                position: "center",
                icon: "warning",
                title: mensaje,
                showConfirmButton: false,
                timer: 2000,
            });
            break;
        default:
            break;
    }
}