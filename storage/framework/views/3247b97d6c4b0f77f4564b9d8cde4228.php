<?php if($households->count() > 0): ?>
    <?php $__currentLoopData = $households; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $household): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="household-rows" 
            data-search="<?php echo e(strtolower($household->household_name . ' ' . $household->head_surname . ' ' . $household->head_firstname . ' ' . ($household->barangay_name ?? '') . ' ' . ($household->street_name ?? '') . ' ' . ($household->house_number ?? ''))); ?>" 
            data-purok="<?php echo e($household->purok ?? ''); ?>" 
            data-priority="<?php echo e($household->priority_status ?? ''); ?>">
            
            <!-- ✅ NEW: Checkbox Column (Added as FIRST column) -->
            <td class="select-col text-center">
                <input type="checkbox" 
                       name="household_ids[]" 
                       value="<?php echo e($household->id); ?>" 
                       class="form-check-input household-checkbox"
                       style="width: 18px; height: 18px; cursor: pointer;">
            </td>

            <!-- 1. ID Column (Shifted right) -->
            <td class="text-center fw-bold text-muted"><?php echo e($household->id); ?></td>

            <!-- 2. Household Name -->
            <td>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="font-weight: 600;"><?php echo e($household->household_name); ?></span>
                </div>
            </td>

            <td>
                <div style="font-weight: 500;"><?php echo e($household->head_surname); ?>, <?php echo e($household->head_firstname); ?></div>
                <?php if($household->head_middlename): ?>
                    <div style="font-size: 0.85rem; color: #6b7280;"><?php echo e($household->head_middlename); ?></div>
                <?php endif; ?>
            </td>

            <td>
                <div style="font-size:0.85rem; color:#6b7280;">
                    <?php echo e($household->barangay_name ?? ''); ?> <?php echo e($household->street_name ?? ''); ?> <?php echo e($household->house_number ?? ''); ?>

                </div>
            </td>

            <td>
                <?php if($household->purok): ?>
                    <span style="display: inline-block; padding: 0.375rem 0.75rem; background: #f1f5f9; border-radius: 0.5rem; font-size: 0.85rem;"><?php echo e($household->purok); ?></span>
                <?php else: ?>
                    <span style="color: #94a3b8; font-style: italic;">Not assigned</span>
                <?php endif; ?>
            </td>

            <td>
                <?php
                    $priorityClass = '';
                    if($household->priority_status == 'High') $priorityClass = 'priority-high';
                    elseif($household->priority_status == 'Moderate') $priorityClass = 'priority-moderate';
                    else $priorityClass = 'priority-low';
                ?>
                <span class="priority-badge <?php echo e($priorityClass); ?>"><?php echo e($household->priority_status); ?></span>
            </td>

            <td><?php echo e($household->date_registered->format('M d, Y')); ?></td>

            <td>
                <div class="action-buttons">
                    <button class="action-btn btn-view" onclick="callHousehold(<?php echo e($household->id); ?>)" title="Call">
                        <i class="fas fa-phone"></i>
                    </button>

                    <button class="action-btn btn-view" onclick="emailHousehold(<?php echo e($household->id); ?>)" title="Email">
                        <i class="fas fa-envelope"></i>
                    </button>

                    <div class="dropdown">
                        <button class="action-btn btn-view" data-bs-toggle="dropdown" title="More">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?php echo e(route('households.edit', $household->id)); ?>">Edit</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('households.show', $household->id)); ?>">View</a></li>
                            <li><a class="dropdown-item text-danger" href="#" onclick="deleteHousehold(<?php echo e($household->id); ?>)">Delete</a></li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <tr>
        <td colspan="9" class="text-center text-muted" style="padding: 2rem;"> <!-- ✅ Changed to 9 columns -->
            <i class="fas fa-inbox" style="font-size: 2rem; color: #94a3b8; margin-bottom: 0.5rem;"></i>
            <p style="margin: 0;">No households found.</p>
        </td>
    </tr>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/BarangayPages/partials/household_rows.blade.php ENDPATH**/ ?>