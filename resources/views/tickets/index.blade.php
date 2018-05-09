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
            <!-- Список с категориями -->
            <div class="container">
                <div class="form-group">
                    <label for="category_id" style="float: left;">Select category</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
            <div class="panel-heading ticket-panel-header">
                Last ticket
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th colspan="2" valign="centre"></th>
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
                                <div>{{ $ticket->category->name }}</div>
                            </td>
                            <td>
                                <div>{{ $ticket->created_at }}</div>
                            </td>

                            <td>
                                <form action="{{ url('ticket/'.$ticket->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $ticket->id }}" class="btn btn-default">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('/ticket/'.$ticket->id.'/edit') }}" method="GET">
                                    {{ csrf_field() }}
                                    {{ method_field('EDIT') }}

                                    <button type="submit" id="edit-task-{{ $ticket->id }}" class="btn btn-default">
                                        <i class="fa fa-btn fa-trash"></i>Edit
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection