<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/section.add_section_modal') }}</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form autocomplete="off" id="AddSectionForm">
                @csrf
                <div class="modal-body">
                    {{-- <label for="exampleInputPassword1"></label> --}}
                    <input type="text" name="name" class="main-input" placeholder="Sections Name">
                </div>
                <div class="modal-body">
                    {{-- <label for="exampleInputPassword2"></label> --}}
                    <textarea type="text" name="description" class="main-textarea p-2">Sections Description </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-mdb-dismiss="modal">{{ trans('Dashboard/common.close') }}</button>
                    <button type="submit" class="btn btn-primary"
                        id="submitButton_AS">{{ trans('Dashboard/common.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ajax code to send request -->
@push('js')
    <script>
        $(document).ready(function() {
            $('#AddSectionForm').submit(function(event) {
                event.preventDefault();

                // Disable the submit button and show loading text or spinner
                $('#submitButton_AS').prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('section.store') }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseMessage').html('<div class="alert alert-success">' +
                            response.message + '</div>');
                    },
                    error: function(error) {
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
                        $('#submitButton_AS').prop('disabled', false).html('Submit');

                        // close this modal
                        $('#add').modal('hide');

                        // Open the modal
                        $('#SectionAlert').modal('show');
                    },

                });

            });
        });
    </script>
@endpush
