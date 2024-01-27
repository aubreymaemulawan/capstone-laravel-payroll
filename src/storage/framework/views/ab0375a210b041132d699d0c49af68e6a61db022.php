<!doctype html>
<html lang="<?php  app()->getLocale(); ?>">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>Welcome to Gain Core Apps</title>
        <?php echo $__env->yieldPushContent('before-styles'); ?>
        <?php echo e(style(mix('css/dropzone.css'))); ?>

        <?php echo e(style(mix('css/core.css'))); ?>

        <?php echo e(style(mix('css/fontawesome.css'))); ?>

        <?php echo $__env->yieldPushContent('after-styles'); ?>
    </head>
    <body>
        <div id="app">
            <div class="container-scroller">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo">
                            <img src="<?php echo e(asset('images/core.png')); ?>" alt="logo"/>
                        </a>
                    </div>
                    <ul class="nav nav-scrolling">
                        <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(basename($component) !='.' && basename($component) !='..'): ?>
                                <?php if(!in_array($component,$not_completed_components)): ?>
                                    <li class="<?php echo e(($component_name ==$component) ? "nav-item active" : "nav-item"); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(url('')); ?>/doc/core/components/<?php echo e(basename($component)); ?>">
                                            <span class="icon-wrapper rounded">
                                                <app-icon name="file-plus" class="menu-icon"/>
                                            </span>
                                            <span class="menu-title" style="white-space: initial;"><?php echo e($component); ?></span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="<?php echo e(($component_name ==$component) ? "nav-item active" : "nav-item"); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(url('')); ?>/doc/core/components/<?php echo e(basename($component)); ?>">
                                            <span class="icon-wrapper">
                                                <app-icon name="file-minus" class="menu-icon"/>
                                            </span>
                                            <span class="menu-title" style="white-space: initial;"><?php echo e($component); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item text-light bg-dark py-3">
                            Total components: <code class="ml-2"><?php echo e(count($components)); ?></code><br>
                            Readme not done: <code class="ml-2"><?php echo e(count($not_completed_components)); ?></code>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid page-body-wrapper pt-0">
                    <div class="main-panel">
                        <div class="container p-3"><?php echo $content; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->yieldPushContent('before-scripts'); ?>
        <?php echo script(mix('js/manifest.js')); ?>

        <?php echo script(mix('js/vendor.js')); ?>

        <?php echo script(mix('js/core.js')); ?>

        <?php echo $__env->yieldPushContent('after-scripts'); ?>
    </body>
</html>
<?php /**PATH C:\laragon\www\payroll\src\resources\views/doc/document.blade.php ENDPATH**/ ?>