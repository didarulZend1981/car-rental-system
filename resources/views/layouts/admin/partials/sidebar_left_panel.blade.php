<!-- ########## START: LEFT PANEL ########## -->
@php
    $segment1 = Request::segment(1);
    $segment2 = Request::segment(2);
    $segment3 = Request::segment(3);


@endphp
    <div class="sl-logo"><a href="{{route('home')}}"><i class="icon ion-android-star-outline"></i>GO HOME</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">

        {{-- <a href="{{route('admin.cars.index')}}" class="sl-menu-link"> --}}

         <?php   $user = Auth::user() ?>

         @if ($user->role === 'admin')

         <a href="{{route('admin.dashboard')}}" class="sl-menu-link @if($segment2==='dashboard') active show-sub @else  @endif">
            <div class="sl-menu-item">
                <i class="fa fa-bank"></i>
              <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

        <a href="{{route('admin.cars.index')}}" class="sl-menu-link @if($segment1==='cars') active show-sub @else  @endif">
          <div class="sl-menu-item">
            <i class="fa fa-female"></i>
            <span class="menu-item-label">Cars</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->





          <a href="{{route('admin.rentals.index')}}" class="sl-menu-link @if($segment1==='rentals') active show-sub @else  @endif">
            <div class="sl-menu-item">
                <i class="fa fa-automobile"></i>
              <span class="menu-item-label">Rentals</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{route('admin.customers.index')}}" class="sl-menu-link @if($segment1==='customers') active show-sub @else  @endif">
            <div class="sl-menu-item">
                <i class="fa fa-bar-chart"></i>
              <span class="menu-item-label">Customers</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        {{-- <a href="{{route('admin.test')}}" class="sl-menu-link @if($segment1==='admin') active show-sub @else  @endif">
            <div class="sl-menu-item">
                <i class="fa fa-bar-chart"></i>
              <span class="menu-item-label">admin-test</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link --> --}}

        @elseif($user->role === 'customer')


        <a href="{{route('customer.dashboard')}}" class="sl-menu-link @if($segment1==='customer') active show-sub @else  @endif">
            <div class="sl-menu-item">
                <i class="fa fa-bank"></i>
              <span class="menu-item-label">dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{route('customers.rental')}}" class="sl-menu-link @if($segment2==='rental') active show-sub @else  @endif">
            <div class="sl-menu-item">
                <i class="fa fa-automobile"></i></li>
              <span class="menu-item-label">rental</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->



        <a href="{{route('customers.rentalHistory')}}" class="sl-menu-link @if($segment1==='rentalHistory') active show-sub @else  @endif">
            <div class="sl-menu-item">
                <i class="fa fa-bar-chart"></i>
              <span class="menu-item-label">Rental History</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->



        @endif



      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
