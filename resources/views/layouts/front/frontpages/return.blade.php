@extends('layouts.front.frontpages.inc.link')

@section('content')

<!-- start main content -->
<main class="container">

    <section>

        <div class="signuppanel">

            <div class="row page-title">

                

                <div class="col-md-10">

                    <form method="post" action="{{ url('insert-return') }}">
                        @csrf
                        <h3 class="nomargin">Return Product</h3>
                         @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                        
                        <div class="row mb10">
                            <label class="control-label">Product Serial</label>
                                <input type="number" class="form-control" placeholder="Product Serial no" name="prod_serial" />
                           

                        </div>
                       
                        <div class="mb10">
                            <label class="control-label">Product Name</label>
                            <input type="text" class="form-control" name="prod_name" placeholder="Product Name" />
                        </div>

                        <div class="mb10">
                            <label class="control-label">Net Weight</label>
                            <input type="text" class="form-control" name="netwight" placeholder="Net Weight" />
                        </div>
                        <div class="mb10">
                            <label class="control-label">Unit Price</label>
                            <input type="text" class="form-control" name="unitprice" placeholder="Unit Price" />
                        </div>

                        <div class="mb10">
                            <label class="control-label">Purchage Quantity</label>
                            <input type="text" class="form-control" name="purchagequantity" placeholder="Purchage Quantity" />
                        </div>
                        <div class="mb10">
                            <label class="control-label">Return Quantity</label>
                            <input type="text" class="form-control" name="returnquantity" placeholder="Return Quantity" />
                        </div>

                        
                        <div class="mb10">
                            <label class="control-label">Category</label>
                            <select class="form-control" name="catid" >
                                <option value="sp">Sp </option>
                                <option value="hp">Hp</option>
                                <option value="gp">GP</option>
 
                            </select>
                        </div>

                        
                        <br />
                        <?php  
                            $customer_id = Session::get('id');
                        ?>

                        @if($customer_id != NULL)
                        <button type="submit" class="btn btn-success btn-block">Save Return</button>

                        @else
                            <button class="btn btn-success btn-block"><a href="{{ URL::to('/return-login') }}">Save Return</a></button>
                        @endif
                    </form>
                </div><!-- col-sm-6 -->

            </div><!-- row -->



        </div><!-- signuppanel -->

    </section>
</main>
<!-- end  main content -->








@endsection