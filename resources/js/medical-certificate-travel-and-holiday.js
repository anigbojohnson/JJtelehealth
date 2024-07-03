
let formData = new Map();
let formDataObject=""

    
$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function() {
            // Clear previous error messages
            console.log()
            fetch("http://127.0.0.1:8000/submit-travel-and-holiday-medical-certificate", {
              method: 'POST',
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                  'Accept': 'application/json',
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(formDataObject)
          })
          .then(response => {
              if (!response.ok) {
                  console.log(response)
              }
              return response.json();
          })
          .then(data => {
              console.log(data);
              // Handle success response
              window.location.href = `/payment/${encodeURIComponent(data.id)}/${encodeURIComponent(data.action)}/${encodeURIComponent("travel-and-holiday-certificate")}`;

          })
          .catch(error => {
              console.error('There was a problem with your fetch operation:', error);
          
          });
            
          });

          
  document.getElementById('back-work').addEventListener('click', function() {
    $('#medicalDetails').hide();   
    $('#studiesDetials').show();
  });

  document.getElementById('back-medicals').addEventListener('click', function() {
    $('#medicalDetails').show();   
    $('#previewDetails').hide();
  });

  $('#medicationsRegularlyYes').click(function() {
          $('#medicationRegimen').show();
      
      });

      $('#medicationsRegularlyNo').click(function() {
          $('#medicationRegimen').hide();
      });


      
    $('#preExistingHealthYes').click(function() {
          $('#healthConditions').show();
      
      });

      $('#preExistingHealthNo').click(function() {
          $('#healthConditions').hide();
      });

      $('#validate-medical').click(function() {
  var isValid = true;
  var errorMessage = "This field is required";

  formData.delete('preExistingHealth');
  formData.delete('medicationsRegularly');
  formData.delete('informationPreExistingHealthYes');
  formData.delete('medicationsRegularlyInfo');
  formData.delete('startDateSymptoms');
  formData.delete('endDateSymptoms');
  formData.delete(' medicalLetterReasons');
  formData.delete('privacy');
  formData.delete('detailedSymptoms');


  // Validate radio buttons
  if (!$("input[name='preExistingHealth']:checked").val()) {
      $('#preExistingError').text("Please select an option");
      isValid = false;
  } else {
      formData.set('preExistingHealth', $("input[name='preExistingHealth']:checked").val());
      formDataObject = Object.fromEntries(formData);
      document.getElementById('previewPreExistingHealth').innerText = formDataObject.preExistingHealth

      $('#preExistingError').text('');

      if( $("input[name='preExistingHealth']:checked").val()=="No"){
        $('#previewInformationPreExistingHealthYesRow').hide()

      }else{
        $('#previewInformationPreExistingHealthYesRow').show()

      }
  }

  if (!$("input[name='medicationsRegularly']:checked").val()) {
      $('#medicationsRegularly-error').text("Please select an option");
      isValid = false;
  } else {
    formData.set('medicationsRegularly', $("input[name='medicationsRegularly']:checked").val());
      $('#medicationsRegularly-error').text('');
      formDataObject = Object.fromEntries(formData);
      document.getElementById('previewMedicationsRegularly').innerText = formDataObject.medicationsRegularly
      if( $("input[name='medicationsRegularly']:checked").val()=="No"){
        $('#previewMedicationsRegularlyInfoRow').hide()

      }else{
        $('#previewMedicationsRegularlyInfoRow').show()
      }

  }

  

  if ($('#preExistingHealthYes').is(':checked') && !$('#informationPreExistingHealthYes').val()) {
      $('#informationPreExistingHealthYes-error').text(errorMessage);
      isValid = false;
  } else {
    if($("input[name='preExistingHealth']:checked").val() =="Yes"){

    formData.set('informationPreExistingHealthYes', $('#informationPreExistingHealthYes').val());
      $('#informationPreExistingHealthYes-error').text('');
      formDataObject = Object.fromEntries(formData);
      document.getElementById('previewInformationPreExistingHealthYes').innerText = formDataObject.informationPreExistingHealthYes
    }
  }


  if ($('#medicationsRegularlyYes').is(':checked') && !$('#medicationsRegularlyInfo').val()) {
      $('#medicationsRegularlyInfo-error').text(errorMessage);
      isValid = false;
  } else {
    if($("input[name='medicationsRegularly']:checked").val() =="Yes"){

    formData.set('medicationsRegularlyInfo', $('#medicationsRegularlyInfo').val());
      $('#medicationsRegularlyInfo-error').text('');
      formDataObject = Object.fromEntries(formData);
      document.getElementById('previewMedicationsRegularlyInfo').innerText = formDataObject.medicationsRegularlyInfo
    }
  }

  var startDate = $('#startDateSymptoms').val();
  if (!startDate) {
      $('#startDateSymptoms-error').text(errorMessage);
      isValid = false;
  } else {
    formData.set('startDateSymptoms', $('#startDateSymptoms').val());
    formDataObject = Object.fromEntries(formData);
      $('#startDateSymptoms-error').text('');
      document.getElementById('previewStartDateSymptoms').innerText = formDataObject.startDateSymptoms

  }

  // Validate end date of symptoms and ensure it is after start date
  var endDate = $('#endDateSymptoms').val();
 

  if (new Date(endDate) < new Date(startDate)) {

      $('#endDateSymptoms-error').text("End date must be after start date.");
      isValid = false;
  } else {
      formData.set('endDateSymptoms', $('#endDateSymptoms').val());
      formDataObject = Object.fromEntries(formData);

      $('#endDateSymptoms-error').text('');
      document.getElementById('previewEndDateSymptoms').innerText = formDataObject.endDateSymptoms

  }


  if (!$('#medicalLetterReasons').val()) {
      $('#medicalLetterReasons-error').text(errorMessage);
      isValid = false;
  } else {
    formData.set('medicalLetterReasons', $('#medicalLetterReasons').val());
    formDataObject = Object.fromEntries(formData);

      $('#medicalLetterReasons-error').text('');
      document.getElementById('previewMedicalLetterReasons').innerText = formDataObject.medicalLetterReasons

  }

  if (!$('#detailedSymptoms').val() || $('#detailedSymptoms').val().split(' ').length < 20) {
      $('#detailedSymptoms-error').text("Please describe your symptoms in at least 20 words.");
      isValid = false;
  } else {
    formData.set('detailedSymptoms', $('#detailedSymptoms').val());
    formDataObject = Object.fromEntries(formData);

      $('#detailedSymptoms-error').text('');
      document.getElementById('previewDetailedSymptoms').innerText = formDataObject.detailedSymptoms

  }

  if (!$('#privacy').val()) {

      $('#privacy-error').text(errorMessage);
      isValid = false;
  } else {
    formData.set('privacy', $('#privacy').val());
    formDataObject = Object.fromEntries(formData);

      $('#privacy-error').text('');
      document.getElementById('previewPrivacy').innerText = formDataObject.privacy

  }

  if (isValid) {
      $('#medicalDetails').hide();   
      $('#previewDetails').show();
  }
});

