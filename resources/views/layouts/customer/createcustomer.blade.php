@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
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
            
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                       Add Customer Information
                                    </div>
                                    <div class="panel-body">
                        <form action="/customer/create" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
            
                              <div class="form-group">
                                  <label>Customer Name</label>
                                  <input name="cname" type="text" class="form-control">
            
                               </div>
                               <div class="form-group">
                                  <label>Customer Number</label>
                                  <input name="cnumber" type="text" class="form-control" required>
            
                                </div>
                                <div class="form-group">
                                                           <label>Product</label>
                                                           <input name="product" type="text" class="form-control" required>
            
                                              </div>
                                               <div class="form-group">
                                                           <label>Model_number</label>
                                                           <input name="mnumber" type="text" class="form-control" required>
            
                                              </div>
                                               <div class="form-group">
                                                           <label>Serial_number</label>
                                                           <input name="snumber" type="text" class="form-control" required>
            
                                              </div>
                                               <div class="form-group">
                                                           <label>Warranty</label>
                                                           <input name="warranty" type="text" class="form-control" required>
            
                                              </div>
                                              <div class="form-group">
                                                    <label>Warranty Card Number</label>
                                                    <input name="warrantycard" type="text" class="form-control" required>
    
                                              </div>
                                               <div class="form-group">
                                                           <label>Receipt_number</label>
                                                           <input name="rnumber" type="text" class="form-control" required>
            
                                              </div>
                                              <div class="form-group">
                                                    <label>Place_of_Purchase</label>
                                                    <input name="placeofpurchase" type="text" class="form-control" required>
     
                                       </div>

                                              <div class="form-group">
                                                          <label>Date_of_purchase</label>
                                                          <input name="datep" type ="date"  required class="form-control">
            
                                             </div>
                               <input type="submit" name="insert" class="btn btn-primary">
                               
                               </form>
                             </div>
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
    </div>

@endsection
