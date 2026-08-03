function showError(input, message){

    const error = input.nextElementSibling;

    error.textContent = message;

    input.classList.add("input-error")
    input.classList.remove("input-success")

}

function showSuccess(input){ 

    const error = input.nextElementSibling

    error.textContent = ""

    input.classList.remove("input-error")
    input.classList.add("input-success")

}

    const form = document.getElementById("incident-form")
    const officerName = document.getElementById("officer-name")
    const officerID = document.getElementById("officer-id")
    const incidentDate = document.getElementById("incident-date")
    const reportTime = document.getElementById("appt")
    const report = document.getElementById("reporters-comment")
    const image = document.getElementById("imageUpload")

    form.addEventListener("submit", function (event) {

    event.preventDefault()

    let isValid = true

    if(officerName.value.trim()===""){
        showError(officerName,"Officer name is required.")
        isValid = false
    }else{
        showSuccess(officerName)
    }

    if(officerID.value.trim()===""){
        showError(officerID,"Officer ID is required.")
        isValid = false
    }else{
        showSuccess(officerID)
    }

    if (incidentDate.value === "") {
        showError(incidentDate, "Please select the incident date.")
        isValid = false
    } else {
        showSuccess(incidentDate)
    }

    if (reportTime.value === "") {
        showError(reportTime, "Please select the incident time.")
        isValid = false
    } else {
        showSuccess(reportTime)
    }

    if(report.value.trim().length < 20){

    showError(report,"Report must contain at least 20 characters.");

    }else{

        showSuccess(report);

    }

    const maxSize = 2 * 1024 *1024

    if (image.files.length === 0) {

    showError(image, "Please upload an image.");
    isValid = false;

    } else {

    const file = image.files[0];

    if (file.size > maxSize) {

        showError(image, "Image must be less than 2 MB.");
        isValid = false;

    } else {

        showSuccess(image);

    }

    }

    if (isValid) {

    alert("Form submitted successfully!")

    form.submit()
}
})  