$(document).ready(function () {




$('#validate-button').click(function() {
      // Clear previous error messages

      $('.text-danger').text('');

      // Perform validation
      let valid = true;

      let fname = $('#fname').val();
      let lname = $('#lname').val();
      let dob = $('#dob').val();
      let pnumber = $('#pnumber').val();
      let gender = $('#gender').val();
      let indigene = $('#indigene').val();
      let address = $('#address').val();

      const phoneRegex = /^(?:\+61|0)[2-478](?:[ -]?[0-9]){8}$/;

      if (!fname) {
          $('#fname-error').text('The first name field is required.');
          valid = false;
      }

      if (!lname) {
          $('#lname-error').text('The last name field is required.');
          valid = false;
      }

      if (!dob) {
          $('#dob-error').text('The date of birth field is required.');
          valid = false;
      } else {
          // Calculate age from the date of birth
          let today = new Date();
          let birthDate = new Date(dob);
          let age = today.getFullYear() - birthDate.getFullYear();
          let month = today.getMonth() - birthDate.getMonth();
          if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
              age--;
          }
          // Check if age is less than 18
          if (age < 18) {
              $('#dob-error').text('You must be 18 years or older.');
              valid = false;
          }
      }

      if (!pnumber || !phoneRegex.test(pnumber)) {
          $('#pnumber-error').text('Please enter a valid Australian phone number.');
          valid = false;
      }

      if (!gender) {
          $('#gender-error').text('The gender field is required.');
          valid = false;
      }

      if (!indigene) {
          $('#indigene-error').text('The indigenous origin field is required.');
          valid = false;
      }

      if (!address) {
          $('#address-error').text('The address field is required.');
          valid = false;
      }

      // If validation passes, transfer data to the second form

      if (valid == true) {


        formData.set('fname', fname);
        formData.set('lname', lname);
        formData.set('dob', dob);
        formData.set('pnumber', pnumber);
        formData.set('gender', gender);
        formData.set('indigene', indigene);
        formData.set('address', address);


  
    formDataObject = Object.fromEntries(formData);

    document.getElementById('previewFirstName').innerText = formDataObject.fname;
    document.getElementById('previewLastName').innerText = formDataObject.lname;
    document.getElementById('previewDob').innerText = formDataObject.dob;
    document.getElementById('previewPhoneNumber').innerText = formDataObject.pnumber;
    document.getElementById('previewGender').innerText = formDataObject.gender;
    document.getElementById('previewIndigenousOrigin').innerText = formDataObject.indigene;
    document.getElementById('previewAddress').innerText = formDataObject.address

       $('#pesonalDetails').hide();
       $('#medicalDetails').show();


      }
  });
})

