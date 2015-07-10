<div id='alert-box' class="alert alert-danger alert-dismissible" role="alert" 
{!! $errors->any() ? '' : "style='display: none'" !!}
>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <b>Ops...</b>
  <ul>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    @endif
  </ul>
</div>
