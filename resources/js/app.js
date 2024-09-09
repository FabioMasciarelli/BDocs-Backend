import "./bootstrap";
import "~resources/scss/app.scss";
import Chart from 'chart.js/auto';

import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";


//PHOTO PREVIEW 

// troviamo il pulsante per il caricamento dell' immagine e il riquadro della preview
const photoInput = document.getElementById('photo');
const photoPrewiewElem = document.getElementById('photo-preview');

// con l'if restringiamo la visualizzazione solo nelle pagine in cui sono presenti gli elementi
if (photoInput && photoPrewiewElem) {
    // verifico in console se prendo gli elementi in modo corretto
    // console.log(imageInput, imagePrewiewElem);

    // verifico il cambio del valore nell' input
    photoInput.addEventListener('change', function(){
        // verifico in console
        // console.log('input change');

        // prelevo il valore dell'input
        const photoFiles = photoInput.files;
        // verifico in console
        // console.log(photoFiles);

        // se nell'input c'è un file
        if(photoFiles && photoFiles.length > 0) {
            // verifico in console
            // console.log('file trovato', photoFiles[0]);

            // prelevo l'URL del file
            const photoUrl = URL.createObjectURL(photoFiles[0]);
            // verifico in console
            // console.log(photoUrl);

            //inseriamo nel src l'URL del file appena estrapolato
            photoPrewiewElem.src = photoUrl;

            //mostro l'immagine
            photoPrewiewElem.classList.remove('d-none');

            //una volta che la preview viene visualizzata rilasciamo la memoria dal processo di lettura dell' immagine
            photoPrewiewElem.onload = () =>
                URL.revokeObjectURL(photoPrewiewElem.src);
        } else {
            // verifico in console
            // console.log('nessun file selezionato');

            // tolgo URL dell'elemento image
            photoPrewiewElem.src = "";

            //nascondo l'immagine
            photoPrewiewElem.classList.add('d-none');
        }
    })
}

//PHOTO PREVIEW 

// --------------------------------------------------------------------------------------------------------------------------------------

//CV PREVIEW 

// Troviamo il pulsante per il caricamento del file e il riquadro della preview
const cvInput = document.getElementById('CV');
const cvPreviewElem = document.getElementById('cv-preview');

// Con l'if restringiamo la visualizzazione solo nelle pagine in cui sono presenti gli elementi
if (cvInput && cvPreviewElem) {
    // Verifico in console se prendo gli elementi in modo corretto
    console.log(cvInput, cvPreviewElem);

    // Verifico il cambio del valore nell'input
    cvInput.addEventListener('change', function(){
        // Verifico in console
        console.log('input change');

        // Prelevo il valore dell'input
        const cvFiles = cvInput.files;
        // Verifico in console
        console.log(cvFiles);

        // Se nell'input c'è un file
        if(cvFiles && cvFiles.length > 0) {
            // Verifico in console
            console.log('file trovato', cvFiles[0]);

            // Verifico che il file sia un PDF
            if (cvFiles[0].type === 'application/pdf') {
                // Prelevo l'URL del file
                const cvUrl = URL.createObjectURL(cvFiles[0]);
                // Verifico in console
                console.log(cvUrl);

                // Inserisco nel src l'URL del file appena estrapolato
                cvPreviewElem.src = cvUrl;

                // Mostro l'embed
                cvPreviewElem.classList.remove('d-none');

                // Una volta che la preview viene visualizzata, rilascio la memoria dal processo di lettura del file
                cvPreviewElem.onload = () =>
                    URL.revokeObjectURL(cvPreviewElem.src);
            } else {
                console.log('Il file selezionato non è un PDF');
                // Nascondo l'embed
                cvPreviewElem.classList.add('d-none');
            }
        } else {
            // Verifico in console
            console.log('nessun file selezionato');

            // Tolgo URL dell'elemento embed
            cvPreviewElem.src = "";

            // Nascondo l'embed
            cvPreviewElem.classList.add('d-none');
        }
    });
}

//CV PREVIEW 




