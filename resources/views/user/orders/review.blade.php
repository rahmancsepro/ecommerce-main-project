@extends('layouts.fontend-master')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>My Review</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
    <div class="sign-in-page">
        <div class="row">
            <div class="col-md-4 ">
                @include('user.inc.sidebar')
            </div>
            <div class="col-md-8 mt-1">
                <div class="product-add-review">
                    <h4 class="title">Write your own review</h4>
                    <form action="{{route('user.review.store')}}" method="POST" role="form" class="cnt-form">
                        @csrf
                        <input type="hidden" name="prouct_id" value="{{$prouct_id}}">
                    <div class="review-table">
                        <div class="table-responsive">
                            <table class="table">   
                                <thead>
                                    <tr>
                                        <th class="cell-label">&nbsp;</th>
                                        <th>1 star</th>
                                        <th>2 stars</th>
                                        <th>3 stars</th>
                                        <th>4 stars</th>
                                        <th>5 stars</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                    <tr>
                                        <td class="cell-label">Rating</td>
                                        <td>
                                            <input type="radio" name="rating" class="radio" value="1"></td>
                                        <td><input type="radio" name="rating" class="radio" value="2"></td>
                                        <td><input type="radio" name="rating" class="radio" value="3"></td>
                                        <td><input type="radio" name="rating" class="radio" value="4"></td>
                                        <td><input type="radio" name="rating" class="radio" value="5"></td>
                                    </tr>
                                </tbody>
                            </table><!-- /.table .table-bordered -->
                        </div><!-- /.table-responsive -->
                    </div><!-- /.review-table -->
                    
                    <div class="review-form">
                        <div class="form-container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="comment">Review <span class="astk">*</span></label>
                                            <textarea class="form-control txt txt-review" name="comment" id="comment" rows="4" placeholder=""></textarea>
                                        @error('comment')
                                          <span class="tx-danger">{{$message}}</span>
                                          <br>
                                        @enderror
                                        @error('rating')
                                          <span class="tx-danger">{{$message}}</span>
                                        @enderror
                                        </div><!-- /.form-group -->
                                    </div>
                                </div><!-- /.row -->
                                
                                <div class="action text-right">
                                    <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                </div><!-- /.action -->

                        </div><!-- /.form-container -->
                    </div><!-- /.review-form -->
                    </form><!-- /.cnt-form -->
                </div><!-- /.product-add-review --> 
            </div>
          </div>
    </div>
</div>
</div>
@endsection