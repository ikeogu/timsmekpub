<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Timsmek Invoice</title>
</head>

<body>
    <div class="wrapper">

        <div class="content-area">
            <div class="back-button">
            <a href="{{route('orderDetails',['id' => $order->id])}}" class="btn-outline-info">previous page</a>
            </div>
            <div class="recipt card">
                    <div class="branding">
                         <img src="{{asset('img/logo.png')}}" alt="logo" class="img-fluid" width="400">
                    </div>
                <div class="recipt-header card-header">
                    <div class="invoice">
                        <h1>Invoice</h1>
                        <!-- <h5>Paymant receipt</h5> -->
                        <div class="invoice-id">
                            <div class="order-id id-hidden mr-5">
                                <h6>Order ID</h6>
                            <p>{{$order->order_id}}</p>
                            </div>
                            <div class="date">
                                <h6>Date Issued</h6>
                                <p>{{date('d/M/Y h:i:s',strtotime($order->paid_at))}}</p>
                            </div>
                        </div>
                    </div>
                   
                   
                    
                </div>
                <div class="card-body">
                    <div class="body-title row my-4">
                        <div class="billed col-sm-6 col-md-3 mx-auto">
                                <div class="order-id id-sm-show ml-5">
                                    <h6>Order ID</h6>
                                    <hr>
                                    <p><strong>{{$order->order_id}}</strong></p>
                                    <hr>
                                </div>
                            <ul>
                            <li><strong>Billed to:</strong></li>
                            <li>{{$order->full_name}}</li>
                            <li>{{$order->address}}</li>
                            <li>{{$order->city. ' , ' .$order->state. ' , '. $order->country}}</li>
                            </ul>
                        </div>
                        <div class="comp">
                            <ul>
                                <li><strong>Issued By:</strong></li>
                                <li>Timsmek Publishers</li>
                                <li>www.timsmekpublishers.com</li>
                                <li>support@sleekamaria.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mx-auto mt-4">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="">Item</th>
                                            <th scope="col">Unit cost</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Amount</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->items as $item)
                                        <tr>
                                            <td>{{$item['item']['title']}}</td>
                                            <td>{{$currency .' '.number_format(($item['item']['price']/100),2) }}</td>
                                            <td>{{$item['qty']}}</td>
                                            <td>{{$currency .' '.number_format($item['price'],2)}}</td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="receipt-footer row">
                        <div class="total text-center col-sm-12">
                            <h4>Invoice total</h4>
                        <h3>{{$currency .' '.number_format($cart->totalPrice,2)}}</h3>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger mx-5 mb-5" onclick="window.print()">Print</button>
            </div>
            
        </div>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>