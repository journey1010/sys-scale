@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li class="active">Incorporación</li>
    </ol>

    @include('template.partials.subMenuUser')

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Incorporación</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <h4>Listado de Resoluciones</h4>
                            </div>
                            <div class="col-xs-6">
                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>N° Folio</th>
                                    <th>N° de Resolución</th>
                                    <th>Tipo de Resolución</th>
                                    <th>Fecha de Resolución</th>
                                    <th>Descripción</th>
                                    <th>Nombre</th>
                                    <th>Órgano que lo expide</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0035</td>
                                    <td>1354968</td>
                                    <td>Nombramiento</td>
                                    <td>02/12/15</td>
                                    <td>Resolucion de nombramiento de estudios universitarios</td>
                                    <td>Resolucion de Nombramiento</td>
                                    <td>SUNEDU</td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection