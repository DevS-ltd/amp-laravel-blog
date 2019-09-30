<div class="modal fade" id="{{ $id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        {!!  $header !!}
      </div>
      <div class="modal-body">
        {!! $body !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        {!! $confirmButton !!}
      </div>
    </div>
  </div>
</div>