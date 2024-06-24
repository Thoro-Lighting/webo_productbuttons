{if !empty($three_dimensional) || !empty($ar_link)}
    <div class="product-buttons">
        <div class="product-buttons__wrapper">
            {if !empty($three_dimensional)}
                <div class="product-buttons__item">
                    <button type="button" data-toggle="arlity-open-3d-preview" data-id="{$three_dimensional}" class="btn btn-outline-primary btn-small product-buttons__btn">{l s='Pokaż w 3D' d='Moduels.Webodelivery.Front'}</button>
                </div>
            {/if}
            {if !empty($ar_link)}
                <div class="product-buttons__item">
                    <a href="{$ar_link}" class="btn btn-outline-primary btn-small product-buttons__btn">{l s='Pokaż w AR' d='Moduels.Webodelivery.Front'}</a>
                </div>
            {/if}
        </div>

    </div>
{/if}