<?php /* Smarty version 2.6.21, created on 2013-08-02 19:43:36
         compiled from foolter.tpl */ ?>
<?php if ($_GET['msg'] != ""): ?>
    <?php echo '
        <script type="text/javascript">//<![CDATA[
            alert(\'{$smarty.get.msg}\');
        //]]>
        </script>
    '; ?>

<?php endif; ?>