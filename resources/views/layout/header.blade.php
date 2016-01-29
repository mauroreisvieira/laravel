<nav class="nav">
    <div class="container">
        <div class="row">
            <div class="large-6 medium-6 small-6">
             <?php  if (Auth::check()) { ?>
                <h5 class="profile"><?php  echo Auth::user()->name; ?></h5>
                <?php } ?>
            </div>
            <div class="large-6 medium-6 small-6">
                <ul class="navigation horizontal float-right">
                 <?php  if (Auth::check()) { ?>
                    <li><a href="{{ url('dashboard') }}">Lobby</a></li>
                    <li><a href="{{ url('game') }}">New game</a></li>
                    <li><a href="{{ url('logout') }}">Logout</a></li>
                    <?php } else {  ?>
                    <li><a href="{{ url('login') }}">Login/Register</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
