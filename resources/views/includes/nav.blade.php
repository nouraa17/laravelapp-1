<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('cars')}}">CarsWebSite</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{ request()->routeIs('cars') ? 'active' : '' }}"><a href="{{route('cars')}}">Home</a></li>
            <li class="{{ request()->routeIs('createCar') ? 'active' : '' }}"><a href="createCar">Add</a></li>
            <li class="{{ request()->routeIs('trashedCar') ? 'active' : '' }}"><a href="trashedCar">Trash</a></li>
            <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </li>
            <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
            <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"> 
                عربي
            </a></li>
        </ul>
    </div>
</nav>