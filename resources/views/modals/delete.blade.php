<div class="modal" tabindex="-1" role="dialog"id="deleteModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('Delete Element')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>{{$slot}}</p>
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{action($action, ['id' => $id])}}" id="delete_form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">@lang('Delete')</button>
            </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
        </div>
      </div>
    </div>
  </div>
