document.addEventListener("DOMContentLoaded", function () {
    const myModal = document.getElementById('myAdministrateur');
    myModal.addEventListener('click', () => {
        $('#administrateur').modal('show');
    });
});