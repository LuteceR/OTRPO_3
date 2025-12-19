<div class="modal fade" alt="1" id="{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $card->name }}</h5>
      </div>
      <div class="modal-body">
        {!! $card->long_desc !!}
      </div>
    </div>
  </div>
</div>