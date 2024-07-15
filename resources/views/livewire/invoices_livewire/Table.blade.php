<button class="btn btn-primary pull-right" wire:click="show_form_add" type="button"> add new invoices </button><br><br>
<div class="table overflow-x-scroll" id="DataTableDiv">
    <table id="DataTable" class="table table-striped rounded-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Invoices Date</th>
                <th>Doctor Name</th>
                <th>Section</th>
                <th>Service Name</th>
                <th>Discount value</th>
                <th>val added tax</th>
                <th>tax</th>
                <th>total with tax</th>
                <th>options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $invoice->Patient->name }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>{{ $invoice->Doctor->name }}</td>
                    <td>{{ $invoice->Section->name }}</td>
                    <td>{{ number_format($invoice->price, 2) }}</td>
                    <td>{{ number_format($invoice->discount_value, 2) }}</td>
                    <td>{{ $invoice->tax_rate }}%</td>
                    <td>{{ number_format($invoice->tax_value, 2) }}</td>
                    <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                    <td>
                        <div class="btn-group">
                            <button wire:click="edit({{ $invoice->id }})" class="btn btn-primary btn-sm"><i
                                    class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-mdb-toggle="modal"
                                data-mdb-target="#delete_invoice" wire:click="delete({{ $invoice->id }})"><i
                                    class="fa fa-trash"></i></button>
                            <button wire:click="print({{ $invoice->id }})" class="btn btn-primary btn-sm"><i
                                    class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>اسم المريض</th>
                <th>تاريخ الفاتورة</th>
                <th>اسم الدكتور</th>
                <th>القسم</th>
                <th>سعر الخدمة</th>
                <th>قيمة الخصم</th>
                <th>نسبة الضريبة</th>
                <th>قيمة الضريبة</th>
                <th>الاجمالي مع الضريبة</th>
                <th>العمليات</th>
            </tr>
        </tfoot>
    </table>

    @include('livewire.invoices_livewire.delete')

</div>
<!-- data table -->
<script>
    new DataTable('#DataTable');
</script>
