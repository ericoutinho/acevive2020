    const campo_cidade = document.getElementById('js-select-cidade');
    const campo_empresa = document.getElementById('js-select-empresa');
    const campo_whatsapp = document.getElementById('js-input-whatsapp');
    const botao_agendar = document.getElementById('js-btn-agendar');
    const form_agendamento = document.getElementById('form-agendamento');


    function sanitizePhone(element) {
        let value = element.target.value.split('');
        let out = '';
        for (let v in value) {
            if (value[v].match(/^[0-9]+$/)) {
                out += value[v];
            }
        }
        element.target.value = out;
    }

    campo_whatsapp.addEventListener('keyup', (e) => sanitizePhone(e));
    campo_whatsapp.addEventListener('focusout', (e) => sanitizePhone(e));


    function phoneLenght(element) {
        if (element.target.value.length > 5) {
            botao_agendar.removeAttribute('disabled');
        } else {
            botao_agendar.setAttribute('disabled', 'disabled');
        }
    }

    campo_whatsapp.addEventListener('keyup', (e) => phoneLenght(e));
    campo_whatsapp.addEventListener('focusout', (e) => phoneLenght(e));

    campo_empresa.addEventListener('change', (e) => {
        let empresa = e.target.value;
        botao_agendar.setAttribute('disabled', 'disabled');
        campo_whatsapp.setAttribute('disabled', 'disabled');
        campo_whatsapp.value = '';
        if (empresa) {
            campo_whatsapp.removeAttribute('disabled');
        }
    });

    campo_cidade.addEventListener('change', (e) => {
        let cidade = e.target.value;
        let url = e.target.dataset.url;

        botao_agendar.setAttribute('disabled', 'disabled');
        campo_empresa.setAttribute('disabled', 'disabled');
        campo_whatsapp.setAttribute('disabled', 'disabled');
        campo_whatsapp.value = '';

        if (cidade) {
            jQuery.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        action: 'ajaxGetEmpresas',
                        cidade: cidade
                    },
                    beforeSend: function (xhr) {
                        campo_empresa.innerHTML = "<option>Carregando...</option>";
                    }
                })
                .done(function (data) {
                    if (data) {
                        campo_empresa.removeAttribute('disabled');
                        campo_empresa.innerHTML = data;
                    }
                })
                .fail(function () {
                    alert('Não foi possível recuperar os dados');
                });
        } else {
            campo_empresa.innerHTML = "<option>Escolha a empresa</option>";
        }

    });

    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();