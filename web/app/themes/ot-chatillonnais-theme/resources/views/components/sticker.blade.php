<div class="{{ $classes['bg'] }} p-1 rounded-2xl">
  <div class="flex flex-col items-center gap-2 px-6 py-2 rounded-xl border {{ $classes['border'] }} {{ $classes['text'] }}">

    <span>
      {!! $icon !!}
    </span>

    <span class="font-semibold text-xs">
      {{ mb_strtoupper($label) }}
    </span>

  </div>
</div>
