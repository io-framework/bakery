<?php

namespace Bakery\Components;

use Bakery\Models\Product;
use Bakery\Repositories\Products;
use Io\Attributes\{Authenticated, Inject};
use Io\I18n\Translator;
use Io\Live\Component;

/** What is left of each product. A changed number is saved as soon as the field loses the focus. */
#[Component]
#[Authenticated]
final class StockEditor
{
    #[Inject]
    private Products $products;

    #[Inject]
    private Translator $i18n;

    private ?string $saved = null;

    /** An emptied field changes nothing. */
    public function set(Product $product, ?int $stock): void
    {
        if ($stock !== null) {
            $this->products->setStock($product->id, $stock);
            $this->saved = $this->i18n->t('Saved: {product}', ['product' => $product->name($this->i18n->locale())]);
        }
    }
}
