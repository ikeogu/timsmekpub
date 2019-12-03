    <div class="col-md-3">
        <div class="container">
          <div class="cards">
            <div class="card-header">
              Recent Publications
            </div>
            <div class="card-body">
              @if (count($recent ) > 0)
                 @foreach ($recent  as $item)
                  <div class="card-inner">
                    <p><i class="icon ion-md-journal mr-2"></i>{{$item->title}}</p>
                    <ul>
                      <li>by: <span>{{$item->author->name}}</span></li>
                      <li>Date: <span>{{$item->created_at->diffForHumans()}}</span></li>
                    </ul>
                  </div>
                 @endforeach 
              @else
              


              <div class="card-inner">
                <p><i class="icon ion-md-journal mr-2"></i>Notes on Language and Linguistics</p>
                <ul>
                  <li>by: <span>Stephen john</span></li>
                  <li>Date: <span>22-11-2019</span></li>
                </ul>
              </div>

              <div class="card-inner">
                <p><i class="icon ion-md-journal mr-2"></i>Notes on Language and Linguistics</p>
                <ul>
                  <li>by: <span>Stephen john</span></li>
                  <li>Date: <span>22-11-2019</span></li>
                </ul>
              </div>

              <div class="card-inner">
                <p><i class="icon ion-md-journal mr-2"></i>Notes on Language and Linguistics</p>
                <ul>
                  <li>by: <span>Stephen john</span></li>
                  <li>Date: <span>22-11-2019</span></li>
                </ul>
              </div>

              @endif
            </div>
          </div>
        </div>
      </div>