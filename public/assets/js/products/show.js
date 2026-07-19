document.addEventListener('DOMContentLoaded', function () {
    resetRadioButtons();
    resetIndexRadioBtns();
    changeInputType();
    initializeGlassSummaryAccordion();
    initializeConfiguratorReset();
});


function resetRadioButtons() {
    const resetButton = document.getElementById('frame-with-glasses-tab-button');

    if (!resetButton) {
        return;
    }

    resetButton.addEventListener('click', function () {
        document.querySelectorAll('input[type="radio"]').forEach(function (radioButton) {
            radioButton.checked = false;
        });
    });
}

function resetIndexRadioBtns() {
    const buttons = document.querySelectorAll('.configurator-option__card');
    const lensOptions = document.querySelectorAll('.glass-value-lens-options input[type="radio"]');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            lensOptions.forEach(function(option) {
                option.checked = false;
            });
        });
    });
}

function initializeGlassSummaryAccordion() {
    const summaries = document.querySelectorAll('.glass-type-configurator > summary');

    if (!summaries.length) {
        return;
    }

    summaries.forEach(function (summary) {
        summary.addEventListener('click', function () {
            const currentDetails = this.parentElement;

            /*
             * Reset all radio buttons.
             */
            document.querySelectorAll('input[type="radio"]').forEach(function (radioButton) {
                radioButton.checked = false;
            });

            /*
             * Reset every inner accordion.
             */
            document.querySelectorAll('.accrodion').forEach(function (accordion) {
                accordion.classList.remove('active');
            });

            document.querySelectorAll('.accrodion-content').forEach(function (content) {
                content.style.display = 'none';
            });

            /*
             * If this accordion is already open,
             * let the browser close it naturally.
             */
            if (currentDetails.hasAttribute('open')) {
                return;
            }

            /*
             * Close every other glass accordion.
             */
            document.querySelectorAll('.glass-type-configurator[open]').forEach(function (details) {
                if (details !== currentDetails) {
                    details.removeAttribute('open');
                }
            });
        });
    });
}

function initializeConfiguratorReset() {
    /*
     * Add any future reset button IDs or classes here.
     */
    const resetTriggerSelectors = [
        '#frame-with-glasses-tab-button',
        '.showVisionBtns'
    ];

    const resetTriggers = document.querySelectorAll(
        resetTriggerSelectors.join(', ')
    );

    if (!resetTriggers.length) {
        return;
    }

    function resetConfigurator() {
        /*
         * Reset all radio buttons.
         */
        document.querySelectorAll('input[type="radio"]')
            .forEach(function (radioButton) {
                radioButton.checked = false;
            });

        /*
         * Close all native details accordions.
         */
        document
            .querySelectorAll('.glass-type-configurator[open]')
            .forEach(function (details) {
                details.removeAttribute('open');
            });

        /*
         * Reset all inner accordions.
         */
        document
            .querySelectorAll('.accrodion')
            .forEach(function (accordion) {
                accordion.classList.remove('active');
            });

        /*
         * Hide all inner accordion content.
         */
        document
            .querySelectorAll('.accrodion-content')
            .forEach(function (content) {
                content.style.display = 'none';
            });
    }

    resetTriggers.forEach(function (trigger) {
        trigger.addEventListener('click', resetConfigurator);
    });
}



function changeInputType() {
    const purchaseTypeTabs = document.querySelectorAll('.purchase-type-tab');
    const purchaseTypeInput = document.getElementById('purchase_type');

    if (!purchaseTypeTabs.length || !purchaseTypeInput) {
        return;
    }

    purchaseTypeTabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            purchaseTypeInput.value = this.dataset.purchaseType;
        });
    });
}
