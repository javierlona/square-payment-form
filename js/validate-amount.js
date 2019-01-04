// Create the const input field variables
const AMOUNT = document.querySelector("#sq-amount");
// Form Blur Event Listeners
AMOUNT.addEventListener("blur", validate_amount);

function validate_amount() {
  // Create regular expression
  let regularExp = /^[0-9.]{1,}$/;
  // Verify via regular expression
  if(!regularExp.test(AMOUNT.value)){
    // Add the class to
    AMOUNT.classList.add("is-invalid");
  } else {
    AMOUNT.classList.remove("is-invalid");
  }

}