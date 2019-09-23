
<style>
    .color{
        color: blue;
    }
   
</style>

@extends('layouts.master')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div id="page-wrapper" >
                            <div id="page-inner">
                             
                            <div class="row">
                
                                <div class="col-md-12 col-sm-11">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                           Customers Information
                                        </div></div>

             <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Number</th>
                        <th>Product</th>
                        <th>Serial Number</th>
                        <th>Model Number</th>
                        <th>Warranty</th>
                        <th>Warranty Card Number</th>
                        <th>Receipt Number</th>
                        <th>Place of Purchase</th>
                        <th>Date of Purchase</th>
                        @if(Auth::user()->email == 'Admin@admin.com')
                        
                        <th>Action <br></th>
                        
                        @endif
                    </tr>
                </thead>

                
                <tbody>
                        @foreach ($customer as $customers )
                    <tr>
                          
                        <td>{{ $customers->customername }}</td>
                        <td>{{ $customers->customernumber }}</td>
                        <td>{{ $customers->product }}</td>
                        <td>{{ $customers->serialnumber }}</td>
                        <td>{{ $customers->modelnumber }}</td>
                        <td>{{ $customers->warranty }}</td>
                        <td>{{ $customers->warrantycard }}</td>
                        <td>{{ $customers->receiptnumber }}</td>
                        <td>{{ $customers->placeofpurchase}}</td>
                        <td>
                                <?php
                                $date = $customers->date;
                                $date2 = date('Y-M-d', strtotime($date. ' + 0 days'));
                            ?>
                            {{$date2}}
                        </td>
                        @can('Edit Customer')
                            
                        <td><button onclick="window.location='{{ route('customer.edit', $customers->id) }}'" class="btn btn-xs btn-primary" type="button">Edit</button>
                          @endcan
                            @can('Delete Customer') 
                            <form action="{{ route('customer.destroy', ['id' => $customers->id]) }}" method="post">
                                <input class="btn btn-xs btn-danger" type="submit" value="Delete" />
                                <input type="hidden" name="_method" value="delete" />
                                {!! csrf_field() !!}
                            </form>
                            {{-- <button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-default">
                                Detail View
                            </button>  --}}
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                    {{-- <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Default Modal</h4>
                            </div>
                            <div class="modal-body">
                                    
                              <p>
                                  Customer Name <button type="button" class="btn btn-success btn-sm">{{ $customers->customername }}</button></p>
                                <p>Customer Number <button type="button" class="btn btn-success btn-sm" width="12">{{ $customers->customernumber }}</button>
                                </p>
                              
                                <p>Product <button type="button" class="btn btn-success btn-sm" width="12">{{ $customers->product }}</button></p>
                                <p>Serial Number <button type="button" class="btn btn-success btn-sm" width="12"> {{ $customers->serialnumber }}</button></p>
                                <p>Model Number <button type="button" class="btn btn-success btn-sm" width="12">{{ $customers->modelnumber }}</button></p>
                                <p>Warranty <button type="button" class="btn btn-success btn-sm" width="12"> {{ $customers->warranty }}</button></p>
                                <p>Warranty Card Number <button type="button" class="btn btn-success btn-sm" width="12"> {{ $customers->warrantycard }}</button></p>
                                <p>Receipt Number <button type="button" class="btn btn-success btn-sm" width="12"> {{ $customers->receiptnumber }}</button></p>
                                <p>Place of Purchase <button type="button" class="btn btn-success btn-sm" width="12">{{ $customers->placeofpurchase}}</button></p>
                                <p>Date of Purchase <button type="button" class="btn btn-success btn-sm" width="12"> {{$date2}}</button></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal --> --}}
                </tbody>
                
                <tfoot>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Number</th>
                        <th>Product</th>
                        <th>Serial Number</th>
                        <th>Model Number</th>
                        <th>Warranty</th>
                        <th>Warranty Card Number</th>
                        <th>Receipt Number</th>
                        <th>Place of Purchase</th>
                        <th>Date of Purchase</th>
                        @if(Auth::user()->email == 'Admin@admin.com')
                        
                        <th>Action</th>
                        
                        @endif
                    </tr>
                </tfoot>
            </table>
               <br>
        </div>
    </div>


        </div>



 </div>
<!-- /. PAGE INNER  -->
    </div>
 <!-- /. PAGE WRAPPER  -->
</div>

</div>
</div>
</div>
                            <!-- /. PAGE INNER  -->
                            

@endsection
