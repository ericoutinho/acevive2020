const newsletterEmail   = document.querySelector("#js-newsletter-email");
const newsletterSubmit  = document.querySelector("#js-newsletter-submit");
const newsletterForm    = document.querySelector("#js-newsletter-form");
const newsletterInfo    = document.getElementById('js-newsletter-info');

newsletterForm.addEventListener('submit', function (e) {
    e.preventDefault();
    if (newsletterEmail.value != '') {
        jQuery.ajax({
                url: e.target.dataset.url,
                type: 'POST',
                data: {
                    action: "ajaxNewsletter",
                    email: newsletterEmail.value
                },
                beforeSend: function (xhr) {
                    newsletterEmail.setAttribute('disabled', 'disabled');
                    newsletterSubmit.setAttribute('disabled', 'disabled');
                    newsletterInfo.classList.remove('alert-success','alert-info','alert-warning');
                    newsletterInfo.classList.add('d-none');
                    newsletterInfo.innerHTML = '';
                }
            })
            .done(function(data){
                console.log(data);
                switch (data) {
                    case 'success':
                        newsletterInfo.classList.remove('d-none');
                        newsletterInfo.classList.add('alert-success');
                        newsletterInfo.innerHTML = "<i class='far fa-thumbs-up mr-2'></i>Obrigado por se cadastrar!";
                        break;
                    case 'match':
                        newsletterInfo.classList.remove('d-none');
                        newsletterInfo.classList.add('alert-info');
                        newsletterInfo.innerHTML = "<i class='fas fa-info-circle mr-2'></i>Este email já está cadastrado.<br/><small>";
                        break;
                    default:
                        newsletterInfo.classList.remove('d-none');
                        newsletterInfo.classList.add('alert-warning');
                        newsletterInfo.innerHTML = "<i class='far fa-thumbs-down mr-2'></i>Não foi possível cadastrar o e-mail.";
                        break;
                }
            })
            .fail(function(errorThrow){
                console.error(errorThrow);
            })
            .always(function(){
                newsletterEmail.value = '';
                newsletterEmail.removeAttribute('disabled');
                newsletterSubmit.removeAttribute('disabled');
            })
    }
})