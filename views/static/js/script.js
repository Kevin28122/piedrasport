const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("light");
    }else{
        localStorage.setItem("light","set");
    }
}

function isLight(){
    return localStorage.getItem("light");
}

if(isLight()){
    toggleRootClass();
}

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById('searchInput');
    const dataTable = document.getElementById('dataTable').querySelector('tbody');
    const rows = dataTable.getElementsByTagName('tr');
    let asc = true;
    let perPage = 10;
    let currentPage = 1;

    searchInput.addEventListener('keyup', filterTable);
    document.getElementById('perPageSelect').addEventListener('change', function () {
        perPage = parseInt(this.value);
        filterTable();
    });

    document.getElementById('prevPageButton').addEventListener('click', function () {
        if (currentPage > 1) {
            currentPage--;
            updatePagination();
        }
    });

    document.getElementById('nextPageButton').addEventListener('click', function () {
        const lastPage = Math.ceil(filteredRows.length / perPage);
        if (currentPage < lastPage) {
            currentPage++;
            updatePagination();
        }
    });

    let filteredRows = [];
    function filterTable() {
        const searchText = searchInput.value.toLowerCase();
        filteredRows = [];

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let found = false;

            for (let cell of cells) {
                if (cell.innerHTML.toLowerCase().includes(searchText)) {
                    found = true;
                    break;
                }
            }

            if (found) {
                row.style.display = '';
                filteredRows.push(row);
            } else {
                row.style.display = 'none';
            }
        }

        currentPage = 1; // Reiniciar a la primera página al filtrar
        updatePagination();
    }

    function updatePagination() {
        const startIndex = (currentPage - 1) * perPage;
        const endIndex = startIndex + perPage;

        for (let i = 0; i < filteredRows.length; i++) {
            if (i >= startIndex && i < endIndex) {
                filteredRows[i].style.display = '';
            } else {
                filteredRows[i].style.display = 'none';
            }
        }
    }

    // Mostrar los primeros 'perPage' registros al cargar la página
    filterTable();
});

document.addEventListener('DOMContentLoaded', function() {
    // Evento de clic para el botón "Actualizar"
    document.querySelectorAll('.btn.btn-warning.btn-sm').forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const id = row.querySelector('td:first-child').innerText;
            const nombre = row.querySelector('td:nth-child(2)').innerText;

            // Rellena los campos de la modal con los datos correspondientes
            document.getElementById('updateId').value = ID;
            document.getElementById('updateNombreInput').value = NOMBRE;

            // Abre la modal
            const updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
            updateModal.show();
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Evento de clic para el botón "Eliminar" en la tabla
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            // Obtener el ID del registro que se eliminará
            const id = this.getAttribute('data-id');

            // Actualizar el valor del campo de entrada en la modal de confirmación con el ID correspondiente
            document.getElementById('deleteRecordIdInput').value = id;

            // Mostrar la modal de confirmación
            const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            confirmDeleteModal.show();

            // Manejar clic en el botón "Eliminar" de la modal de confirmación
            document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                // Aquí puedes agregar la lógica para eliminar el registro de la base de datos
                // Por ahora, simplemente eliminamos la fila de la tabla
                const row = document.querySelector('.delete-button[data-id="' + id + '"]').closest('tr');
                row.remove();

                // Cerrar la modal de confirmación
                confirmDeleteModal.hide();
            });
        });
    });

    // Remover el evento clic del botón "Eliminar" de la modal al ocultar la modal
    document.getElementById('confirmDeleteModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('confirmDeleteButton').removeEventListener('click');
    });
});





