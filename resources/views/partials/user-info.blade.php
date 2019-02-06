<div class="user-info">
    {{--<div class="image">
        <img src="{{ asset("images/user.png") }}" width="48" height="48" alt="User" />
    </div>--}}
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ strtoupper(Auth::user()->name) }}</div>
        <div class="email">{{ strtoupper(Auth::user()->tipo) }}</div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="{{ route('user.editar',Auth::user()->id) }}"><i class="material-icons">person</i>Modificar Perfil</a></li>
                <li role="seperator" class="divider"></li>
                <li><a href="{{ route('salir') }}"><i class="material-icons">input</i>Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</div>
