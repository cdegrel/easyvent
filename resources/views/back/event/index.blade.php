@extends('back.template')

@section('main')

    <div class="page-title">
        <div class="title_left">
            <h3>Evènements</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Evènements</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped projects jambo_table">
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 20%">Titre</th>
                            <th>Organisateur</th>
                            <th>Tickets</th>
                            <th>Status</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>
                                        {{ $event->title }}
                                        <br />
                                        <small>Créé le {{ date('d/m/Y', strtotime($event->created_at)) }}</small>
                                    </td>
                                    <td><a>{{ $event->organizer->name }}</a></td>
                                    <td>{{ $event->ticket->sum('quantity') }}</td>
                                    <td>{{ $event->is_publish }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{!! url('/e/'.$event->id) !!}" class="btn btn-info" type="button">Visualiser</a>
                                            <a href="{!! route('event.edit', $event->id) !!}" class="btn btn-success" type="button" @if($event->is_publish) disabled @endif>Editer</a>
                                            <a href="javascript:void(0)" onclick="confirmDel({{ $event->id }})" class="btn btn-danger" type="button">Supprimer</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        {{--function confirmDel(id) {--}}
            {{--swal({--}}
                {{--title: 'Etes-vous sûr ?',--}}
                {{--text: "Les données liées à l'évènement seront également supprimées!",--}}
                {{--type: 'warning',--}}
                {{--showCancelButton: true,--}}
                {{--confirmButtonColor: '#3085d6',--}}
                {{--cancelButtonColor: '#d33',--}}
                {{--confirmButtonText: 'Oui, je confirme',--}}
                {{--cancelButtonText: 'Annuler!',--}}
                {{--confirmButtonClass: 'btn btn-success',--}}
                {{--cancelButtonClass: 'btn btn-danger',--}}
                {{--buttonsStyling: false--}}
            {{--}).then(function () {--}}
                {{--$.post({--}}
                    {{--url: '{!! route('event.destroy', id) !!}',--}}
                    {{--success: function(data){--}}
                        {{--swal(--}}
                            {{--'Suppression avec succès !',--}}
                            {{--"L'évènement à bien été supprimé",--}}
                            {{--'success'--}}
                        {{--);--}}
                    {{--},--}}
                    {{--error: function(){--}}
                        {{--swal({--}}
                            {{--title: 'Erreur !',--}}
                            {{--html: $('<div>')--}}
                                {{--.addClass('some-class')--}}
                                {{--.text('Une erreur est survenue !'),--}}
                            {{--animation: false,--}}
                            {{--customClass: 'animated tada'--}}
                        {{--})--}}
                    {{--}--}}
                {{--})--}}
            {{--}, function (dismiss) {--}}
                {{--if (dismiss === 'cancel') {--}}
                    {{--swal(--}}
                        {{--'Annulation',--}}
                        {{--'Votre évènement est toujours présent :)',--}}
                        {{--'error'--}}
                    {{--)--}}
                {{--}--}}
            {{--})--}}
        {{--}--}}
    </script>

@endsection

