@extends('layouts.app')

@section('content')
    <!-- Форма создания задачи... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->

    <!-- Текущие задачи -->
        <div class="panel panel-default">
            <div class="panel-heading ticket-panel-header">
                <h3> {{$category->name}} Category Ticket</h3>
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
@endsection