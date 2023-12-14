// Get the form and select elements
var form = document.getElementById('appointment-form');
var select = document.getElementById('appointment-time');

// Define existing appointments (for example)
var existingAppointments = ['09:00', '10:00', '11:00', '12:00'];

// Function to populate the select options
function populateOptions() {
  // Clear existing options
  select.innerHTML = '';

  // Loop through each existing appointment
  for (var i = 0; i < existingAppointments.length; i++) {
    var appointmentTime = existingAppointments[i];

    // Create a new option element
    var option = document.createElement('option');
    option.text = appointmentTime;
    option.value = appointmentTime;

    // Add the option to the select element
    select.add(option);
  }
}

// Call the function to populate the options initially
populateOptions();

// Handle form submission
form.addEventListener('submit', function(event) {
  event.preventDefault();

  // Get the selected option
  var selectedOption = select.options[select.selectedIndex];

  // Check if the selected option is disabled (already selected)
  if (selectedOption.disabled) {
    alert('This appointment is no longer available. Please choose another appointment.');
    return;
  }

  // Remove the selected option from the select element
  select.removeChild(selectedOption);

  // Update the existingAppointments array
  var selectedAppointment = selectedOption.value;
  var index = existingAppointments.indexOf(selectedAppointment);
  if (index > -1) {
    existingAppointments.splice(index, 1);
  }

  // Reset the form
  form.reset();
});
