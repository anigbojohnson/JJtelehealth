let formData = new Map();
let formDataObject=""

    
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


$('#submit').click(function() {
  // Clear previous error messages
  
  fetch("http://127.0.0.1:8000/submit-work-medical-certificate", {
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
   window.location.href = `/payment/${encodeURIComponent(data.id)}/${encodeURIComponent('MC')}/${encodeURIComponent('work-medical-certificate')}`;

    // Handle success respons
    })
    .catch(error => {
    console.error('There was a problem with your fetch operation:', error);
  });
});

      
document.getElementById('back-personal-details').addEventListener('click', function() {
    $('#pesonalDetails').show();   
    $('#work').hide();
  });

  document.getElementById('back-work').addEventListener('click', function() {
    $('#medicalDetails').show();   
    $('#work').show();
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
        $('#previewInformationPreExistingHealthYesRow').hide();

      }else{
        $('#previewInformationPreExistingHealthYesRow').show();
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
        $('#previewMedicationsRegularlyInfoRow').hide();
      }else{
        $('#previewMedicationsRegularlyInfoRow').show();
      }
  }

  

  if ( $("input[name='preExistingHealth']:checked").val()=="Yes" && $('#informationPreExistingHealthYes').val()=="") {
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
    


  if ( $("input[name='medicationsRegularly']:checked").val()=="Yes" && $('#medicationsRegularlyInfo').val() == "") {
      $('#medicationsRegularlyInfo-error').text(errorMessage);
      isValid = false;
  } else {
    if($("input[name='medicationsRegularly']:checked").val() =="Yes"){
      console.log($('#medicationsRegularlyInfo').val())
        console.log('medication information' +$('#medicationsRegularlyInfo').val())
        formData.set('medicationsRegularlyInfo', $('#medicationsRegularlyInfo').val());
        $('#medicationsRegularlyInfo-error').text('');
        formDataObject = Object.fromEntries(formData);
        document.getElementById('previewMedicationsRegularlyInfo').innerText = $('#medicationsRegularlyInfo').val()
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


  if (!$('#medicalLetterReasons').val() && $("#sickLeave").is(":checked")) {
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

  var today = new Date();
  var yesterday = new Date(today);
  yesterday.setDate(yesterday.getDate() - 1);
  var tomorrow = new Date(today);
  tomorrow.setDate(tomorrow.getDate() + 1);

  // Convert dates to YYYY-MM-DD format
  function formatDate(date) {
      var dd = String(date.getDate()).padStart(2, '0');
      var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = date.getFullYear();
      return yyyy + '-' + mm + '-' + dd;
  }

  var validFrom = $('#validFrom').val();
  var validTo = $('#validTo').val();

  // Clear previous errors
  $('#validFrom-error').text('');
  $('#validTo-error').text('');

  if (!validFrom) {
      $('#validFrom-error').text(errorMessage);
      isValid = false;
  } else {
 

      var validFromDate = new Date(validFrom);
      if (validFrom !== formatDate(today) && validFrom !== formatDate(yesterday) && validFrom !== formatDate(tomorrow)) {
          $('#validFrom-error').text("please date must be either yesterday, today or tomorrow");
          isValid = false;
      }else{
        formData.set('validFrom', $('#validFrom').val());
        formDataObject = Object.fromEntries(formData);
        document.getElementById('previewValidFrom').innerText = formDataObject.validFrom
        $('#validFrom-error').text("");
      }
  }

  if (validTo) {
      var validToDate = new Date(validTo);
      if (validToDate < validFromDate) {
          $('#validTo-error').text("End date must be after start date.");
          isValid = false;
      } else {
          var diffDays = (validToDate - validFromDate) / (1000 * 60 * 60 * 24);
          if (diffDays > 3) {
              $('#validTo-error').text("The valid period must not exceed 3 days.");
              isValid = false;
          } else{
            formData.set('validTo', $('#validTo').val());
            $('#validTo-error').text("");
            formDataObject = Object.fromEntries(formData);
            document.getElementById('previewValidTo').innerText = formDataObject.validTo

          }
      }
  }

  if (isValid) {
      $('#medicalDetails').hide();   
      $('#previewDetails').show();
  }
});
  $('#validate-work-details').click(function() {


         var isValid = true;
         var errorMessage = "This field is required";
          // Validate acknowledgement if FitToReturn or startWork is selected
          if (!$('#dailyWorkActivities').val()) {
                $('#dailyWorkActivities-error').text(errorMessage);
                isValid = false;
          } else {
                 $('#dailyWorkActivities-error').text('');
           }

          if (!$('#placeYouWork').val()) {
            $('#placeYouWork-error').text(errorMessage);
            isValid = false;
          } else {
            $('#placeYouWork-error').text('');
          }

          if (($("#FitToReturn").is(":checked") || $("#startWork").is(":checked"))) {
              if(!$("#IAgree").is(":checked")){
                $('#IAgree-error').text(errorMessage);
                isValid = false;
              }else {
                  $('#IAgree-error').text('');

               }
    
          }

          if (($("#adjustWork").is(":checked")  && !$("input[name='adjustmentsReasons']").val())) {
                $('#adjustmentsReasons-error').text(errorMessage);
                isValid = false;
          }else{
            $('#adjustmentsReasons-error').text('');
          }

          if (!$("input[name='work']").is(":checked") ) {
                $('#seeking').text("Please select a button");
                isValid = false;
          }else{
            $('#seeking').text('');
            formData.set('work', document.querySelector('input[name="work"]:checked').id);
            formDataObject = Object.fromEntries(formData);

          }

          if (isValid==true) {
              // Submit the form
              formData.set('placeYouWork', $('#placeYouWork').val());
              formData.set('dailyWorkActivities', $('#dailyWorkActivities').val());

              formDataObject = Object.fromEntries(formData);
              console.log( formDataObject)

              document.getElementById('previewPlaceYouWork').innerText = formDataObject.placeYouWork
              document.getElementById('previewDailyWorkActivities').innerText = $('#dailyWorkActivities').val()



              if (($("#adjustWork").is(":checked") )){

                formData.set('adjustmentsReasons', $("input[name='adjustmentsReasons']").val());
                formDataObject = Object.fromEntries(formData);
                document.getElementById('previewAdjustmentsActivities').innerText = formDataObject.adjustmentsReasons
                document.getElementById('previewIAgreeRow').style.display="none";
              }else{
                document.getElementById('previewAdjustmentsActivitiesRow').style.display="none";

              }

              if (($("#FitToReturn").is(":checked") || $("#startWork").is(":checked"))){
                formData.set('IAgree', $("input[name='IAgree']").val());
                formDataObject = Object.fromEntries(formData);
                document.getElementById('previewIAgree').innerText = formDataObject.IAgree
                document.getElementById('previewAdjustmentsActivitiesRow').style.display="none";


              }else{
                document.getElementById('previewIAgreeRow').style.display="none";
              }

            
              $('#work').hide();
              $('#medicalDetails').show();

          }
  
      });

$(document).ready(function () {
  

$('#sickLeave').click(function() {
          $('#workAdjustments').hide();
          $('#acknoledgement').hide();
          $('#dailyWorkActivities-error').text('');
          $('#placeYouWork-error').text('');
          $('#IAgree-error').text('');
          $('#adjustmentsReasons-error').text('');
          $('.medicalLetterReasons').show();
          $('.previewMedicalLetterReasons').show();



          document.getElementById('previewSeeking').innerText = $('#sickLeave').val()

      });

$('#startWork').click(function() {
          $('#workAdjustments').hide();
          $('#acknoledgement').show();
          $('#dailyWorkActivities-error').text('');
          $('#placeYouWork-error').text('');
          $('#IAgree-error').text('');
          $('#adjustmentsReasons-error').text('');
          $('.medicalLetterReasons').hide();
          $('.previewMedicalLetterReasons').show();


          document.getElementById('previewSeeking').innerText = $('#startWork').val()


      });

$('#FitToReturn').click(function() {
          $('#workAdjustments').hide();
          $('#acknoledgement').show();
          $('#dailyWorkActivities-error').text('');
          $('#placeYouWork-error').text('');
          $('#IAgree-error').text('');
          $('#adjustmentsReasons-error').text('');
          $('.medicalLetterReasons').hide();
          $('.previewMedicalLetterReasons').hide();

          document.getElementById('previewSeeking').innerText = $('#FitToReturn').val()


      });

      $('#adjustWork').click(function() {
          $('#workAdjustments').show();
          $('#acknoledgement').hide();
          $('#dailyWorkActivities-error').text('');
          $('#placeYouWork-error').text('');
          $('#IAgree-error').text('');
          $('#adjustmentsReasons-error').text('');
          $('.medicalLetterReasons').hide();
          document.getElementById('previewSeeking').innerText = $('#adjustWork').val()
          $('.previewMedicalLetterReasons').hide();

      });
$('#validate-button').click( async function() {
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
     $('#work').show();
    $('#medicalDetails').hide();

      }
  });
})








