@extends('layouts.admin')
@section('adminMain')
    

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-danger">LIST OF CUSTOMERS</h6>
        </div>
        <div class="container">
                
            <div class="container">
                
                <div class="row">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone NO.</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($customers)
                                @foreach($customers as $customer)
                                
                                <tr>
                                    <th scope="row">
                                        @if($customer->first_name)
                                        {{$customer->first_name. " " .$customer->last_name}} 
                                        @else
                                        {{$customer->name}}
                                        @endif
                                    </th>
                                    <td>
                                            {{$customer->phone}} 
                                    </td>
                                    <td>
                                            {{$customer->email}}
                                    </td>
                                    <td>
                                            {{$customer->country ? $customer->country : " "}}
                                    </td>
                                    <td>
                                        {{$customer->state ? $customer->state : " "}}
                                </td>
                                    <td>
                                    <a href="{{route('viewCustomer',['id' => $customer->id])}}" class="btn btn-sm btn-warning">View Details</a>
                                    
                                </tr>
                                @endforeach
                                @endif
                               
                            </tbody>
                        </table>
                        {{$customers->links()}}
                    </div>
                </div>
            </div>
    </div>
@endsection    