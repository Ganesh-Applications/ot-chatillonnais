const $ = window.jQuery;

// Délai avant fermeture quand la souris quitte le header (évite les fermetures intempestives)
const CLOSE_DELAY = 100;

export function initHeader()
{
  const $header = $('[data-header]');
  if (!$header.length) return;

  const $triggers = $header.find('[data-submenu-trigger]');
  const $panel = $header.find('[data-submenu-panel]');
  const $submenus = $panel.find('[data-submenu]');

  if (!$triggers.length || !$panel.length) return;

  let closeTimer = null;

  // Ouvre le sous-menu `id`, ou ferme tout si `id` vaut null
  function show(id)
  {
    clearTimeout(closeTimer);

    $triggers.each(function ()
    {
      const isOpen = $(this).data('submenu-trigger') === id;

      $(this)
        .toggleClass('is-open', isOpen)
        .children('a').attr('aria-expanded', isOpen);
    });

    $submenus.each(function ()
    {
      $(this).prop('hidden', $(this).data('submenu') !== id);
    });

    $panel.prop('hidden', id === null);
  }

  //-- Ouverture : event listener sur le clic ou le hover
  $triggers.on('mouseenter click', function () {
    event.preventDefault();
    show($(this).data('submenu-trigger') ?? null);
  });

  //-- Fermeture : sortie de la souris du header (bandeau + sous-menu)
  $header
    .on('mouseenter', () => clearTimeout(closeTimer))
    .on('mouseleave', () => {
      closeTimer = setTimeout(() => show(null), CLOSE_DELAY);
    });
}
