<!-- Modal -->
<div class="modal fade delete-appoint-status-modal" id="delete{{ $appointment->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    delete doctors</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('appointments.destroy', 'test') }}" method="post" class="deleteUpdateForm">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5>!! delete {{ $appointment->name }}</h5>
                    <input type="hidden" value="1" name="delete_type">
                    <input type="hidden" name="id" value="{{ $appointment->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger submitButton_DUA">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade delete-appoint-status-modal" id="archive{{ $appointment->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    archive doctors</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('appointments.destroy', 'test') }}" method="post" class="deleteUpdateForm">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5>!! archive {{ $appointment->name }}</h5>
                    <input type="hidden" value="0" name="delete_type">
                    <input type="hidden" name="id" value="{{ $appointment->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger submitButton_DUA">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ajax code to send request -->
@push('js')
    <script>
        $(document).ready(function() {
            $('.deleteUpdateForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                // Disable the submit button and show loading text or spinner
                $('.submitButton_DUA').prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                // Serialize form data
                var formData = $(this).serialize();

                // Send AJAX request
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'delete',
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
                        $('.submitButton_DUA').prop('disabled', false).html('Submit');

                        // close this modal
                        $('.delete-appoint-status-modal').modal('hide');

                        // Open the modal
                        $('#appointmentAlert').modal('show');
                    },
                });
            });
        });
    </script>
@endpush
