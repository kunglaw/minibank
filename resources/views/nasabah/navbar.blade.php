
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Minibank</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('dashboard') }}">Home</a></li>
            <li><a href="{{ url('nasabah') }}">Nasabah</a></li>
            <li><a href="#contact">Transaksi</a></li>
            <li><a href="#contact">Laporan</a></li>
          </ul>
         
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Profile</a></li>
            <li><a href="../navbar-static-top/">Logout</a></li>
          </ul>
         
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
