<!-- ########## START: LEFT PANEL ########## -->
@php
    $segment1 = Request::segment(1);
    $segment2 = Request::segment(2);
    $segment3 = Request::segment(3);


@endphp
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{route('admin.dashboard')}}" class="sl-menu-link @if($segment2==='dashboard') active show-sub @else  @endif">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        {{-- <a href="{{route('admin.cars.index')}}" class="sl-menu-link"> --}}
        <a href="{{route('admin.cars.index')}}" class="sl-menu-link @if($segment1==='cars') active show-sub @else  @endif">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Cars</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->





          <a href="{{route('admin.rentals.index')}}" class="sl-menu-link @if($segment1==='rentals') active show-sub @else  @endif">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">Rentals</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{route('admin.customers.index')}}" class="sl-menu-link @if($segment1==='customers') active show-sub @else  @endif">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">Customers</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="javascript: void(0);" class="sl-menu-link @if($segment2==='charts') active show-sub @else  @endif">


          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Charts</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='chartsMorris') active @else  @endif">Morris Charts</a></li>
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='chartsFlot') active @else  @endif">Flot Charts</a></li>
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='chartsJS') active @else  @endif">Chart JS</a></li>
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='chartsRickshaw') active @else  @endif">Rickshaw</a></li>
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='chartsSparkline') active @else  @endif">Sparkline</a></li>
        </ul>
        <a href="javascript: void(0);" class="sl-menu-link @if($segment2==='form') active show-sub @else  @endif">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Forms</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='formElements') active @else  @endif">Form Elements</a></li>
           </ul>
        <a href="#" class="sl-menu-link">
        <a href="javascript: void(0);" class="sl-menu-link @if($segment2==='UI_element') active show-sub @else  @endif">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">UI Elements</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='accordion') active @else  @endif">Accordion</a></li>








        </ul>
        <a href="javascript: void(0);" class="sl-menu-link @if($segment2==='table') active show-sub @else  @endif">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Tables</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link @if($segment3==='data') active @else  @endif">Data Table</a></li>
        </ul>
        <a href="javascript: void(0);" class="sl-menu-link @if($segment2==='map') active show-sub @else  @endif">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
            <span class="menu-item-label">Maps</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='google') active @else  @endif">Google Maps</a></li>
            </ul>
        <a href="mailbox.html" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Mailbox</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="javascript: void(0);" class="sl-menu-link @if($segment2==='page') active show-sub @else  @endif">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Pages</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="#" class="nav-link @if($segment3==='blank') active @else  @endif">Blank Page</a></li>
             </ul>
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
