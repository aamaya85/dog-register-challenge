document.getElementById("submitForm").addEventListener("click", function (e) {

    document.getElementById("messagesContainer").style.display = 'none';
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const estimatedAge = document.getElementById("estimated_age").value;
    const dateOfBirth = document.getElementById("date_of_birth").value;
    const unknowndateOfBirth = document.getElementById("unknown_date_of_birth").checked;

    // Objeto con los datos del formulario
    const formData = {
        name,
        estimated_age: estimatedAge,
        date_of_birth: dateOfBirth,
        unknown_date_of_birth: unknowndateOfBirth,
    };

    // Enviar la solicitud
    fetch("/dogs/store", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"), // CSRF token
        },
        body: JSON.stringify(formData),
    })
        .then(async (response) => {
            const responseData = await response.json();
            if (!response.ok) {
                showMessage(responseData.message, 'error');
            } else {
                showMessage(responseData.message, 'success');
                clearForm();
            }
        })
        .catch((error) => {
            showMessage("Error sending form, contact admin", 'error');
        });
});

const showMessage = (message, type) => {
    document.getElementById('messagesContainer').style.display = 'block';
    const messagesContainer = document.getElementById('messagesContainer');
    messagesContainer.className = type === 'error' ? 'alert alert-danger mt-3' : 'alert alert-success mt-3';
    messagesContainer.innerHTML = message;
};

const clearForm = () => {
    document.getElementById("createDogForm").reset()
}