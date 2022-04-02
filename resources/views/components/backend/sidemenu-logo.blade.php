@if ($logo == null)
<img src="https://ui-avatars.com/api/?size=128&name=UPP" class="brand-image img-circle" style="opacity: .8" alt="img">
@else
<img src="{{ asset('storage/' . $logo) }}" alt="logo" class="brand-image img-circle" style="opacity: .8">
@endif
