 <!-- add appointment Modal -->
 <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel2">Make Appointment Progress Form</h5>
                 <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body p-4">
                 <!-- Carousel wrapper -->
                 <form id="AddAppointmentForm">
                     @csrf
                     <div id="carouselBasicExample" class="carousel slide carousel-toggel" data-mdb-ride="carousel">
                         <!-- Inner -->

                         <div class="carousel-inner">
                             <div class="hidden" hidden>
                                 <input value="{{ auth('web')->user()->id }}" type="hidden" name="patient_id" />
                                 <input value="{{ auth('web')->user()->email }}" type="hidden" name="email" />
                             </div>
                             <!-- Single item -->
                             <div class="carousel-item active" style="height: 200px">
                                 <label class="form-label" for="appointment_date">Appointment Date</label>
                                 <div class="form-outline mb-4">
                                     <input name="appointment_date" type="date" id="appointment_date"
                                         class="form-control" require style="border: 1px solid #5c5a5a" />
                                 </div>
                                 <label class="form-label" for="appointment_time">Appointment Time</label>
                                 <div class="form-outline mb-4">
                                     <input name="appointment_time" type="time" id="appointment_time"
                                         class="form-control" require style="border: 1px solid #5c5a5a" />
                                 </div>
                             </div>

                             <!-- Single item -->
                             <div class="carousel-item" style="height: 200px">
                                 <div class="form-outline mb-4">
                                     <label class="form-label" for="department">Department</label>
                                     <select class="form-select wide departments_select" id="" class="my-5"
                                         name="section_id"require>
                                         <option data-display="Select Department">Department</option>
                                         @foreach ($departments as $department)
                                             <option value="{{ $department->id }}">{{ $department->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-outline mb-4">
                                     <label class="form-label" for="doctor">Doctor</label>
                                     <select class="form-select wide doctors_select" id="" name="doctor_id"
                                         class="my-5"require>

                                     </select>
                                 </div>
                             </div>

                             <!-- Single item -->
                             <div class="carousel-item" style="height: 200px">
                                 <label class="form-label" for="name">Name</label>
                                 <div class="form-outline mb-4">
                                     <input type="text" id="name" class="form-control"
                                         style="border: 1px solid #6e6969" name="name" require />
                                 </div>

                                 <label class="form-label" for="phone">Phone</label>
                                 <div class="form-outline mb-4">
                                     <input name="phone" type="tel" id="phone" class="form-control phone"
                                         style="border: 1px solid #6e6969" require />
                                 </div>

                             </div>
                         </div>
                         <!-- Inner -->

                         <!-- Controls -->
                         <div class="d-flex justify-content-between">
                             <div class="right">
                                 <button class="btn btn-primary prev-btn" type="button"
                                     data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
                                     <span class="visually">Previous</span>
                                 </button>
                                 <button class="btn btn-primary next-btn" type="button"
                                     data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
                                     <span class="visually">Next</span>
                                 </button>

                             </div>
                             <style>
                                 .my-hidde {
                                     display: none;
                                 }
                             </style>
                             <div class="right">
                                 <button type="submit" class="btn btn-primary next-btn my-hidde"
                                     id="submitButton_A">Confirm</button>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal -->

 <!-- alert modal -->
 <div class="modal fade" id="AppointmentAlertAdd" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Doctor Feedback</h5>
                 <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body" id="responseMessageAdd">...</div>
             <div class="modal-footer">
                 {{-- <button type="button" class="btn btn-secondary" data-mdb-ripple-init
              data-mdb-dismiss="modal">Close</button> --}}
                 <button type="button" class="btn btn-primary" data-mdb-ripple-init id="refresh">Save
                     changes</button>
             </div>
         </div>
     </div>
 </div>
 
 <script>
     $(document).ready(function() {
         $('.phone').on('input', function() {
             if ($(this).val().trim() !== '') {
                 $('.my-hidde').show();
             }
         });
     });
 </script>
