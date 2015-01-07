<div class="modal hide fade in" style="display: none;" id="upload_modal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Upload a Pic</h3>
  </div>
  <div class="modal-body">
    {{ Form::open(array('url'=>'upload', 'method'=>'POST', 'id'=>'upload_modal_form', 'enctype'=>'multipart/form-data')) }}
    {{ Form::label('photo', 'Photo') }}
    {{ Form::file('photo') }}
    {{ Form::label('description', 'Description') }}
    {{ Form::text('description', '', array('placeholder'=>'Short Description', 'id'=>'description')) }}
    {{ Form::close() }}
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Cancel</a>
    <button type="button" onclick="$('#upload_modal_form').submit();" class="btn btn-primary">Upload Pic</button>
  </div>
</div>
