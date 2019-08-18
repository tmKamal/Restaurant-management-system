@extends('layouts.admin')
@section('content')
    <!--form-->
    <form action="addproduct.php" class="form-horizontal" method="post" enctype="multipart/form-data">

                                <fieldset>

                                    <!-- Form Name -->
                                    <div class="content-title">
                                        <h2>ADD PRODUCT</h2>
                                    </div>

                                    <!-- Input Product Name-->
                                    <div class="form-group row">
                                        <label for="prodName" class="col-lg-2 col-form-label-sm">Product Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control form-control-sm" id="prodName" name="prodName" placeholder="Product Name">
                                        </div>
                                    </div>

                                    <!--Image uploader-->
                                    <!-- <div class="form-group row">
                                        <label for="prodImg22" class="col-lg-2 col-form-label-sm">Images</label>
                                        <input type="file" name="file[]" id="file" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                                        <label for="file"><span></span> <strong> Choose a file&hellip;</strong></label>
                                    </div> -->

                                    <!-- Input Product Price-->
                                    <div class="form-group row">
                                        <label for="prodPrice" class="col-lg-2 col-form-label-sm">Price</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control form-control-sm" id="prodPrice" name="prodPrice" placeholder="2500">
                                        </div>
                                    </div>

                                    <!-- DropDown Product Category-->
                                    <div class="form-group row">
                                        <label for="prodCategory" class="col-lg-2 col-form-label-sm">Category</label>
                                        <div class="col-lg-10">
                                            <select class="form-control form-control-sm" id="prodCategory" name="prodCategory">
                                                <option value="1">Phone</option>
                                                <option value="2">Back covers</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- TextArea Product description-->
                                    <div class="form-group row">
                                        <label for="prodDescription" class="col-lg-2 col-form-label-sm">Description</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control form-control-sm" id="prodDescription" name="prodDescription" placeholder="Details about your Product. (300 words or less..)"></textarea>
                                        </div>
                                    </div>

                                    <button name="btnSubmit" type="submit" class="btn btn-outline-success btn-sm">Submit</button>

                                </fieldset>
                            </form>

                        
