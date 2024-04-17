<div class="d-flex flex-wrap gap-2 justify-content-center mt-1">
@foreach ($comments as $comment)
<div class="card border-primary mb-3" style="max-width: 20rem;">
    <div class="card-header">{{ $comment->user->name }}</div>
    <div class="card-body">
      <h4 class="card-title">Primary card title</h4>
      <p class="card-text">{{ $comment->content }}</p>
    </div>
  </div>
@endforeach
</div>
