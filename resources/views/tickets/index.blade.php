@extends('layouts.app')

@section('content')
    <!-- Форма создания задачи... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
        <form action="{{ url('ticket') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Title</label>
                <div class="col-sm-6">
                    <input type="text" name="title" id="ticket-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Body</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="body"></textarea>
                </div>
            </div>

            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add ticket
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Текущие задачи -->
    @if (count($tickets) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Last ticket
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Action</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $ticket->title }}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->body }}</div>
                            </td>

                            <td>
                                <!-- TODO: Кнопка Удалить -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection