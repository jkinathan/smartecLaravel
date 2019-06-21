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
            
                            <div class="col-md-12 col-md-12">
                                
                                <img src="{{ asset('images/smartecb.jpg') }}" width="1010"/>
                                
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
