

<?php $__env->startSection('title', 'Contact Us - MDRRMO Camalaniugan'); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <h1 style="font-size: 2rem; margin-bottom: 2rem;">Contact Us</h1>
    
    <?php if(session('success')): ?>
        <div style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    
    <div class="grid-2">
        <!-- Contact Form -->
        <div style="background: white; padding: 2rem; border-radius: 0.5rem; border: 1px solid #e5e7eb;">
            <form action="<?php echo e(route('contact.submit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Name</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" placeholder="Your Name" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" placeholder="your@email.com" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Message</label>
                    <textarea name="message" rows="4" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" placeholder="How can we help?" required><?php echo e(old('message')); ?></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">Send Message</button>
            </form>
        </div>

        <!-- Contact Info -->
        <div>
            <h3 style="margin-top: 0;">MDRRMO Office</h3>
            <p style="color: #4b5563; margin-bottom: 2rem;">
                For non-emergency inquiries, please visit our office or send us a message.
            </p>
            
            <div style="margin-bottom: 1.5rem;">
                <strong style="display: block; color: #111827;">Address</strong>
                <span style="color: #6b7280;">Municipal Hall, Camalaniugan, Cagayan</span>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <strong style="display: block; color: #111827;">Phone</strong>
                <span style="color: #6b7280;">(078) 892-1234</span>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <strong style="display: block; color: #111827;">Email</strong>
                <span style="color: #6b7280;">mdrrmo@camalaniugan.gov.ph</span>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <strong style="display: block; color: #111827;">Office Hours</strong>
                <span style="color: #6b7280;">Monday - Friday: 8:00 AM - 5:00 PM</span>
            </div>
            
            <div style="background: #fee2e2; padding: 1rem; border-radius: 0.5rem; border-left: 4px solid #dc2626;">
                <p style="margin: 0; color: #991b1b; font-size: 0.9rem;">
                    <strong>Emergency Hotline:</strong> 911 (24/7)
                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/UserPages/contact.blade.php ENDPATH**/ ?>