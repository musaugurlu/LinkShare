<!-- #Left Sidebar ==================== -->
<div class="sidebar">
  <div class="sidebar-inner">
    <!-- ### $Sidebar Header ### -->
    <div class="sidebar-logo">
      <div class="peers ai-c fxw-nw">
        <div class="peer peer-greed">
          <a class="sidebar-link td-n" href="{{url('/home')}}">
            <div class="peers ai-c fxw-nw">
              <div class="peer">
                <div class="logo">
                  <img src="{{asset('images/logo.png')}}" alt="">
                </div>
              </div>
              <div class="peer peer-greed">
                <h5 class="lh-1 mB-0 logo-text">{{ config('app.name', 'New App') }}</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="peer">
          <div class="mobile-toggle sidebar-toggle">
            <a href="" class="td-n">
              <i class="ti-arrow-circle-left"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- ### $Sidebar Menu ### -->
    <ul class="sidebar-menu scrollable pos-r">
      <li class="nav-item mT-30 actived">
        <a class="sidebar-link" href="{{url('/home')}}">
          <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{route('links')}}">
          <span class="icon-holder">
            <i class="c-brown-500 ti-link"></i>
          </span>
          <span class="title">My Links</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{route('linkgroups')}}">
          <span class="icon-holder">
            <i class="c-brown-500 ti-layers-alt"></i>
          </span>
          <span class="title">My Link Groups</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="{{route('linkgroups')}}">
          <span class="icon-holder">
            <i class="c-brown-500 ti-share"></i>
          </span>
          <span class="title">Shared Groups</span>
        </a>
      </li>
    </ul>
  </div>
</div>