{if !empty($three_dimensional_link) || !empty($ar_link)}
    <div class="product-buttons">
        <div class="product-buttons__wrapper">
            {if !empty($three_dimensional_link)}
                <div class="product-buttons__item">
                    <a href="{$three_dimensional_link}" class="btn btn-outline-primary btn-small product-buttons__btn">{l s='Pokaż w 3D' d='Modules.Weboproductbuttons.Front'}</a>
                </div>
            {/if}
            {if !empty($ar_link)}
                <div class="product-buttons__item">
                    <a href="{$ar_link}" class="btn btn-outline-primary btn-small product-buttons__btn">{l s='Pokaż w AR' d='Modules.Weboproductbuttons.Front'}</a>
                </div>
            {/if}
        </div>

    </div>
{/if}