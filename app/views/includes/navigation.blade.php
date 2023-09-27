<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1><a href="/">Study Mage</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="right">
      @if (Auth::check())
        <li><a href="">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></li>
        <li><a href="/logout">Logout</a></li>
      @else
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>  
      @endif  
    </ul>
  </section>
</nav>