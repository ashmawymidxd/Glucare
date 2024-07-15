<!-- Modal -->
<div class="modal fade update-status-modal" id="update_status{{ $patient->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Status Change</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Patients_update_status') }}" method="post" autocomplete="off" class="updateStatusForm">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        {{-- <label for="status">Status</label> --}}
                        <select class="main-input rounded-1" name="status" required>
                            <option value="" selected disabled>--Choose--</option>
                            <option value="1">Enabled</option>
                            <option value="0">Not_enabled</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="{{ $patient->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submitButton_USD">submit
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ajax code to send request -->
@push('js')
    <script>
        $(document).ready(function() {
            $('.updateStatusForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                // Disable the submit button and show loading text or spinner
                $('.submitButton_USD').prop('disabled', true).html(
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
                        $('.submitButton_UPD').prop('disabled', false).html('Submit');

                        // close this modal
                        $('.update-status-modal').modal('hide');

                        // Open the modal
                        $('#patientAlert').modal('show');
                    },
                });
            });
        });
    </script>
@endpush