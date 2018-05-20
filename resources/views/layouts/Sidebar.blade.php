<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            @if(Auth::user()->nombre == "")
                <div class="profile-usertitle-name">Sin Nombre</div>
                @else
                <div class="profile-usertitle-name">{{Auth::user()->nombre}}</div>
            @endif
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Conectado</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="active"><a href="{{route('PanelAdministracion')}}">Registrar Evento</a></li>
        <li><a href="{{route('Historial')}}">Historial</a></li>
        <li><a href="{{route('EstadoCuenta')}}">Estado de cuenta</a></li>
        <li><a href="{{route('Estadistica')}}">Estadistica</a></li>
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <em class="fa fa-power-off">&nbsp;</em> Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div><!--/.sidebar-->