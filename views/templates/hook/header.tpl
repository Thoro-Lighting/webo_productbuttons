{if !empty($three_dimensional)}
    {literal}
        <script src="https://thoro.cloud.arlity.com/viewer/embed/js/Viewer.min.js" defer type="module"></script>

        <script>
            var ARLITY_VIEWER_PRODUCT_UUID = '{/literal}{$three_dimensional}{literal}';
            var ARLITY_VIEWER_AUTOLOAD = 'load';
        </script>
    {/literal}
{/if}

{if !empty($ar)}
    {literal}
        <script src="https://thoro.cloud.arlity.com/mobile/embed/js/Card.min.js" defer type="module"></script>
        <script>
            var ARLITY_CARD_PRODUCT_UUID = '{/literal}{$ar}{literal}';
            var ARLITY_CARD_AUTOLOAD = 'no';
        </script>
    {/literal}
{/if}