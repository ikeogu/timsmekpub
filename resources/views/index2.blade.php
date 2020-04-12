@extends('layouts.app')
@section('content')
    

  <!-- Masthead -->
  <header class="masthead"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">A penny saved is a penny earned</h1>
          <h5 class="text-uppercase text-white font-weight-bold">-Benjamin Franklin -</h5>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Don't save what you have left after spending, but spend what is left after saving.</p>
          
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">About Us</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">ChizzySavings is a savings platform where you choose either to save your money daily,Monthly,or quartly for a certain duration. We serve as a little restriction to your expenses. Its a platform that makes sure you save money cause money will save you. All savings with low commission.</p>
          
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">At Your Service</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Save Money</h3>
            <p class="text-muted mb-0">Your money in save hands</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Low Commission</h3>
            <p class="text-muted mb-0">We take a little to keep them save.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Give Loan</h3>
            <p class="text-muted mb-0">Loans are easily accessible.</p>
          </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Made with Love</h3>
            <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
          </div>
        </div> --}}
      </div>
    </div>
  </section>

  

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Set a Goal </h2>
      <div class="row row-grid justify-content-between">
        <div class="col-md-5 mt-lg-5">
            <div class="row">
                <div class="col-lg-12 col-sm-12 px-2 py-2">
                  <div class="card card-stats ">
                    <div class="table-responsive text-nowrap">
              
                      <table class="table table-striped table-responsive">
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
            
            <img src="{{asset('img/WhatsApp Image 2020-03-13 at 3.19.07 PM.jpeg')}}" class="img-fluid floating">
            <br/>
            <p class="text-dark">Don't save what you have left after spending, but spend what is left  after saving.</p>
            <br/>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-dark mt-0">Our Commission Rate</h2>
          <hr class="divider light my-4">
        
          <div class="table-responsive text-nowrap">
              
            <table class="table table-striped table-responsive">
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
      </div>  
    </div>
  </section> 
  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">for more inquires and you can reach out to us </p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+234 708 747 0153</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">support@chizzysavings.com.ng</a>
        </div>
      </div>
    </div>
  </section>

@endsection 