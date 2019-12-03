@extends('layouts.app')
@section('content')
<section id="editors" class="container mt-5">
    <div class="header text-center">
        <h2>Welcome to our store</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis mollitia cum tempore sequi, vel</p>
    </div>
    <section class="trendng">
        <div class="container">
            <div >
                    @if ($errors->any())
                    <div class="alert alert-danger">
                            <ul>
                                    @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                    @endforeach
                            </ul>
                    </div><br />
                    @endif
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif
            </div>
            <div class="books-card mt-5">
                <div class="row mt-5 m-auto mb-5">
                    <div class=" col-md-3 col-lg-2">
                        <form class="form">
                            <div class="form-group mb-4 mr-sm-2">
                                <select id="inputState" class="form-style" name="cat_id">
                                    <option selected >Sort by Category</option>
                                    @if ($cat->count() > 0)
                                        @foreach ($cat as $item)
                                            <option> <a href ="/publish/">{{$item->name}}</a></option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </form>
                        <div class="sidebar-box">
                            <h4 class="heading-sidebar">Category</h4>
                            @if ($cat->count() > 0)
                               
                                    @foreach ($cat  as $item)
                                        <ul class="categories">
                                            <li>
                                                
                                                    <a href ="/publish/">{{$item->name}}</a>
                                                
                                            </li>
                                            <hr>
                                            
                                            
                                        </ul>
                                        @if($item->count() > 6) 
                                           @break
                                        @endif    
                                    @endforeach
                            @endif
                        
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h4>Most Popular</h4>
                        <div class="row">

                           
                            @if($book->count() > 0)

                                @foreach ($book as $item)
                                    <div class="col-md-3 col-lg-3">
                                        <div class="card-container manual-flip">
                                            <div class="card">
                                                <div class="front mb-5">
                                                    <div class="product">
                                                    <img class="img-circle" src="/storage/cover_page/{{$item->cover_page}}" />
                                                    </div>
                                                    <div class="content text-center">
                                                    <h6 class="f-w-600 m-b-10">{{$item->title}}</h6>
                                                    <hr>
                                                    @if($item->available == 1)
                                                        <p class="f-w-600 m-b-10">only Soft copy</p>
                                                        @elseif($item->available == 2)
                                                            <p class="f-w-600 m-b-10">only Hard copy</p> 
                                                    @elseif($item->available == 3)
                                                        <p class="f-w-600 m-b-10">available both Hard and soft copy</p> 
                                                    @endif 
                                                    <p class="price"> {{date('d/M/Y ',strtotime($item->year_pub))}}</p>
                                                    @if($item->status === 1 && $item->available == 1)
                                                        <p class="price">₦{{$item->price / 100}}</p>
                                                        
                                                        <button type="button" class=" buy btn btn-default" data-toggle="modal" data-target="#exampleModalCenter">
                                                                Buy <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        @elseif($item->status === 1 && $item->available == 2)
                                                            <p class="price">₦{{$item->price / 100}}</p>

                                                            <form action="{{route('addToCart')}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <label>Quantity <label>
                                                                <input type="number" name="qty"  min="1" class="form-control" required>
                                                        
                                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                                <button type="submit" class="text-white buy btn btn-danger">
                                                                    Add to Cart <i class=" text-white fa fa-shopping-cart"></i>
                                                                </button>
                                                            
                                                            </form>
                                                            
                                                        @elseif($item->status === 0 && $item->available == 2)
                                                            <p class="price">Free</p>
                                                            <form action="{{route('addToCart')}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <label>Quantity <label>
                                                                <input type="number"  name="qty" class="form-control" required>
                                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                                <button type="submit" class="text-white buy btn btn-danger" >
                                                                    Add to Chart <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                            
                                                            </form>
                                                        
                                                        @elseif($item->status === 0 && $item->available == 1)
                                                        <p class="price">Free</p>
                                                        
                                                        <a href="{{ URL::signedRoute('down',['key'=> $item->id])}}" class="buy btn">Download <i class="fa fa-download"></i></a>
                                                        @endif    
                                                    <div class="footer">
                                                        <button class="btn btn-simple" onclick="rotateCard(this)">
                                                            <i class="fa fa-mail-forward"></i> view details
                                                        </button>
                                                    </div>
                                                </div>
                                            </div> <!-- end front panel -->
                                        
                                            <div class="back mb-5">
                                                
                                                <div class="user">
                                                <img class="img-circle" src="/storage/authors/{{$item->author->photo}}" height="50" width="60">
                                                </div>
                                                <div class="content text-center">
                                                    <div class="main">
                                                    <h6 class="m-b-10">{{$item->author->name}} </h6>
                                                    <a href="/authors/{{$item->author->id}}">View more</a>
                                                    
                                                    <hr> 
                                                    <h6 class="m-b-10">Cat: {{$item->category->name}}</h6>
                                                    
                                                    <a href="/publish/{{$item->id}}">About book</a>
                                                    <p class="text-muted m-t-15">{{str_limit($item->description, $limit = 30, $end = '...')}}</p>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <button class="btn price p-2 mb-2" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                                <i class="fa fa-reply"></i> Back
                                                </button>
                                            </div>
                                            </div> <!-- end back panel -->
                                        </div> <!-- end card -->
                                    </div> <!-- end card-container -->
                                    </div> 
                                @endforeach
                               
                            @else    
         
                        
                            
                            <div class="col-md-3 col-lg-3">
                                <div class="card-container manual-flip">
                                    <div class="card">
                                        <div class="front mb-5">
                                            <div class="product">
                                                <img class="img-circle" src="img/book1.jpg" />
                                            </div>
                                            <div class="content text-center">
                                                <h6 class="f-w-600 m-b-10">MySQl Database</h6>
                                                <hr>
                                                <p class="price">$229.99</p>
                                                <a href="#" class="buy btn">Buy <i class="fa fa-shopping-cart"></i></a>
                                                <div class="footer">
                                                    <button class="btn btn-simple" onclick="rotateCard(this)">
                                                    <i class="fa fa-mail-forward"></i> view details
                                                    </button>
                                                </div>
                                            </div>
                                        </div> <!-- end front panel -->
                                        <div class="back mb-5">
                                            <div class="user">
                                                <img class="img-circle" src="img/authors/rotating_card_profile2.png" />
                                            </div>
                                            <div class="content text-center">
                                                <div class="main">
                                                    <h6 class="m-b-10"> prof Alessa Robert</h6>
                                                    <p class="text-muted">Active | Male </p>
                                                    <!-- <hr> -->
                                                    <p class="text-muted m-t-15">Edu Level: PHD</p>
                                                    <p class="text-muted m-t-15">"Lamborghini Mercy Your chick she so thirsty I'm in that two
                                                seat Lambo"</p>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="footer">
                                            <button class="btn price p-2 mb-2" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                                <i class="fa fa-reply"></i> Back
                                            </button>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                            </div> <!-- end card-container -->
                        
                            <div class="col-md-3 col-lg-3">
                                <div class="card-container manual-flip">
                                    <div class="card">
                                        <div class="front mb-5">
                                            <div class="product">
                                                <img class="img-circle" src="img/book1.jpg" />
                                            </div>
                                            <div class="content text-center">
                                                <h6 class="f-w-600 m-b-10">MySQl Database</h6>
                                                <hr>
                                                <p class="price">$229.99</p>
                                                <a href="#" class="buy btn">Buy <i class="fa fa-shopping-cart"></i></a>
                                                <div class="footer">
                                                    <button class="btn btn-simple" onclick="rotateCard(this)">
                                                    <i class="fa fa-mail-forward"></i> view details
                                                    </button>
                                                </div>
                                            </div>
                                        </div> <!-- end front panel -->
                                        <div class="back mb-5">
                                            <div class="user">
                                                <img class="img-circle" src="img/authors/rotating_card_profile2.png" />
                                            </div>
                                            <div class="content text-center">
                                                <div class="main">
                                                    <h6 class="m-b-10"> prof Alessa Robert</h6>
                                                    <p class="text-muted">Active | Male </p>
                                                    <!-- <hr> -->
                                                    <p class="text-muted m-t-15">Edu Level: PHD</p>
                                                    <p class="text-muted m-t-15">"Lamborghini Mercy Your chick she so thirsty I'm in that two
                                                    seat Lambo"</p>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <button class="btn price p-2 mb-2" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                                    <i class="fa fa-reply"></i> Back
                                                </button>
                                            </div>
                                        </div> <!-- end back panel -->
                                    </div> <!-- end card -->
                                </div> <!-- end card-container -->
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="card-container manual-flip">
                                    <div class="card">
                                        <div class="front mb-5">
                                            <div class="product">
                                                <img class="img-circle" src="img/book1.jpg" />
                                            </div>
                                            <div class="content text-center">
                                                <h6 class="f-w-600 m-b-10">MySQl Database</h6>
                                                <hr>
                                                <p class="price">$229.99</p>
                                                <a href="#" class="buy btn">Buy <i class="fa fa-shopping-cart"></i></a>
                                                <div class="footer">
                                                    <button class="btn btn-simple" onclick="rotateCard(this)">
                                                    <i class="fa fa-mail-forward"></i> view details
                                                    </button>
                                                </div>
                                            </div>
                                        </div> <!-- end front panel -->
                                        <div class="back mb-5">
                                            <div class="user">
                                                <img class="img-circle" src="img/authors/rotating_card_profile2.png" />
                                            </div>
                                            <div class="content text-center">
                                                <div class="main">
                                                    <h6 class="m-b-10"> prof Alessa Robert</h6>
                                                    <p class="text-muted">Active | Male </p>
                                                    <!-- <hr> -->
                                                    <p class="text-muted m-t-15">Edu Level: PHD</p>
                                                    <p class="text-muted m-t-15">"Lamborghini Mercy Your chick she so thirsty I'm in that two
                                                    seat Lambo"</p>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <button class="btn price p-2 mb-2" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                                    <i class="fa fa-reply"></i> Back
                                                </button>
                                            </div>
                                        </div> <!-- end back panel -->
                                    </div> <!-- end card -->
                                </div> <!-- end card-container -->
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="card-container manual-flip">
                                    <div class="card">
                                        <div class="front mb-5">
                                            <div class="product">
                                                <img class="img-circle" src="img/book1.jpg" />
                                            </div>
                                            <div class="content text-center">
                                                <h6 class="f-w-600 m-b-10">MySQl Database</h6>
                                                <hr>
                                                <p class="price">$229.99</p>
                                                <a href="#" class="buy btn">Buy <i class="fa fa-shopping-cart"></i></a>
                                                <div class="footer">
                                                    <button class="btn btn-simple" onclick="rotateCard(this)">
                                                    <i class="fa fa-mail-forward"></i> view details
                                                    </button>
                                                </div>
                                            </div>
                                        </div> <!-- end front panel -->
                                        <div class="back mb-5">
                                            <div class="user">
                                                <img class="img-circle" src="img/authors/rotating_card_profile2.png" />
                                            </div>
                                            <div class="content text-center">
                                                <div class="main">
                                                    <h6 class="m-b-10"> prof Alessa Robert</h6>
                                                    <p class="text-muted">Active | Male </p>
                                                    <!-- <hr> -->
                                                    <p class="text-muted m-t-15">Edu Level: PHD</p>
                                                    <p class="text-muted m-t-15">"Lamborghini Mercy Your chick she so thirsty I'm in that two
                                                    seat Lambo"</p>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <button class="btn price p-2 mb-2" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                                    <i class="fa fa-reply"></i> Back
                                                </button>
                                            </div>
                                        </div> <!-- end back panel -->
                                    </div> <!-- end card -->
                                </div> <!-- end card-container -->
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="card-container manual-flip">
                                    <div class="card">
                                        <div class="front mb-5">
                                            <div class="product">
                                            <img class="img-circle" src="img/book1.jpg" />
                                            </div>
                                            <div class="content text-center">
                                            <h6 class="f-w-600 m-b-10">MySQl Database</h6>
                                            <hr>
                                            <p class="price">$229.99</p>
                                            <a href="#" class="buy btn">Buy <i class="fa fa-shopping-cart"></i></a>
                                            <div class="footer">
                                                <button class="btn btn-simple" onclick="rotateCard(this)">
                                                <i class="fa fa-mail-forward"></i> view details
                                                </button>
                                            </div>
                                            </div>
                                        </div> <!-- end front panel -->
                                        <div class="back mb-5">
                                            <div class="user">
                                                <img class="img-circle" src="img/authors/rotating_card_profile2.png" />
                                            </div>
                                            <div class="content text-center">
                                                <div class="main">
                                                    <h6 class="m-b-10"> prof Alessa Robert</h6>
                                                    <p class="text-muted">Active | Male </p>
                                                    <!-- <hr> -->
                                                    <p class="text-muted m-t-15">Edu Level: PHD</p>
                                                    <p class="text-muted m-t-15">"Lamborghini Mercy Your chick she so thirsty I'm in that two
                                                    seat Lambo"</p>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <button class="btn price p-2 mb-2" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                                    <i class="fa fa-reply"></i> Back
                                                </button>
                                            </div>
                                        </div> <!-- end back panel -->
                                    </div> <!-- end card -->
                                </div> <!-- end card-container -->
                            </div>
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br>
        <hr>
        <h4 class="trendng mt-4">Trending</h4>
           
    </section>
    
    @foreach ($book as $item)
    @if($item->status === 1)
      {{-- for modal --}}
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                      
                          <div class="row" style="margin-bottom:40px;">
                              <div class="col-md-8 col-md-offset-2">
                              <p>
                                  <div>
                                  <p> {{$item->title}}</p>
                                  <p>  ₦ {{$item->price}}</p>
                                  </div>
                              </p>
                              <input type="text" name="email" value="" placeholder="Email" class="form-control"> {{-- required --}}
                              <small class="text-danger">use an active email</small>
                              <input type="hidden" name="amount" value="{{$item->price * 100}}"> {{-- required in kobo --}}
                              <input type="hidden" name="quantity" value="1">
                              <input type="hidden" name="metadata" value="{{ json_encode($array = ['book_id' => $item->id, 'title'=>$item->title]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                              <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                              <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                              {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
                  
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                  
                  
                              <p>
                                  <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                  <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                  </button>
                              </p>
                              </div>
                          </div>
                      
                      </form>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
              </div>
          </div>
      {{-- for modal --}}
            
    @endif
@endforeach   
</section>
@endsection