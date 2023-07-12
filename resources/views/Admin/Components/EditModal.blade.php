<div class="modal fade" id="editModal{{$tas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" method="post" action="{{url('edittask', $tas->id)}}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <h4>Edit Jobs</h4>
                    <div class="mt-2">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $tas->title }}">
                    </div>
                    <div class="mt-2">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control" value="">{{ $tas->description }}</textarea>
                    </div>

                    <div class="mt-2">
                        <label>Team</label>
                        <select class="form-control" name="team">
                            <option value="2" {{ ($tas->team=='2')?' selected':'' }}>IT</option>
                            <option value="3" {{ ($tas->team=='3')?' selected':'' }}>HR</option>
                            <option value="4" {{ ($tas->team=='4')?' selected':'' }}>Security</option>
                            <option value="5" {{ ($tas->team=='5')?' selected':'' }}>Customer Care</option>
                        </select>
                    </div>

                    <div class="mt-2">
                        <label>Status</label>
                        <select class="form-control" name="status"> 
                            <option value="1" {{ ($tas->status=='1')?' selected':'' }}>Completed</option>
                            <option value="0" {{ ($tas->status=='0')?' selected':'' }}>In-Progress</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update Task">
                </div>
            </form>
        </div>
    </div>
</div>