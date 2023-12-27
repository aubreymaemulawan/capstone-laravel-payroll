<!doctype html>
<html lang="<?php  app()->getLocale(); ?>">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    
    <link rel="shortcut icon" href="<?php echo e(url(settings('tenant_icon', 'app_icon'))); ?>" />
    <link rel="apple-touch-icon" href="<?php echo e(url(settings('tenant_icon', 'app_icon'))); ?>" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(url(settings('tenant_icon', 'app_icon'))); ?>" />

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(settings('tenant_name', 'app_name')); ?></title>
    <?php echo $__env->yieldPushContent('before-styles'); ?>
    <?php echo e(style(mix('css/core.css'))); ?>

    <?php echo e(style(mix('css/fontawesome.css'))); ?>

    <?php echo e(style(mix('css/dropzone.css'))); ?>

    <?php echo e(style('vendor/summernote/summernote-bs4.css')); ?>

    <?php echo $__env->yieldPushContent('after-styles'); ?>
</head>
<body>
<div id="app" class="<?php echo $__env->yieldContent('class'); ?>">
    <?php echo $__env->yieldContent('master'); ?>
</div>
<?php if(auth()->guard()->guest()): ?>
    <script>
        window.localStorage.removeItem('permissions');
    </script>
<?php endif; ?>

<?php if(auth()->guard()->check()): ?>
    <script>
        window.localStorage.setItem('permissions', JSON.stringify(
                <?php echo json_encode(array_merge(
                        resolve(\App\Repositories\Core\Auth\UserRepository::class)->getPermissionsForFrontEnd(),
                        [
                            'is_app_admin' => auth()->user()->isAppAdmin(),
                            //'is_brand_admin' => auth()->user()->isBrandAdmin(optional(brand())->id)
                        ]
                    )
                ); ?>

        ))

        window.onload = function () {
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'
            })
        }
    </script>
<?php endif; ?>

<script>
    window.localStorage.setItem('app-language', '<?php echo app()->getLocale() ?? "en"; ?>');
    window.localStorage.setItem('app-languages',
        JSON.stringify(
                <?php echo json_encode(include resource_path().DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.(session()->get('locale') ?: settings('language') ?: "en").DIRECTORY_SEPARATOR.'default.php'); ?>

            )
        );
        window.localStorage.setItem('base_url', '<?php echo request()->root(); ?>');
    window.appLanguage = window.localStorage.getItem('app-language');
</script>
<?php echo $__env->yieldPushContent('before-scripts'); ?>
<?php echo script(mix('js/manifest.js')); ?>

<?php echo script(mix('js/vendor.js')); ?>

<?php echo script(mix('js/core.js')); ?>

<?php echo script('vendor/summernote/summernote-bs4.js'); ?>

<?php echo $__env->yieldPushContent('after-scripts'); ?>
</body>
</html>

<?php /**PATH C:\laragon\www\payroll_final\src\resources\views/common/master.blade.php ENDPATH**/ ?>