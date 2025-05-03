@props(['employer', 'width' => '90'])

<img src="{{ asset($employer->logo) }}" width="{{ $width }}" alt="Employer url" class="rounded">
