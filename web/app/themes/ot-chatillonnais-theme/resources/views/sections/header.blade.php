<header data-header>
  {{-- Bandeau principal --}}
  <div class="flex flex-row justify-between items-center h-fit px-14 py-4 bg-bg-page">
    <a class="" href="{{ home_url('/') }}">
      <img src="{{ Vite::asset('resources/images/logos/otc.svg') }}" alt="{{ $siteName }}" class="h-28 w-auto">
    </a>

    @if ($primaryNavigation)
      <nav aria-label="{{ $primaryNavigationName }}" id="primary-navigation">
        <ul class="flex flex-row gap-12 font-serif font-bold">
          @foreach ($primaryNavigation as $item)

            @php
              $isActive = $item->active;
              $hasSubmenu = ! empty($item->children);
            @endphp

            <li class="group flex flex-col items-center {{ $isActive ? 'text-text-link' : '' }} hover:text-text-link [&.is-open]:text-text-link"
                @if ($hasSubmenu) data-submenu-trigger="{{ $item->id }}" @endif>

              <a href="{{ $item->url }}"
                 @if ($item->active) aria-current="page" @endif
                 @if ($hasSubmenu) aria-expanded="false" aria-controls="submenu-{{ $item->id }}" @endif
              >
                {{ $item->label }}
              </a>

              <img src="{{ Vite::asset('resources/images/graphics/underline-blue.png') }}" alt=""
                   class="transition-opacity {{ $isActive ? 'opacity-100' : 'opacity-0' }} group-hover:opacity-100 group-focus-within:opacity-100 group-[.is-open]:opacity-100">
            </li>
          @endforeach
        </ul>
      </nav>
    @endif
  </div>

  {{-- Bandeau secondaire (sous-menu) --}}
  @if ($primaryNavigation)
    <div class="p-11 pt-0 bg-bg-page" data-submenu-panel hidden>
      @foreach($primaryNavigation as $item)

        @if (empty($item->children))
          @continue
        @endif

        <nav aria-label="{{ $item->label }}"
             id="submenu-{{ $item->id }}"
             data-submenu="{{ $item->id }}"
             class="flex flex-row justify-center gap-20"
             hidden
        >
          @foreach($item->children as $subItem)
            <div class="flex flex-col gap-4">
              @if (!empty($subItem->label))
                <p class="font-serif font-bold mb-2">
                  {!! $subItem->label !!}
                </p>
              @endif

              <ul class="flex flex-col gap-4">
                @foreach($subItem->children as $subSubItem)
                  <li>
                    <a href="{{ $subSubItem->url }}">{{ $subSubItem->label }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
          @endforeach
        </nav>
      @endforeach
    </div>
  @endif
</header>
