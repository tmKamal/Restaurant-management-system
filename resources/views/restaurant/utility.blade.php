@extends('layouts.admin')
@section('content')

<!--Total expenses-->
@php($totalexpense=0)
@foreach($utilities as $exp)
    @php($totalexpense += $exp->amount)
@endforeach

<!--Total records-->
@php($totalrec=0)
@foreach($utilities as $exp)
    @php($totalrec=count($utilities))
@endforeach






<div class="page-content-body-wrapper">
                    <!--=======================================
                        Info Card Container
                    ==========================================-->
                    <div class="row info-cards-wrapper">
                        <!-- Info-Cards-Wrapper -->
                        <div class="col-xl-3 col-md-6  mb-2">
                            <!-- Info-Card-Start -->
                            <div class="info-card-container">
                                <div class=" info-card-header row">
                                    <div class="col-3 info-card-icon">
                                        <i class="material-icons info-card-icon-customized">money_off</i>
                                    </div>
                                    <div class="col-9 info-card-title">
                                        <h5>Total Expenses</h5>
                                        <h3>{{$totalexpense}}</h3>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- Info-card-End -->
                        <div class="col-xl-3 col-md-6  mb-2">
                            <!-- Info-Card-Start -->
                            <div class="info-card-container">
                                <div class=" info-card-header row">
                                    <div class="col-3 info-card-icon">
                                        <i class="material-icons info-card-icon-customized">list</i>
                                    </div>
                                    <div class="col-9 info-card-title">
                                        <h5>Total records</h5>
                                        <h3>{{$totalrec}}</h3>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- Info-card-End -->
                        
                    </div>



 
    <!--table start -->
    <div class="container">
  <div class="row">
    <div class="col-md-4">
        <legend>Utilities And Bills</legend>
    </div>
    <div class="col-md-4">
         
         <button type="submit" class="btn btn-outline-success"><a href="/createUtility">Add Record</a></button>
         
    </div>
    <div class="col-md-4">
         <!-- Search form -->
         <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search records"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
         
    </div>
    
    
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Date</th>
        <th scope="col">Expenses Name</th>
        <th scope="col">Payment type</th>
        <th scope="col">Total Due</th>
        <th scope="col">Status</th>
        <th scope="col">Notes</th>
        <th scope="col">Action</th>

      </tr>
    </thead>

    <tbody>

    
    <tr>
    @foreach($utilities as $y)
        <td>{{$y->date}}</td>
        <td>{{$y->expenseName}}</td>
        <td> {{$y->category}}</td>
        <td>{{$y->amount}}</td>
        <td><span class="badge badge-pill badge-success">Paid</span></td>
        <td>{{$y->note}}</td>
        <td>
            <div class="row">
                <div class="col-6">
                <button type="submit" class="btn btn-success"><a href="/utility/{{$y->id}}/edit">Update</a></button>
                </div>
                <div class="col-6">
                    <!-- <button type="button" class="btn btn-danger">Delete</button> -->
            {!! Form::open(['action' => ['UtilityController@destroy',$y->id],'method' => 'POST']) !!}
            {{Form::hidden('_method','DELETE')}}
            <!-- Delete button -->
             
            {{Form::submit('Delete',['class' => "btn btn-danger"])}}
             
            {!! Form::close() !!}
                </div>
            </div>
            
            
            
            
        
        </td>

    </tr>
    
    @endforeach 
    </table>
    

    </tbody>
  </div>

</div>




  <!--table end -->





@endsection
