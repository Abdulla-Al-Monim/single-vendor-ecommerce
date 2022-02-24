<div class="card" style="width: 18rem;">
    @if(Auth::User()->image == null)
  <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset('fontend') }}/media/avatar.png" height="100%;" width="100%;" alt="">
  @else
  <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="">
  @endif
    <ul class="list-group list-group-flush">
      <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block " >Home</a>
      <a href="{{ route('my-orders') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
      <a href="{{ route('return-orders') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
      <a href="{{ route('cancel-orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
      <a href="{{ route('user-image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>
      <a href="{{ route('update-password') }}" class="btn btn-primary btn-sm btn-block">Update Password</a>
      
    <a class="dropdown-item btn btn-danger btn-sm btn-block" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
    </ul>
  </div>