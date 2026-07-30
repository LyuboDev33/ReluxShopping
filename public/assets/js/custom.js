document.addEventListener('DOMContentLoaded', function () {
    checkoutInvoice();
    checkoutDelivery();
    addToWishlist();
});

function checkoutInvoice() {

    const invoiceCheckbox = document.getElementById('request_invoice');
    const invoiceFields = document.querySelector('.checkout-invoice__fields');

    if (!invoiceCheckbox || !invoiceFields) {
        return;
    }

    invoiceFields.classList.toggle('d-none', !invoiceCheckbox.checked);

    invoiceCheckbox.addEventListener('change', function () {
        invoiceFields.classList.toggle('d-none', !this.checked);
    });
}

function checkoutDelivery() {
    const personalRadio = document.querySelector(
        'input[name="delivery_method"][value="personal"]'
    );

    const officeRadio = document.querySelector(
        'input[name="delivery_method"][value="office"]'
    );

    const personalDelivery = document.getElementById('personal-delivery');
    const officeDelivery = document.getElementById('office-delivery');

    if (
        !personalRadio ||
        !officeRadio ||
        !personalDelivery ||
        !officeDelivery
    ) {
        return;
    }

    function toggleDeliveryFields() {
        if (personalRadio.checked) {
            personalDelivery.classList.remove('d-none');
            officeDelivery.classList.add('d-none');
        }

        if (officeRadio.checked) {
            officeDelivery.classList.remove('d-none');
            personalDelivery.classList.add('d-none');
        }
    }

    function clearDeliveryFields() {
        const textInputs = document.querySelectorAll(
            '.checkout-delivery input:not([type="radio"]):not([type="hidden"])'
        );

        textInputs.forEach(function(input) {
            input.value = '';
        });

        const selects = document.querySelectorAll(
            '.checkout-delivery select'
        );

        selects.forEach(function(select) {
            select.selectedIndex = 0;
            select.value = '';

            const choicesContainer = select.closest('.choices');

            if (!choicesContainer) {
                return;
            }

            const visibleChoice = choicesContainer.querySelector(
                '.choices__list--single .choices__item'
            );

            if (visibleChoice) {
                visibleChoice.textContent = select.options[0].textContent;
                visibleChoice.dataset.value = '';
                visibleChoice.style.display = '';
                visibleChoice.classList.add('choices__placeholder');
            }
        });
    }

    personalRadio.addEventListener('change', function() {
        clearDeliveryFields();
        toggleDeliveryFields();
    });

    officeRadio.addEventListener('change', function() {
        clearDeliveryFields();
        toggleDeliveryFields();
    });

    toggleDeliveryFields();
}

function addToWishlist() {

    document.querySelectorAll('.wishlist-form').forEach(function (form) {

        form.addEventListener('submit', function (e) {

            e.preventDefault();

            const button = form.querySelector('.wishlist-btn');
            const icon = button.querySelector('i');



            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {

                    if (!data.success) {
                        return;
                    }

                    document.querySelectorAll('.wishlist-count').forEach(function (wishlist) {
                        wishlist.innerHTML = data.count;
                    });

                    if (data.action === 'added') {
                        icon.classList.remove('fa-regular');
                        icon.classList.add('fa-solid');
                    } else {
                        icon.classList.remove('fa-solid');
                        icon.classList.add('fa-regular');
                    }

                })
                .catch(function (error) {
                    console.error(error);
                });

        });

    });

}
