<div class=""
style="width: 100%;display: flex;border-bottom: 1px solid #dee2e6;flex-direction: row-reverse !important;padding: 0.5rem 0;">
{{-- <form style="position: relative;display: flex;" id="logout-form" action="" method="POST"> --}}


    <nav class="menu menu-dash">
        <div class="nav-item dropdown">
            <p id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 {{ Auth::user()->name }} <i class="bi bi-chevron-down"></i>
            </p>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <div class="list-dropdown">
                    <a class="dropdown-item pl-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right" style="margin-right: 5px"></i> {{ __('Logout') }}
                    </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
            </div>
        </div>
    </nav>

{{-- </form> --}}

</div>
