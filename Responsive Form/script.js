function validateForm() {
    const owner = document.getElementById("owner").value.trim();
    const regNumber = document.getElementById("reg_number").value.trim();
    const engineNumber = document.getElementById("engine_number").value.trim();
    const cc = document.getElementById("cc").value.trim();
    const district = document.getElementById("district").value;
    const vehicleType = document.querySelector('input[name="vehicle_type"]:checked');
    const errorMessage = document.getElementById("error-message");

    let isValid = true;
    errorMessage.innerHTML = ""; // Clear previous errors

    // Validate owner
    if (owner === "") {
        errorMessage.innerHTML += "Owner's name is required.<br>";
        isValid = false;
    }

    // Validate vehicle registration number
    if (regNumber === "") {
        errorMessage.innerHTML += "Vehicle registration number is required.<br>";
        isValid = false;
    }

    // Validate engine number
    if (engineNumber === "") {
        errorMessage.innerHTML += "Engine number is required.<br>";
        isValid = false;
    }

    // Validate cc
    if (cc === "" || isNaN(cc) || cc <= 0) {
        errorMessage.innerHTML += "Valid CC (Cubic Capacity) is required.<br>";
        isValid = false;
    }

    // Validate district selection
    if (district === "") {
        errorMessage.innerHTML += "Please select a district.<br>";
        isValid = false;
    }

    // Validate vehicle type selection
    if (!vehicleType) {
        errorMessage.innerHTML += "Please select a vehicle type.<br>";
        isValid = false;
    }

    return isValid;
}
