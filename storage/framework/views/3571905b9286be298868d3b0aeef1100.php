

<?php $__env->startSection('title', 'Disaster News & Updates - RESCUE.AI'); ?>

<?php $__env->startSection('content'); ?>
<!-- Full-width Red Gradient Banner -->
<div style="width: 100%; background: linear-gradient(to right, #dc2626, #b91c1c); color: white; padding: 2rem; margin: 0; border-radius: 0;">
    <h1 style="margin: 0; font-size: 2rem;">Disaster News & Updates</h1>
    <p style="margin-top: 0.5rem; font-size: 1rem;">Stay informed with the latest news and updates on disasters and emergency situations.</p>
</div>

<!-- Content Section -->
<div style="padding: 2rem;">
    <div class="grid-2">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="background: white; border: 1px solid #e5e7eb; border-radius: 0.5rem; overflow: hidden; margin-bottom: 1rem;">
                <div style="background: #1a3d7c; color: white; padding: 1rem;">
                    <h3 style="margin: 0;"><?php echo e($item['title']); ?></h3>
                </div>
                <div style="padding: 1.5rem;">
                    <p style="color: #4b5563; margin-bottom: 0.5rem;"><?php echo e($item['description']); ?></p>
                    <small style="color: #777;"><?php echo e($item['datetime']); ?></small>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/UserPages/news.blade.php ENDPATH**/ ?>