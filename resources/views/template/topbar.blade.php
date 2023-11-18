<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#">
                <i class="far fa-question-circle"></i>
            </a>
        </li>
        <li>
            <form action="{{url("")}}/logout" method="post">
                @csrf
                <button type="submit" class="nav-link btn btn-danger" style="color:white">
                    Keluar <i class="fas fa-sign-out-alt" style="margin-left:7px;"></i>
                </button>
            </form>
        </li>
    </ul>
</nav>
