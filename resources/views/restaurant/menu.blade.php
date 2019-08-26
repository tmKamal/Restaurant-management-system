@extends('layouts.admin')
@section('content')
<!--form-->
<form action="/menuSubmit" class="form-horizontal" method="POST" >

    <fieldset>

        <!-- Form Name -->
        <div class="content-title">
            <h2>ADD Menu</h2>
        </div>
        @csrf
        <!-- DropDown Category-->
        <div class="form-group row">
            <label for="prodCategory" class="col-lg-2 col-form-label-sm">Category</label>
            <div class="col-lg-10">
                <select class="form-control form-control-sm" id="prodCategory" name="prodCategory">
                    <option value="bakery_item">Bakery Item</option>
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                </select>
            </div>
        </div>

        <!-- Input Name-->
        <div class="form-group row">
            <label for="name" class="col-lg-2 col-form-label-sm">Name</label>
            <div class="col-lg-10">
                <input type="text" class="form-control form-control-sm" id="name" name="name"
                    placeholder="Name">
            </div>
        </div>
        <!-- Input Price-->
        <div class="form-group row">
            <label for="price" class="col-lg-2 col-form-label-sm">Price</label>
            <div class="col-lg-10">
                <input type="text" class="form-control form-control-sm" id="price" name="price"
                    placeholder="price">
            </div>
        </div>

        <!--Image uploader-->
        <!-- <div class="form-group row">
                                        <label for="prodImg22" class="col-lg-2 col-form-label-sm">Images</label>
                                        <input type="file" name="file[]" id="file" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                                        <label for="file"><span></span> <strong> Choose a file&hellip;</strong></label>
                                    </div> -->

        <!-- Input Product Price-->
        


        <button name="btnSubmit" type="submit" class="btn btn-outline-success btn-sm">Submit</button>

    </fieldset>
</form>
@endsection