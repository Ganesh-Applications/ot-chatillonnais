@props(['item', 'stickerRotation'])

{{-- Lien de menu : sticker (liens vers une catégorie uniquement) ou lien simple --}}
<a href="{{ $item->url }}" @if ($item->active) aria-current="page" @endif>
  @if ($item->isSticker && $item->object == 'category')
    <li class="{{ $stickerRotation > 0 ? 'rotate-8' : '-rotate-4' }} list-none">
      <x-sticker :label="$item->label" :categoryId="$item->objectId"/>
    </li>
  @else
    <li class="list-none hover:text-text-link">
        {{ $item->label }}
    </li>
  @endif
</a>
