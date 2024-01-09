document.addEventListener('DOMContentLoaded', function() {

    document.getElementById("messagesContainer").style.display = 'none';
    const checkbox = document.getElementById('unknown_date_of_birth');
    const dateOfBirthContainer = document.getElementById('dateOfBirthContainer');
    const estimatedAgeContainer = document.getElementById('estimatedAgeContainer');

    const datePickerInput = document.getElementById('date_of_birth')
    const estimatedAgeInput = document.getElementById('estimated_age')

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            dateOfBirthContainer.style.display = 'none';
            estimatedAgeContainer.style.display = 'block';
            datePickerInput.value = null
        } else {
            dateOfBirthContainer.style.display = 'block';
            estimatedAgeContainer.style.display = 'none';
            estimatedAgeInput.value = null
        }
    });

    datePickerInput.addEventListener('keyup', function() {
        estimatedAgeInput.value = null
    });

    estimatedAgeInput.addEventListener('keyup', function() {
        datePickerInput.value = null
    });

});


