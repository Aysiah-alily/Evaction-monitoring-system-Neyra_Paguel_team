

<?php $__env->startSection('title', 'Alerts - MDRRMO Camalaniugan'); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <h1 style="font-size: 2rem; margin-bottom: 2rem;">Current Alerts & Status</h1>

    <!-- Active Alert Banner -->
    <div style="background: #fee2e2; border: 1px solid #dc2626; color: #991b1b; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem; display: flex; align-items: center; gap: 1rem;">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #dc2626;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
        <div>
            <h3 style="margin: 0; color: #991b1b;">Tropical Cyclone Warning Signal No. 1</h3>
            <p style="margin: 0.25rem 0 0; font-size: 0.9rem;">Issued: Today, 8:00 AM | Valid until: Tomorrow, 8:00 AM</p>
        </div>
    </div>

    <!-- Alert List -->
    <div style="display: grid; gap: 1rem;">
        <!-- Alert Item 1 -->
        <div style="background: white; border: 1px solid #e5e7eb; padding: 1.5rem; border-radius: 0.5rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h4 style="margin: 0 0 0.5rem;">Heavy Rainfall Warning</h4>
                <p style="color: #6b7280; margin: 0; font-size: 0.9rem;">Last updated: 2 days ago</p>
            </div>
            <span style="background: #fef3c7; color: #92400e; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600;">Warning</span>
        </div>

        <!-- Alert Item 2 -->
        <div style="background: white; border: 1px solid #e5e7eb; padding: 1.5rem; border-radius: 0.5rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h4 style="margin: 0 0 0.5rem;">Evacuation Center Open: Barangay Hall</h4>
                <p style="color: #6b7280; margin: 0; font-size: 0.9rem;">Last updated: 5 days ago</p>
            </div>
            <span style="background: #dcfce7; color: #166534; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600;">Info</span>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/UserPages/alerts.blade.php ENDPATH**/ ?>