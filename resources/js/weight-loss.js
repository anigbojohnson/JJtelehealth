$(document).ready(function () {
    $('#personal-detail-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "/weight-loss-personal-details",
            method: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle success, clear error messages
                $('#address-error').text('');
                $('#fname-error').text('');
                $('#lname-error').text('');
                $('#pnumber-error').text('');
                $('#indigene-error').text('');


                $('#pesonalDetails').hide('d-none')
                $('#consultationRequest').show()                
            },
            error: function (response) {
                // Handle errors
                
                var errors = response.responseJSON.errors;
                console.log(response)
                if (errors.address) {
                    $('#address-error').text(errors.address[0]);
                }
                if (errors.fname) {
                    $('#fname-error').text(errors.fname[0]);
                }
                if (errors.lname) {
                    $('#lname-error').text(errors.lname[0]);
                }
                if (errors.pnumber) {
                    $('#pnumber-error').text(errors.pnumber[0]);
                }
                if (errors.dob) {
                    $('#dob-error').text(errors.dob[0]);
                }
                if (errors.indigene) {
                    $('#indigene-error').text(errors.indigene[0]);
                }
            }
        });
    });

    $('#consultation-loss-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "/weight-loss-consultation-details",
            method: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle success, clear error messages
                $('#requestReason-error').text('');
                $('#height-error').text('');
                $('#weight-error').text('');
               
                $('#medicalDetails').show()
                $('#consultationRequest').hide('d-none')
            },
            error: function (response) {
                // Handle errors
                var errors = response.responseJSON.errors;
                if (errors.requestReason) {
                    $('#requestReason-error').text(errors.requestReason[0]);
                }
                if (errors.height) {
                    $('#height-error').text(errors.height[0]);
                }
                if (errors.weight) {
                    $('#weight-error').text(errors.weight[0]);
                }
            }
        });
    });            
    $('.option-btn').click(function () {
        var target = $(this).data('target');
        var value = $(this).data('value');
      


        $('#' + target).val(value);
        $('#' + target + '-error').text('');

        $('button[data-target="' + target + '"]').css('background-color', '');
        $('button[data-target="' + target + '"]').css('color','blue');


        $('button[data-target="' + target + '"]').removeClass('btn-primary btn-secondary text-white');
        $(this).addClass('btn-primary text-white');
    });

    $('#back-personalDetails').on('click', function () {
        $('#pesonalDetails').show()
        $('#consultationRequest').hide('d-none')
    })

    $('#back-consultDetails').on('click', function () {
        $('#medicalDetails').hide()
        $('#consultationRequest').show()
    })

    $('#medical-detail-form').submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data
        console.log(formData)

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '/weight-loss-medical-details',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle successful submission
                $('.text-danger').text('');
                window.location.href = response.message.original[0]
                console.log(); // Log the response
                // Optionally redirect to another page or show success message
                if(response.message=="invalid"){
                    $('#text-invalid').text('Sorry, You are not qualified for weight loss treatment');
                
                }
                else{
                    console.log('jesus is lord')
                                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                $('.text-danger').text('');
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#' + key + '-error').text(value[0]); // Display error message
                    });
                }
            }
        });
    });
});