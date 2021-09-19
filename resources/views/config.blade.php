<script src="{{ asset('js/anyconfig.js') }}"></script>
<link href="{{ asset('css/anyconfig.css') }}" rel="stylesheet" />

<div>
    <div class="anyconfig dev-notice">
        <p>
            If you're using this package in your project, you can use the helper class <span class="php-class">\SnowSolution\AnyConfig\Helper\Init</span> and call for function <span class="php-function">renderConfigPage()</span> in your view by using dependency injection.
        </p>
    </div>
    <div class="config-page-container">
        <?php
        /**
         * @var $init \SnowSolution\AnyConfig\Helper\Init
         */
        ?>
        <?php echo $init->renderConfigPage();?>
    </div>
</div>