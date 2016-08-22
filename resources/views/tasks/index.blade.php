<!-- resource/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="title">New Task</div>
        </div>
        <div class="panel-body">
            <!-- display validation errors -->
            @include('common.errors')

            <!-- new task form -->
            <form action="{{ url('task') }}" method="post">
                {{ csrf_field() }}
                <!-- task name -->
                <div class="form-group">
                    <label for="task-name">Task</label>
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>

                <!-- add task button -->
                <div class="form-group">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- todo current tasks -->
    @if( count($tasks) > 0 )
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{$task->name}}</div>
                                </td>
                                <!-- delete button -->
                                <td align="right">
                                    <form method="post" action="{{ url('task/'.$task->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete
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
</div>
@endsection