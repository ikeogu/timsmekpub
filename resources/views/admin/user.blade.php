@extends('layouts.admin')

@section('content')

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> All Activated User</h1>
        <p class="mb-4">Active users of your platform.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users Details</h6>
          </div>
          <div class="card-body">
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
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Plan</th>
                    <th>Start Amount</th>
                    <th>Acct balance</th>
                    <th>Joined</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ($user as $id => $item)
                    <tr>
                    <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->mode}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->acct_bal}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td>
                            <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#modal-{{$id}}" >Credit User</button>
                            <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#debitModal-{{$id}}" >Debit User</button>
                            
                        
                        <form action="{{ route('account.destroy' , [$item->id])}}" method="POST">
                          <input name="_method" type="hidden" value="DELETE">
                          {{ csrf_field() }}                                                       
                              <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure you want to Delete this account?')">Delete</button>
                              
                          </form>
                          <a href="/record/{{$item->id}}"  class="btn btn-info btn-user btn-block">Record</a>
                        </td>
                      </tr> 
                      <div class="modal fade" id="modal-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Fill in Details Below</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  <form method="POST" action="{{route('account.store')}}">
                                    @csrf
                                  <input type="hidden" value="{{$item->id}}" name="user_id">
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Amount</label>
                                      <input type="number" class="form-control" id="recipient-name" name="amount" value="{{$item->amount}}">
                                      </div>
                                      <div class="form-group" >
                                        <select  name="day" class="form-control" placeholder="Day">
                                          <option value="Sun">Sun</option>
                                          <option value="Mon">Mon</option>
                                          <option value="Tue">Tue</option>
                                          <option value="Wed">Wed</option>
                                          <option value="Thur">Thu</option>
                                          <option value="Fri">Fri</option>
                                          <option value="Sat">Sat</option>
                                        </select>
                                      </div>
                                      <div class="form-group" >
                                        <select  name="mnth" class="form-control" placeholder="Day">
                                          <option value="Jan">Jan</option>
                                          <option value="Feb">Feb</option>
                                          <option value="Mar">March</option>
                                          <option value="Apr">Apr</option>
                                          <option value="May">May</option>
                                          <option value="June">June</option>
                                          <option value="Aug">Aug</option>
                                          <option value="Sep">Sep</option>
                                          <option value="May">Oct</option>
                                          <option value="June">Nov</option>
                                          <option value="Aug">Dec</option>
                                        </select>
                                      </div>
                                      
                                      <button type="submit" class="btn btn-primary">Credit</button>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   
                                  </div>
                                </div>
                              </div>
                     </div>
                     
                     <div class="modal fade" id="debitModal-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="debitModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Fill in Details Below</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="{{route('account.debit')}}">
                              @csrf
                            <input type="hidden" value="{{$item->id}}" name="user_id">
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Amount</label>
                                <input type="number" class="form-control" id="recipient-name" name="amount" >
                                </div>
                               
                                 <div class="form-group" >
                                        <select  name="day" class="form-control" placeholder="Day">
                                          <option value="Sun">Sun</option>
                                          <option value="Mon">Mon</option>
                                          <option value="Tue">Tue</option>
                                          <option value="Wed">Wed</option>
                                          <option value="Thur">Thu</option>
                                          <option value="Fri">Fri</option>
                                          <option value="Sat">Sat</option>
                                        </select>
                                      </div>
                                      <div class="form-group" >
                                        <select  name="mnth" class="form-control" placeholder="Day">
                                          <option value="Jan">Jan</option>
                                          <option value="Feb">Feb</option>
                                          <option value="Mar">March</option>
                                          <option value="Apr">Apr</option>
                                          <option value="May">May</option>
                                          <option value="June">June</option>
                                          <option value="Aug">Aug</option>
                                          <option value="Sep">Sep</option>
                                          <option value="May">Oct</option>
                                          <option value="June">Nov</option>
                                          <option value="Aug">Dec</option>
                                        </select>
                                      </div>
                                      
                                
                                <button type="submit" class="btn btn-success">Debit</button>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  <tr>
                      <td>_</td>
                      <td>_</td>
                      <td>_</td>
                      <td>_</td>
                      <td>Total Amount</td>
                      <td>{{$total}}</td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
@endsection