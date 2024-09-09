import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";

const $one = document.querySelector.bind(document);
const $all = document.querySelectorAll.bind(document);


const openModalDelete = $one('.ms-openModalDelete');
const closeModalDelete = $one('.ms-closeModalDelete');

openModalDelete.addEventListener('click', function() {
    
    console.log('open modal');

    const modalDelete = $one('.ms-modal-delete');
    modalDelete.classList.remove('d-none');
    // modalDelete.classList.add('bg-secondary');
    modalDelete.classList.add('ms-modal'); //custom class per il modale e l'effetto ease-in 

    const container = $one('.ms-container-index');
    container.classList.add('opacity-25');
});


closeModalDelete.addEventListener('click', function() {

    console.log('close modal');

    const modalDelete = $one('.ms-modal-delete');
    modalDelete.classList.add('d-none');

    const container = $one('.ms-container-index');
    container.classList.remove('opacity-25');
});




