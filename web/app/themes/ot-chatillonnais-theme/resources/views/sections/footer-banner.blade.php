{{-- Bandeau affiché au-dessus du footer sur toutes les pages (options ACF "Bandeau footer") --}}
<section class="px-4 pb-4" @if ($title) aria-label="{{ $title }}" @endif>
  <div class="relative overflow-hidden flex flex-col lg:flex-row justify-between items-center lg:items-start gap-12 px-8 md:px-20 xl:px-44 pt-24 pb-32 text-text-on-image-white">

    {{-- Image de fond + voile --}}
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
      @if ($image)
        {!! wp_get_attachment_image($image, 'full', false, ['class' => 'size-full object-cover', 'alt' => '']) !!}
      @endif
      <div class="absolute inset-0 bg-overlay-image-soft"></div>
    </div>

    {{-- Réseaux sociaux --}}
    <div class="relative flex flex-col gap-2 w-full lg:flex-1 lg:max-w-120">
      @if ($socialsTitle)
        <p class="text-xl font-light uppercase">{{ $socialsTitle }}</p>
      @endif

      @if ($socials)
        <ul class="flex items-center gap-2">
          @foreach ($socials as $social)
            <li>
              <a href="{{ $social['url'] }}" target="_blank" rel="noopener"
                 class="flex items-center justify-center size-10 p-2 rounded-full bg-badge-neutral-soft-bg">
                {!! wp_get_attachment_image($social['icon'], 'thumbnail', false, ['class' => 'h-full w-full object-contain', 'alt' => '']) !!}
              </a>
            </li>
          @endforeach
        </ul>
      @endif
    </div>

    {{-- Newsletter --}}
    <div class="relative flex flex-col gap-2 w-full lg:flex-1 lg:max-w-120">
      @if ($newsletterTitle)
        <p class="text-xl font-light uppercase">{{ $newsletterTitle }}</p>
      @endif

      <form action="{{ $newsletterAction }}" method="post" data-newsletter-form
            class="flex items-center justify-between overflow-hidden pl-7 rounded-3xl bg-field-neutral-reverse-bg">

        {{-- Honeypot --}}
        <div aria-hidden="true" class="absolute -left-[9999px]">
          <input name="login" type="text" autocomplete="new-login" tabindex="-1" />
          <input name="password" type="password" autocomplete="new-password" tabindex="-1" />
        </div>

        @csrf
        <label for="footer-banner-newsletter-email" class="sr-only">{{ __('Adresse e-mail', 'ot-chatillonnais') }}</label>

        <input id="footer-banner-newsletter-email" type="email" name="email" required autocomplete="email"
               placeholder="{{ __('E-mail', 'ot-chatillonnais') }}"
               class="flex-1 bg-transparent font-bold text-text placeholder:text-field-neutral-reverse-text focus:outline-none">

        <button type="submit"
                class="flex shrink-0 items-center justify-center size-10 p-2.5 rounded-full bg-field-neutral-reverse-icon-bg cursor-pointer">
          <img src="{{ Vite::asset('resources/images/icons/arrow-up-right.svg') }}" alt="" width="28" height="28">
          <span class="sr-only">{{ __('S’abonner', 'ot-chatillonnais') }}</span>
        </button>
      </form>
    </div>

    {{-- Accroche --}}
    <div class="relative flex flex-col items-center lg:items-end w-full lg:flex-1 lg:max-w-120 text-center lg:text-right">
      @if ($tagline)
        <p class="text-xl font-light uppercase">{{ $tagline }}</p>
      @endif
      @if ($title)
        <p class="font-serif font-bold text-[40px]">{{ $title }}</p>
      @endif
    </div>

  </div>
</section>
