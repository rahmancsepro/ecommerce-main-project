<div class="card text-center" style="width: 18rem;">
  @if(Auth::user()->image == null)
  <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset('fontend/media/avatar.jpg') }}" height="100%;" width="100%;" alt="Card image cap">
  @else
  <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="Card image cap">
  @endif
  <br>
  <br>
  <ul class="list-group list-group-flush">
    <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block " >Home</a>
    <a href="{{route('user.my-order')}}" class="btn btn-primary btn-sm btn-block">My Orders</a>
    <a href="{{route('user.return-order')}}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
    <a href="{{route('user.cancel-order')}}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
    <a href="{{route('user.load-image')}}" class="btn btn-primary btn-sm btn-block">Update Image</a>
    <a href="{{route('user.update-password')}}" class="btn btn-primary btn-sm btn-block">Update Password</a>
    <a href="" class="btn btn-primary btn-sm btn-block">Chats</a>
    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
  document.getElementById('logout-form').submit();"> Log Out</a>
  </ul>
</div>