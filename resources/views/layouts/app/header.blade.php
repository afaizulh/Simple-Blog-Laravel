    {{-- Header --}}
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Blog">
                        <i class="fa-sharp fa-solid fa-newspaper fs-5 pe-5"> MyBlog</i>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ url('posts') }}" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="{{ url('posts/create') }}" class="nav-link px-2 text-white">Create</a></li>
                    <li><a href="{{ url('posts/trash') }}" class="nav-link px-2 text-white">TrashBin</a></li>
                </ul>

                <div class="text-end">
                    @if (!Auth::check())
                        <a href="{{ url('login') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ url('register') }}" class="btn btn-warning">Register</a>
                    @else
                        <div class="nav-item dropdown">
                            <div class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="..."
                                    class="img-fluid me-1" style="max-width: 20%; height: auto; border-radius: 50%;">
                                {{ Auth::user()->name }}
                            </div>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
