@extends('layouts.app')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Add new invoice
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">

            <form class="card card-md" action="{{ route('invoices.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label class="required" for="customer_id">Select customer</label>
                            <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <span class="text-danger">{{ $errors->first('customer') }}</span>
                            @endif

                        </div>
                        <div class="mb-3 col-4">
                            <label class="form-label">Due Date</label>
                            <input type="datetime-local" class="form-control" name="due_date" value="{{ old('due_date') }}">
                        </div>
                        <div class="mb-3 col-4">
                            <label class="form-label">Invoice Number</label>
                            <input type="text" class="form-control" name="invoice_number" value="{{ old('invoice_number') }}">
                        </div>
                    </div>

                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                        <tr>
                            <th class="text-center"> #</th>
                            <th class="text-center"> Product</th>
                            <th class="text-center"> Qty</th>
                            <th class="text-center"> Price</th>
                            <th class="text-center"> Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr id='addr0'>
                                <td>1</td>
                                <td>
                                    <select name="product_id" class="form-control">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name='quantity' placeholder='Enter Qty'
                                           class="form-control qty" step="0" min="0"/></td>
                                <td><input type="number" name='price' placeholder='Enter Unit Price'
                                           class="form-control price" step="0.00" min="0"/></td>
                                <td><input type="number" name='total' placeholder='0.00'
                                           class="form-control total" readonly/></td>
                            </tr>


                        <tr id='addr1'></tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" id="add_row" class="btn btn-indigo float-start">Add Row</a>
                            <a href="#" id='delete_row' class="float-end btn btn-danger">Delete Row</a>
                        </div>

                    </div>
                    <div class="row py-2">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <table class="table table-bordered table-hover" id="tab_logic_total">
                                <tbody>
                                <tr>
                                    <th class="text-center">Sub Total</th>
                                    <td class="text-center"><input type="number" name='subtotal'
                                                                   placeholder='0.00' class="form-control"
                                                                   id="sub_total" readonly/></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Tax</th>
                                    <td class="text-center">
                                        <div class="input-group mb-2 mb-sm-0">
                                            <input type="number" class="form-control" id="tax" placeholder="0">
                                            <div class="input-group-addon">%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">Tax Amount</th>
                                    <td class="text-center"><input type="number" name='tax'
                                                                   id="tax_amount" placeholder='0.00'
                                                                   class="form-control" readonly/></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Grand Total</th>
                                    <td class="text-center"><input type="number" name='total'
                                                                   id="total_amount" placeholder='0.00'
                                                                   class="form-control" readonly/></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">
                            Notes
                        </label>
                        <textarea name="notes" class="form-control" rows="3" >{{ old('notes') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save invoice</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var i = 1;
            $("#add_row").click(function () {
                b = i - 1;
                $('#addr' + i).html($('#addr' + b).html()).find('td:first-child').html(i + 1);
                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
            $("#delete_row").click(function () {
                if (i > 1) {
                    $("#addr" + (i - 1)).html('');
                    i--;
                }
                calc();
            });

            $('#tab_logic tbody').on('keyup change', function () {
                calc();
            });
            $('#tax').on('keyup change', function () {
                calc_total();
            });


        });

        function calc() {
            $('#tab_logic tbody tr').each(function (i, element) {
                var html = $(this).html();
                if (html != '') {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    $(this).find('.total').val(qty * price);

                    calc_total();
                }
            });
        }

        function calc_total() {
            total = 0;
            $('.total').each(function () {
                total += parseInt($(this).val());
            });
            $('#sub_total').val(total.toFixed(2));
            tax_sum = total / 100 * $('#tax').val();
            $('#tax_amount').val(tax_sum.toFixed(2));
            $('#total_amount').val((tax_sum + total).toFixed(2));
        }
    </script>
@stop
