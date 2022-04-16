<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
    <i class="far fa-bell"></i>
    <span class="badge badge-warning navbar-badge">{{ ($count == 0) ? '' : $count }}</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <span class="dropdown-item dropdown-header">{{ $count }} Pemberitahuan</span>
    <div class="dropdown-divider"></div>
    @foreach($notifications as $notif)
        <a href="{{ $notif->link }}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>
            {{ \Illuminate\Support\Str::limit($notif->message, 10) }}
            <span class="float-right text-muted text-sm">{{ $notif->created_at->diffForHumans() }}</span>
        </a>
    @endforeach
    <a href="{{ route('pemberitahuan.index') }}" class="dropdown-item dropdown-footer">Lihat semua pemberitahuan</a>
</div>
</li>
