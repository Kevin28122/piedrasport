document.addEventListener("DOMContentLoaded", function() {
    const items = document.querySelectorAll(".item");
    const modal = document.getElementById("myModal");
    const modalImg = document.getElementById("modal-img");
    const modalTitle = document.getElementById("modal-title");
    const modalDescrp = document.getElementById("modal-descrp");
    const modalPrice = document.getElementById("modal-price");
    const addToCartBtn = document.getElementById("add-to-cart");
    const closeBtn = document.querySelector(".close");

    items.forEach(item => {
        const buyBtn = item.querySelector(".buy-btn");
        buyBtn.addEventListener("click", function() {
            const productImgSrc = item.querySelector("img").getAttribute("src");
            const productName = item.querySelector("h2").innerText;
            const productDescrp = item.querySelector(".Descrp").innerText;
            const productPrice = item.querySelector(".price").innerText;    

            modalImg.src = productImgSrc;
            modalTitle.innerText = productName;
            modalDescrp.innerText = productDescrp;
            modalPrice.innerText = productPrice;

            modal.style.display = "block";
        });
    });

    addToCartBtn.addEventListener("click", function() {
        // Aquí puedes agregar la lógica para agregar el producto al carrito
        // Puedes obtener la información del producto desde las variables modalTitle, modalDescrp, modalPrice
        // Puedes obtener la cantidad desde el input con id "quantity"

        // Por ejemplo:
        const productName = modalTitle.innerText;
        const productDescrp = modalDescrp.innerText;
        const productPrice = modalPrice.innerText;
        const quantity = document.getElementById("quantity").value;

        // Luego puedes agregar esta información al carrito o realizar alguna otra acción
        console.log("Agregado al carrito:", productName, productDescrp, productPrice, "Cantidad:", quantity);

        // Cierra el modal después de agregar al carrito
        modal.style.display = "none";
    });

    // Cierra el modal al hacer clic en el botón de cerrar
    closeBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    // Cierra el modal al hacer clic fuera del modal
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});

