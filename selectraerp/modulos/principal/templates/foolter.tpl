{if $smarty.get.msg neq ""}
    {literal}
        <script type="text/javascript">//<![CDATA[
            alert('{$smarty.get.msg}');
        //]]>
        </script>
    {/literal}
{/if}