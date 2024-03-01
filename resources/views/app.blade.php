@include('head');
@include('header');

<nav>
    <ul>
        <li><a href="#home"></a></li>
        <li><a href="#about"></a></li>
        <li><a href="#services"></a></li>
        <li><a href="#contact"></a></li>
        <li><a href="#gallery"></a></li>
    </ul>
</nav>

@yield('body')

@include('footer');
@include('foot');
