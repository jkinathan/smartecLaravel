

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
                        </td>
                        @endcan
                    </tr>
                    @endforeach
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
