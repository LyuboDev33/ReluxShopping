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

    const personalRadio = document.querySelector('input[name="delivery_method"][value="personal"]');
    const officeRadio = document.querySelector('input[name="delivery_method"][value="office"]');

    const personalDelivery = document.getElementById('personal-delivery');
    const officeDelivery = document.getElementById('office-delivery');

    const city = document.querySelector('input[name="city"]');
    const billingAddress = document.querySelector('input[name="billing_address"]');
    const officeList = document.querySelector('input[name="office_list"]');

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
        } else {

            personalDelivery.classList.add('d-none');
            officeDelivery.classList.remove('d-none');
        }
    }

    toggleDeliveryFields();

    personalRadio.addEventListener('change', function () {

        if (officeList) {
            officeList.value = '';
        }

        personalDelivery.classList.remove('d-none');
        officeDelivery.classList.add('d-none');
    });

    officeRadio.addEventListener('change', function () {

        if (city) {
            city.value = '';
        }

        if (billingAddress) {
            billingAddress.value = '';
        }

        personalDelivery.classList.add('d-none');
        officeDelivery.classList.remove('d-none');
    });
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
