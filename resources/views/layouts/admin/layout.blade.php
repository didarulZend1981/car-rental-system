<!DOCTYPE html>
<html lang="en">
  <head>

    @include('layouts.admin.partials.header')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('layouts.admin.partials.sidebar_left_panel')

    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('layouts.admin.partials.sidebar_head_panel')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## END: HEAD PANEL ########## -->

    @include('layouts.admin.partials.sidebar_right_panel')

    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel">
        @yield('sl-mainpanel')
       {{-- @include('layouts.admin.partials.content_footer') --}}
    </div><!-- sl-mainpanel -->






  <!-- ########## END: MAIN PANEL ########## -->




  @include('layouts.admin.partials.inc_footer')

  @stack('js')
  </body>
</html>
