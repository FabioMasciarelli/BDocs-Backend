const registerBtn = document.querySelector('.register-button');




//PASSWORD
registerBtn.addEventListener('click', (e) => {
    const password = document.querySelector('#password').value;
    const passwordConfirm = document.querySelector('#password-confirm').value;
    const errorContainer = document.querySelector('#error-container');
    const errorMessage = document.querySelector('#error-message');

    const minChar = 8 //lunghezza minima psw
    if(password.length === 0) {
        e.preventDefault();
        errorContainer.classList.remove('d-none');
        errorMessage.innerHTML = `Si prega di inserire la password`;
    } else if(password.length < minChar) {
        e.preventDefault();
        errorContainer.classList.remove('d-none');
        errorMessage.innerHTML = `La password deve contenere minimo ${minChar} caratteri`;
    } else if(password.length !== passwordConfirm.length) {
        e.preventDefault();
        errorContainer.classList.remove('d-none');
        errorMessage.innerHTML = 'Le password sono di lunghezza diversa';
    } else if(password !== passwordConfirm) {
        e.preventDefault();
        errorContainer.classList.remove('d-none');
        errorMessage.innerHTML = 'Le password non corrispondono'; 
    }
});
