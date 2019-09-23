@extends('layouts.admin')

<!-- Total Quantity -->
@section('content')
@php($totalqty=0)
@foreach($inventory as $item)
 @php($totalqty += $item->Quantity)
@endforeach

<!-- Total Products -->
@php($totalpro=0)
@foreach($inventory as $item)
 @php($totalpro = count($inventory))
@endforeach

<!-- Low Stock Count -->
@php($qty_val=0)
@foreach($inventory as $item)
  @if($item->Quantity < 10)
    @php($qty_val += 1)
  @endif
@endforeach

<!-- Expired Products Count -->
@php($date_count=0)
@foreach($inventory as $item)
  @if($item->Expire_Date < date("Y-m-d"))
    @php($date_count += 1)
  @endif
@endforeach

<h1>Inventory</h1>
<br>
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
                        <i class="material-icons info-card-icon-customized">assessment</i>
                    </div>
                    <div class="col-9 info-card-title">
                        <h5>Total Quantity</h5>
                        <h3>{{$totalqty}}</h3>
                    </div>
                </div>
            </div>
        </div><!-- Info-card-End -->
        <div class="col-xl-3 col-md-6  mb-2">
            <!-- Info-Card-Start -->
            <div class="info-card-container">
                <div class=" info-card-header row">
                    <div class="col-3 info-card-icon">
                        <i class="material-icons info-card-icon-customized">assessment</i>
                    </div>
                    <div class="col-9 info-card-title">
                        <h5>Total Products</h5>
                        <h3>{{$totalpro}}</h3>
                    </div>
                </div>
            </div>
        </div><!-- Info-card-End -->
        <div class="col-xl-3 col-md-6  mb-2">
            <!-- Info-Card-Start -->
            <div class="info-card-container">
                <div class=" info-card-header row">
                    <div class="col-3 info-card-icon">
                        <i class="material-icons info-card-icon-customized">assignment</i>
                    </div>
                    <div class="col-9 info-card-title">
                        <h5><a href="/lowstock">Low stock count</a></h5>
                        <h3><a href="/lowstock">{{$qty_val}}</a></h3>
                    </div>
                </div>
            </div>
        </div><!-- Info-card-End -->
        <div class="col-xl-3 col-md-6  mb-2">
            <!-- Info-Card-Start -->
            <div class="info-card-container">
                <div class=" info-card-header row">
                    <div class="col-3 info-card-icon">
                        <i class="material-icons info-card-icon-customized">assignment</i>
                    </div>
                    <div class="col-9 info-card-title">
                        <h5><a href="/expired">Expired products</a></h5>
                        <h3><a href="/expired">{{$date_count}}</a></h3>
                    </div>
                </div>
            </div>
        </div><!-- Info-card-End -->
    </div>
    <!--=====================
        Content
    =========================== -->
<!--form-->

  <!-- Search button -->
  <form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="col-xs-11">
      <div class="input-group">
        <input type="text" class="form-control" name="q" placeholder="Search Products">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
      </div>
    </div>
  </form>
<br>
  <!-- Add Item Button -->
  <div align="right">
    <br>
    <a href="/addItem"><button class="button button1" type="button" name="Add_Product" >+Add Product</button></a>
  </div><br>
  <!-- Inventory table -->
  @if(count($inventory) > 0)
      <div class="well">
        <table class="zui-table" style="width:100%" >
          <thead>
          <tr>
            <th><h5>ID</h5></th>
            <th><h5>Product Name</h5></th>
            <th><h5>Brand Name</h5></th>
            <th><h5>Quantity</h5></th>
            <th><h5>Category</h5></th>
            <th><h5>Ordered Date</h5></th>
            <th><h5>Arrived Date</h5></th>
            <th><h5>Manufactured Date</h5></th>
            <th><h5>Expire Date</h5></th>
          </tr>
        </thead>
        @foreach($inventory as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td><a href="inventory/{{$item->id}}">{{$item->Product_Name}}</a></td>
            <td>{{$item->Brand_Name}}</td>
            <td>{{$item->Quantity}}</td>
            <td>{{$item->Category}}</td>
            <td>{{$item->Ordered_Date}}</td>
            <td>{{$item->Arrived_Date}}</td>
            <td>{{$item->Manufactured_Date}}</td>
            <td>{{$item->Expire_Date}}</td>
          </tr>
        @endforeach
        </table>
      </div>
  @endif
@endsection
