<div>

    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif

    @if ($InvoiceSaved)
        <div class="alert alert-info">data saved successfully.</div>
    @endif

    @if ($InvoiceUpdated)
        <div class="alert alert-info">data updated successfully.</div>
    @endif

    @if ($show_table)
        @include('livewire.invoices_livewire.Table')
    @else
        <div class="row" id="row">
            <div class="col-md-9">
                <form wire:submit.prevent="store" autocomplete="off">
                    @csrf
                    <div class="row" id="row">
                        <div class="col">
                            <label>Patient name</label>
                            <select wire:model="patient_id" class="form-control" required>
                                <option value="">-- select from list --</option>
                                @foreach ($Patients as $Patient)
                                    <option value="{{ $Patient->id }}">{{ $Patient->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col">
                            <label>Doctor name</label>
                            <select wire:model="doctor_id" wire:change="get_section" class="form-control"
                                id="exampleFormControlSelect1" required>
                                <option value="">-- select form list --</option>
                                @foreach ($Doctors as $Doctor)
                                    <option value="{{ $Doctor->id }}">{{ $Doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col">
                            <label>section</label>
                            <input wire:model="section_name" type="text" class="form-control" readonly>
                        </div>
                    </div><br>

                    <div class="table-responsive rounded-1">
                        <table class="table table-striped mg-b-0 text-md-nowrap" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>service price</th>
                                    <th>discount value</th>
                                    <th>value tax</th>
                                    <th>value added tax</th>
                                    <th>total with tax</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><input wire:model="price" type="text" class="form-control" readonly>
                                    </td>
                                    <td><input wire:model="discount_value" type="text" class="form-control">
                                    </td>
                                    <th><input wire:model="tax_rate" type="text" class="form-control"></th>
                                    <td><input type="text" class="form-control" value="{{ $tax_value }}" readonly>
                                    </td>
                                    <td><input type="text" class="form-control" readonly
                                            value="{{ $subtotal + $tax_value }}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">saved data</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3 border-left p-3">
                <h6>Ended Appointment</h6>
                <div class="overflow-y-scroll " style="height: 200px">
                    @foreach ($UserAppointment as $Appointment)
                        <div class="bg-light p-3 rounded my-3">
                            <h5>Dr: {{ $Appointment->doctor->name }}</h5>
                            <p>Mr: {{ $Appointment->patient->name }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    @endif

</div>
