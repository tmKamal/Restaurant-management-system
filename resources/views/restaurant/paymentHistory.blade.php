@extends('layouts.admin')
@section('content')
    <!--form-->
    <h1>Payment History</h1>
    <br>
    <!-- Search button -->

    @php($total=0)
    @php($count=0)
    @php($ims=0)
    @php($pays=0)
    @foreach($orders as $order)
        @php($total+=$order->price*$order->qty)
        @php($count+=1)
        @php($ims+=$order->qty)
    @endforeach
    @foreach($payments as $item)
        @php($pays+=1)
    @endforeach
        <div class="page-content-body-wrapper">
        <!--=======================================
            Info Card Container(4 cards included)
        ==========================================-->
        <div class="row info-cards-wrapper">
            <!-- Info-Cards-Wrapper -->
            <div class="col-xl-3 col-md-6  mb-2">
                <!-- Info-Card-Start -->
                <div class="info-card-container">
                    <div class=" info-card-header row">
                        <div class="col-3 info-card-icon">
                            <i class="material-icons info-card-icon-customized">attach_money</i>
                        </div>
                        <div class="col-9 info-card-title">
                            <h5>Income</h5>
                            <h3>LKR {{$total}}</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10 info-card-footer">
                            <i class="material-icons info-card-footer-icon">calendar_today</i>
                            <span>This Month</span>
                        </div>
                    </div>
                </div>
            </div><!-- Info-card-End -->
            <div class="col-xl-3 col-md-6  mb-2">
                <!-- Info-Card-Start -->
                <div class="info-card-container">
                    <div class=" info-card-header row">
                        <div class="col-3 info-card-icon">
                            <i class="material-icons info-card-icon-customized">attach_money</i>
                        </div>
                        <div class="col-9 info-card-title">
                            <h5>Orders so far</h5>
                            <h3>{{$count}}</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10 info-card-footer">
                            <i class="material-icons info-card-footer-icon">calendar_today</i>
                            <span>This Month</span>
                        </div>
                    </div>
                </div>
            </div><!-- Info-card-End -->
            <div class="col-xl-3 col-md-6  mb-2">
                <!-- Info-Card-Start -->
                <div class="info-card-container">
                    <div class=" info-card-header row">
                        <div class="col-3 info-card-icon">
                            <i class="material-icons info-card-icon-customized">attach_money</i>
                        </div>
                        <div class="col-9 info-card-title">
                            <h5>Items sold</h5>
                            <h3>{{$ims}}</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10 info-card-footer">
                            <i class="material-icons info-card-footer-icon">calendar_today</i>
                            <span>This Month</span>
                        </div>
                    </div>
                </div>
            </div><!-- Info-card-End -->
            <div class="col-xl-3 col-md-6  mb-2">
                <!-- Info-Card-Start -->
                <div class="info-card-container">
                    <div class=" info-card-header row">
                        <div class="col-3 info-card-icon">
                            <i class="material-icons info-card-icon-customized">attach_money</i>
                        </div>
                        <div class="col-9 info-card-title">
                            <h5>Payments</h5>
                            <h3>{{$pays}}</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10 info-card-footer">
                            <i class="material-icons info-card-footer-icon">calendar_today</i>
                            <span>This Month</span>
                        </div>
                    </div>
                </div>
            </div><!-- Info-card-End -->
        </div>
    <br>
    <!-- Add Item Button -->
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success p-3" href="/paymentexport" style="width:100%;">Download Payment reports </a>

        </div>
    </div>
    <!-- Inventory table -->
    @if(count($payments) > 0)
        <div class="well">
            <table class="zui-table" style="width:100%" >
                <thead>
                <tr>
                    <th><h5>ID</h5></th>
                    <th><h5>Payment ID</h5></th>
                    <th><h5>Amount</h5></th>
                    <th><h5>Paid Date</h5></th>
                    <th><h5>Details</h5></th>

                </tr>
                </thead>
                @php($i=1)
                @foreach($payments as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->paymentId}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->paiddate}}</td>
                        <td><a href="payhistoryby/{{$item->paymentId}}" class="btn btn-success">View Details</a></td>
                        @php($i+=1)
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
@endsection
