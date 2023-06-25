
const button = document.getElementById("button");
const form = document.getElementById("form");
button.addEventListener('click', (e) => {
    e.preventDefault();
    Swal.fire({
        title: '¿Seguro que quieres continuar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00c586', //green-medium-light
        cancelButtonColor: '#f3320d',  // orange-medium-light
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
        allowOutsideClick: false,
    }).then((result) => {

        if (result.isConfirmed) {
            form.submit();
        }
    })
})
