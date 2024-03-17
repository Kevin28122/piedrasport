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


