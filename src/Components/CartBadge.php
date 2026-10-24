<?php

namespace Bakery\Components;

use Bakery\Services\Cart;
use Io\Attributes\Inject;
use Io\I18n\Translator;
use Io\Live\Component;

/** The cart link in the header: it counts along whenever another component of the tab changes the cart. */
#[Component]
final class CartBadge
{
    #[Inject]
    private Cart $cart;

    #[Inject]
    private Translator $i18n;
}
