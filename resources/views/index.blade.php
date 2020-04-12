@extends('layouts.app')
 @section ('content')
    <div class="page-header">
      <img src="{{asset('img/blob.png')}}" class="path">
      <img src="{{asset('img/path2.png')}}" class="path2">
      <img src="{{asset('img/triunghiuri.png')}}" class="shapes triangle">
      <img src="{{asset('img/waves.png')}}" class="shapes wave">
      <img src="{{asset('img/patrat.png')}}" class="shapes squares">
      <img src="{{asset('img/cercuri.png')}}" class="shapes circle">
      <div class="content-center">
        <div class="row row-grid justify-content-between align-items-center text-left">
          <div class="col-lg-6 col-md-6">
            <h1 class="text-dark">A penny saved is a penny earned
              <br/>
              <span class="text-dark">-Benjamin Franklin -</span>
            </h1>
            <p class="text-dark mb-3">Don't save what you have left after spending, but spend what is left after saving.</p> 
            <div class="btn-wrapper mb-3">
              
            </div>
            
          </div>
          <div class="col-lg-4 col-md-5">
            <img src="{{asset('img/etherum.png')}}" alt="Circle image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <section class="section section-lg">
      <section class="section">
        <img src="{{asset('img/path4.png')}}" class="path">
        <div class="container">
            <h1 class="text-dark">Set a
                  Goal</h1>
          <div class="row row-grid justify-content-between">
            <div class="col-md-5 mt-lg-5">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 px-2 py-2">
                      <div class="card card-stats ">
                        <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Amount</th>
                                            <th>Plan</th>
                                            
                                            <th class="text-right">Goal in 365 Days</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>₦100</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦ 36,500</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>₦200</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦73,000</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>₦300</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦109,500</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>₦500</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦182,500</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td>₦1000</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦365,000</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td>₦1500</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦547,500</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td>₦2000</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦730,000</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td>₦2500</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦912,500</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td>₦3000</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦1,095,000</td>
                                            
                                        </tr>
                                         <tr>
                                            <td class="text-center">10</td>
                                            <td>₦10,000</td>
                                            <td>Daily</td>
                                            
                                            <td class="text-right">₦3,650,000</td>
                                            
                                        </tr>
                                    </tbody>
                                </table> 
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="pl-md-5">
                <h1 class="text-dark">365 days
                  <br/>Achivement</h1>
                
                <img src="{{asset('img/money.jpg')}}" class="img-fluid floating">
                <br/>
                <p class="text-dark">don't save what you have left after spending, but spend what is left  after saving.</p>
                <br/>
                
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
    <section class="section section-lg">
      <img src="{{asset('img/path4.png')}}" class="path">
      <img src="{{asset('img/path5.png')}}" class="path2">
      <img src="{{asset('img/path2.png')}}" class="path3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <h1 class="text-center text-dark">Your best benefit</h1>
            <div class="row row-grid justify-content-center">
              <div class="col-lg-3">
                <div class="info">
                  <div class="icon icon-primary">
                    <i class="tim-icons icon-money-coins"></i>
                  </div>
                  <h4 class="info-title text-dark">Low Commission</h4>
                  <hr class="line-primary text-dark">
                  <p class="text-dark">In ChizzySavings we take low commission to keep your money per month. </p>
                    
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card card-stats">
                  <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Amount</th>
                                <th>Commission</th>
                                
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>₦100</td>
                                <td>₦50</td>
                                <td>Monthly</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>₦200 </td>
                                <td>₦100</td>
                                <td>Monthly</td>
                            </tr>
                             <tr>
                                <td class="text-center">3</td>
                                <td>₦300 </td>
                                <td>₦150</td>
                                <td>Monthly</td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>₦400 </td>
                                <td>₦200</td>
                                <td>Monthly</td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>₦500 </td>
                                <td>₦250</td>
                                <td>Monthly</td>
                            </tr>
                             <tr>
                                <td class="text-center">6</td>
                                <td>₦1000</td>
                                <td>₦500 </td>
                                <td>Monthly</td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>₦1500</td>
                                <td>₦750 </td>
                                <td>Monthly</td>
                            </tr>
                             
                        </tbody>
                    </table>
                </div>
              </div>
              <!--<div class="col-lg-3">-->
              <!--  <div class="info">-->
              <!--    <div class="icon icon-success">-->
              <!--      <i class="tim-icons icon-single-02"></i>-->
              <!--    </div>-->
              <!--    <h4 class="info-title">Verified People</h4>-->
              <!--    <hr class="line-success">-->
              <!--    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing be enough.</p>-->
              <!--  </div>-->
              <!--</div>-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-lg section-safe">
      <img src="{{asset('img/path5.png')}}" class="path">
      <div class="container">
        <div class="row row-grid justify-content-between">
          <div class="col-md-5">
            <img src="{{asset('img/WhatsApp Image 2020-03-13 at 3.19.07 PM.jpeg')}}" class="img-fluid floating">
            <div class="card card-stats bg-danger">
              <div class="card-body">
                <div class="justify-content-center">
                  <div class="numbers">
                    <p class="card-title">100%</p>
                    <p class="card-category text-dark">Safe</p>
                  </div>
                </div>
              </div>
            </div>
            <!--<div class="card card-stats bg-info">-->
            <!--  <div class="card-body">-->
            <!--    <div class="justify-content-center">-->
            <!--      <div class="numbers">-->
                    <!--<p class="card-title"></p>-->
            <!--        <p class="card-category text-dark">Satisfied customers</p>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="card card-stats bg-default">-->
            <!--  <div class="card-body">-->
            <!--    <div class="justify-content-center">-->
            <!--      <div class="numbers">-->
            <!--        <p class="card-title">10 425</p>-->
            <!--        <p class="card-category text-dark">Business</p>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
          <div class="col-md-6">
            <div class="px-md-5">
              <hr class="line-success">
              <h3 class="text-dark">Your Gain</h3>
              <p class="text-dark" >when you invite 10 persons, for <strong>6 months</strong> no commission will be taken.</p>
              <ul class="list-unstyled mt-5">
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-success mb-2">
                      <i class="tim-icons icon-vector"></i>
                    </div>
                    <div class="ml-3">
                      <h6 class="text-dark">Invite a friend</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-success mb-2">
                      <i class="tim-icons icon-tap-02"></i>
                    </div>
                    <div class="ml-3">
                      <h6 class="text-dark">Low commission</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-success mb-2">
                      <i class="tim-icons icon-single-02"></i>
                    </div>
                    <div class="ml-3">
                      <h6 class="text-dark">Quick money payback.</h6>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
 
    <section class="section section-lg section-coins">
      <img src="{{asset('img/path3.png')}}" class="path">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <hr class="line-info">
            <h1 class="text-dark">Choose a Goal
              <span class="text-info"></span>
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="{{asset('img/bitcoin.png')}}" class="img-center img-fluid">
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <h4 class="text-uppercase">Monthly</h4>
                    <span>Plan</span>
                    <hr class="line-primary">
                  </div>
                </div>
                <div class="row">
                  <ul class="list-group">
                    <!--<li class="list-group-item">Daily </li>-->
                    <!--<li class="list-group-item">Daily</li>-->
                    <!--<li class="list-group-item">24/7 Support</li>-->
                  </ul>
                </div>
              </div>
              <div class="card-footer text-center">
                <a href="/register" class="btn btn-primary btn-simple">Get plan</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="{{asset('img/etherum.png')}}" class="img-center img-fluid">
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <h4 class="text-uppercase">Mid-year </h4>
                    <span>Plan</span>
                    <hr class="line-success">
                  </div>
                </div>
                <div class="row">
                  <!--<ul class="list-group">-->
                  <!--  <li class="list-group-item">150 messages</li>-->
                  <!--  <li class="list-group-item">1000 emails</li>-->
                  <!--  <li class="list-group-item">24/7 Support</li>-->
                  <!--</ul>-->
                </div>
              </div>
              <div class="card-footer text-center">
                <a href="/register"class="btn btn-success btn-simple">Get plan</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="{{asset('img/ripp.png')}}" class="img-center img-fluid">
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <h4 class="text-uppercase">Yearly</h4>
                    <span>Plan</span>
                    <hr class="line-info">
                  </div>
                </div>
                <div class="row">
                  <ul class="list-group">
                    <!--<li class="list-group-item">350 messages</li>-->
                    <!--<li class="list-group-item">10K emails</li>-->
                    <!--<li class="list-group-item">24/7 Support</li>-->
                  </ul>
                </div>
              </div>
              <div class="card-footer text-center">
                <a href="/register" class="btn btn-info btn-simple">Get plan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection