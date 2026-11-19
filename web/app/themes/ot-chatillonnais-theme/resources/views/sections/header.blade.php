<header>
  {{-- Bandeau principal --}}
  <div class="flex flex-row justify-between items-center h-fit px-14 py-4 bg-bg-page">
    <a class="" href="{{ home_url('/') }}">
      <img src="{{ Vite::asset('resources/images/logos/otc.svg') }}" alt="{{ $siteName }}" class="h-28 w-auto">
    </a>

    @if ($primaryNavigation)
      <nav aria-label="{{ $primaryNavigationName }}">
        <ul class="flex flex-row gap-12 font-serif font-bold">
          @foreach ($primaryNavigation as $item)
            @php($isActive = $item->active)
            <li class="group flex flex-col items-center {{ $isActive ? 'text-text-link' : '' }} hover:text-text-link">
              <a href="{{ $item->url }}" @if ($item->active) aria-current="page" @endif>{{ $item->label }}</a>
              <img src="{{ Vite::asset('resources/images/graphics/underline-blue.png') }}"
                   class="transition-opacity {{ $isActive ? 'opacity-100' : 'opacity-0' }} group-hover:opacity-100 group-focus-within:opacity-100">
            </li>
          @endforeach
        </ul>
      </nav>
    @endif
  </div>

  {{-- Bandeau secondaire (sous-menu) --}}
  @if ($primaryNavigation)
    <div class="p-11 pt-0 bg-bg-page">
      @foreach($primaryNavigation as $item)

        @if (empty($item->children))
          @continue
        @endif

        <nav aria-label="{{ $item->label }}"
             class="flex flex-row justify-center gap-20"
        >
          @foreach($item->children as $subItem)
            <ul class="flex flex-col gap-4">
              @if (!empty($subItem->label))
                <div class="font-serif font-bold mb-2">
                  {{ $subItem->label }}
                </div>
              @endif

              @foreach($subItem->children as $subSubItem)
                <li class="">
                  <a href="{{ $subSubItem->url }}">{{ $subSubItem->label }}</a>
                </li>
              @endforeach
            </ul>
          @endforeach
        </nav>
      @endforeach
    </div>
  @endif
  @dump($primaryNavigation)
</header>
