<!-- Modal -->
<div class="modal fade update-modal" id="edit{{ $section->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ trans('Dashboard/section.edit_section_modal') }}</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('section.update', 'test') }}" method="post" id="updateForm">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $section->id }}">
                    <label for="exampleInputPassword1"></label>
                    <input type="text" name="name" value="{{ $section->name }}" class="main-input"
                        placeholder="name sections">
                </div>
                <div class="modal-body">
                    <textarea type="text" name="description" class="main-textarea">{{ $section->description }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal"
                        aria-label="Close">{{ trans('Dashboard/common.close') }}</button>
                    <button type="submit"
                        class="btn btn-primary submitButton_US">{{ trans('Dashboard/common.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ajax code to send request -->
@push('js')
    <script>
        $(document).ready(function() {
            $('#updateForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                // Disable the submit button and show loading text or spinner
                $('.submitButton_US').prop('disabled', true).html(
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
                            var errorHtml = '<div class="alert alert-warning">' + errorResponse
                                .message + '</div>';

                            for (var fieldName in errorResponse.errors) {
                                if (errorResponse.errors.hasOwnProperty(fieldName)) {
                                    var fieldErrors = errorResponse.errors[fieldName];
                                    fieldErrors.forEach(function(errorMessage) {
                                        errorHtml +=
                                            '<div class="alert alert-warning">' +
                                            errorMessage + '</div>';
                                    });
                                }
                            }

                            $('#responseMessage').html(errorHtml);
                        }
                    },
                    complete: function() {
                        // Enable the submit button and restore its original text
                        $('.submitButton_US').prop('disabled', false).html('Submit');

                        // close this modal
                        $('.update-modal').modal('hide');

                        // Open the modal
                        $('#SectionAlert').modal('show');
                    },
                });
            });
        });
    </script>
@endpush
