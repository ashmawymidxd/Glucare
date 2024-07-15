<!-- Modal -->
<div class="modal fade add-diagnostics-modal" id="add_diagnosis{{ $appointment->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Diagnosis For This Patient</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Diagnostics.store') }}" method="POST" class="addDiagnosticsModel">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                    <input type="hidden" name="patient_id" value="{{ $appointment->patient_id }}">
                    <input type="hidden" name="doctor_id" value="{{ $appointment->doctor_id }}">

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Diagnosis</label>
                        <textarea class="form-control" name="diagnosis" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Medicen</label>
                        <textarea class="form-control" name="medicine" rows="6"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary submitButton_ADB">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ajax code to send request -->
@push('js')
    <script>
        $(document).ready(function() {
            $('.addDiagnosticsModel').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                // Disable the submit button and show loading text or spinner
                $('.submitButton_ADB').prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                // Serialize form data
                var formData = $(this).serialize();

                // Send AJAX request
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#responseMessage').html('<div class="alert alert-success">' +
                            response.message + '</div>');
                    },
                    error: function(xhr, status, error) {
                        // Parse the JSON response if it's a JSON string
                        var errorResponse = JSON.parse(error.responseText);

                        // Check if the errorResponse has a 'message' property
                        if (errorResponse.message) {
                            var errorHtml = '<div class="alert alert-primary">' + errorResponse
                                .message + '</div>';

                            for (var fieldName in errorResponse.errors) {
                                if (errorResponse.errors.hasOwnProperty(fieldName)) {
                                    var fieldErrors = errorResponse.errors[fieldName];
                                    fieldErrors.forEach(function(errorMessage) {
                                        errorHtml +=
                                            '<div class="alert alert-primary">' +
                                            errorMessage + '</div>';
                                    });
                                }
                            }

                            $('#responseMessage').html(errorHtml);
                        }
                    },
                    complete: function() {
                        // Enable the submit button and restore its original text
                        $('.submitButton_ADB').prop('disabled', false).html('Submit');

                        // close this modal
                        $('.add-diagnostics-modal').modal('hide');

                        // Open the modal
                        $('#appointmentAlert').modal('show');
                    },
                });
            });
        });
    </script>
@endpush
