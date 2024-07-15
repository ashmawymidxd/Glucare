<!-- Modal -->
<div class="modal fade update-appoint-status-modal" id="update_status{{ $appointment->id }}" tabindex="-1" role="dialog"
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
            <form action="{{ route('appointment.update', 'test') }}" method="post" autocomplete="off"
                class="updateStatusForm">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div>
                    <div class="hidden" hidden>
                        <input value="{{ $appointment->id }}" type="hidden" name="id" />
                        <input value="{{ auth('web')->user()->id }}" type="hidden" name="patient_id" />
                        <input value="{{ auth('web')->user()->email }}" type="hidden" name="email" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="appointment_date">Appointment Date</label>
                            <div class="form-outline mb-4" value="{{ $appointment->appointment_date }}">
                                <input name="appointment_date" type="date" id="appointment_date" class="form-control"
                                    require />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="appointment_time">Appointment Time</label>
                            <div class="form-outline mb-4">
                                <input name="appointment_time" type="time" id="appointment_time" class="form-control"
                                    require value="{{ $appointment->appointment_time }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="department">Department</label>
                                <select class="form-select wide departments_select" id="" class="my-5"
                                    name="section_id" value="{{ $appointment->section_id }}" require>
                                    <option data-display="Select Department">Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="doctor">Doctor</label>
                                <select class="form-select wide doctors_select" id="" name="doctor_id"
                                    class="my-5"require>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <div class="form-outline mb-4">
                                <input type="text" id="name" class="form-control"
                                    style="border: 1px solid #6e6969" name="name" require
                                    value="{{ $appointment->name }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="phone">Phone</label>
                            <div class="form-outline mb-4">
                                <input name="phone" type="tel" id="phone" class="form-control"
                                    style="border: 1px solid #6e6969" require value="{{ $appointment->phone }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Inner -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submitButton_USA">submit
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
                $('.submitButton_USA').prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                // Serialize form data
                var formData = $(this).serialize();

                // Send AJAX request
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'PUT',
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
                        $('.submitButton_USA').prop('disabled', false).html('Submit');

                        // close this modal
                        $('.update-appoint-status-modal').modal('hide');

                        // Open the modal
                        $('#appointmentAlert').modal('show');
                    },
                });
            });
        });
    </script>
@endpush
