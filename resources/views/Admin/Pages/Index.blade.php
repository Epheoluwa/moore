@extends('Admin.index')

@section('content')

<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body">

            <div class="d-flex justify-content-between">

                @if(Auth::user()->role == 1)
                <a class="btn btn-primary mb-3 text-white" style="cursor:pointer" data-toggle="modal" data-target="#createModal">
                    <span class="fa fa-plus"></span>
                    Add New Task
                </a>
                @endif
            </div>


            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Team</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn = 0; ?>
                        @foreach ($task as $tas)
                        <tr>
                            <td><?= ++$sn ?></td>
                            <td>{{ $tas->title }}</td>
                            <td>{{ $tas->description }}</td>
                            <td>
                                @if($tas->team == 2)
                                IT
                                @elseif($tas->team == 3)
                                HR
                                @elseif($tas->team ==4)
                                Security
                                @else
                                Customer Care
                                @endif

                            </td>
                            <td>
                                @if($tas->status == 1)
                                <button class="btn btn-success mb-3 text-white">
                                    Completed
                                </button>
                                @else
                                <button class="btn btn-danger mb-3 text-white">
                                    Progress
                                </button>
                                @endif

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action &nbsp;
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item btn-sm" style="cursor:pointer" data-toggle="modal" data-target="#editModal{{$tas->id}}"> <i class="fas fa-edit"></i> Edit Task</a>
                                        @if(Auth::user()->role == 1)
                                        <form action="{{ url('deletetask', $tas->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this Task?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item btn-sm" style="cursor:pointer; background: red; color: white;"> <i class="fa fa-trash" aria-hidden="true"></i> Delete Task</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                @include('Admin.Components.EditModal')
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add new modal  -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="add_activity" enctype="multipart/form-data" method="post" action="{{url('savetask')}}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <h4>Add New Task</h4>
                    <div class="mt-2">
                        <label> Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="mt-2">
                        <label>Team</label>
                        <select class="form-control" name="team">
                            <option value="2">IT</option>
                            <option value="3">HR</option>
                            <option value="4">Security</option>
                            <option value="5">Customer Care</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save Task">
                </div>
            </form>
        </div>
    </div>
</div>



@endsection