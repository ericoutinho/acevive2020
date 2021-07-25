
/**
 * LGPD Modal
 */
const lgpd_btn = document.querySelector('#js-btn-lgpd');
const lgpd_modal = document.querySelector('.js-lgpd-modal');

if (!localStorage.getItem("__lgpd_acept")) {
    lgpd_modal.style.display = 'block';
}

lgpd_btn.addEventListener('click', function(e){
    lgpd_modal.style.display = 'none';
    localStorage.setItem("__lgpd_acept", "acepted");
});