

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
           <form action="<?php echo e(route('EvacAdmin.store')); ?>" method="POST" id="evacForm">
    <?php echo csrf_field(); ?>
                
                <!-- Document Header -->
                <div id="page1">
                    <div class="text-center mb-4 pb-3 border-bottom">
                        <h4 class="fw-bold text-dark mb-1">DEPARTMENT OF SOCIAL WELFARE AND DEVELOPMENT</h4>
                        <p class="text-muted mb-0">DISASTER ASSISTANT FAMILY ACCESS CARD (DAFAC)</p>
                        <p class="text-muted small mb-0">Official Document No. <?php echo e(strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8) ?: 'DOC' . rand(100000, 999999))); ?></p>
                    </div>

                    <!-- Location Section -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Region <span class="text-danger">*</span></label>
                            <select class="form-select <?php $__errorArgs = ['region_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="region_id" id="region_id" required>
                                <option value="">-- Select Region --</option>
                                <option value="1">REGION 1</option>
                                 <option value="2">REGION 2</option>
                                <?php $__currentLoopData = $regions ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($region->id); ?>" <?php echo e(old('region_id') == $region->id ? 'selected' : ''); ?>>
                                        <?php echo e($region->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['region_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Province/District <span class="text-danger">*</span></label>
                            <select class="form-select <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="province_id" id="province_id" required>
                                <option value="">-- Select Province --</option>
                                <option value="1">PROVINCE 1</option>
                                <option value="2">PROVINCE 2</option>
                            </select>
                            <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">City/Municipality <span class="text-danger">*</span></label>
                            <select class="form-select <?php $__errorArgs = ['city_muni_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city_muni_id" id="city_muni_id" required>
                                <option value="">-- Select City/Municipality --</option>
                                <option value="1">CITY/MUNICIPALITY 1</option>
                                <option value="2">CITY/MUNICIPALITY 2</option>
                            </select>
                            <?php $__errorArgs = ['city_muni_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Barangay <span class="text-danger">*</span></label>
                            <select class="form-select <?php $__errorArgs = ['barangay_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="barangay_id" id="barangay_id" required>
                                <option value="">-- Select Barangay --</option>
                                <option value="1">BARANGAY 1</option>
                                <option value="2">BARANGAY 2</option>
                            </select>
                            <?php $__errorArgs = ['barangay_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Personal Information Section -->
                    <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">Personal Information</h5>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Surname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="surname" value="<?php echo e(old('surname')); ?>" required>
                            <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="firstname" value="<?php echo e(old('firstname')); ?>" required>
                            <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Middle Name</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['middlename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="middlename" value="<?php echo e(old('middlename')); ?>">
                            <?php $__errorArgs = ['middlename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Gender <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="Male" id="genderMale" <?php echo e(old('gender') == 'Male' ? 'checked' : ''); ?> required>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="Female" id="genderFemale" <?php echo e(old('gender') == 'Female' ? 'checked' : ''); ?> required>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>" id="date_of_birth" required>
                            <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="age" id="age" readonly>
                        </div>
                    </div>

                    <!-- Continue with other sections... (shortened for brevity) -->

                    <!-- Family Members Table -->
                    <div class="border-top pt-3 mt-3 mb-4">
                        <h5 class="fw-bold text-dark mb-3">Family Members Information</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="familyMembersTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Family Member Name</th>
                                        <th>Relationship</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Education</th>
                                        <th>Occupation</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="familyMembersBody"></tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm" id="addFamilyMember">
                            <i class="fas fa-plus me-1"></i> Add Family Member
                        </button>
                    </div>
                    <h5 class="fw-bold text-dark mb-3 border-bottom pb-2 mt-4">Housing & Vulnerability Assessment</h5>
                <div class="row mb-4">
                    <!-- Box 1: Housing Ownership -->
                    <div class="col-md-6 mb-3">
                        <div class="card bg-light border-0 p-3">
                            <h6 class="fw-bold mb-3">Housing Ownership Status</h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="housing_status[]" value="House & lot owner" id="h1">
                                        <label class="form-check-label small" for="h1">House & lot owner</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="housing_status[]" value="Rented house & lot" id="h2">
                                        <label class="form-check-label small" for="h2">Rented house & lot</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="housing_status[]" value="House owner & lot renter" id="h3">
                                        <label class="form-check-label small" for="h3">House owner & lot renter</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="housing_status[]" value="House owner, rent-free lot with owners consent" id="h4">
                                        <label class="form-check-label small" for="h4">House owner, rent-free lot w/ consent</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="housing_status[]" value="House owner, rent-free lot without consent of the owner" id="h5">
                                        <label class="form-check-label small" for="h5">House owner, rent-free lot w/o consent</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="housing_status[]" value="Rent-free house & lot with owners consent" id="h6">
                                        <label class="form-check-label small" for="h6">Rent-free house & lot w/ consent</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="housing_status[]" value="Rent-free house & lot without owners consent" id="h7">
                                        <label class="form-check-label small" for="h7">Rent-free house & lot w/o consent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Box 2: Vulnerability & Casualty (Consolidated) -->
                    <div class="col-md-6 mb-3">
                        <div class="card bg-light border-0 p-3">
                            <h6 class="fw-bold mb-3">Vulnerability & Casualty</h6>
                            
                            <!-- Row 1: Vulnerable Groups -->
                            <div class="mb-3">
                                <label class="fw-bold small d-block mb-2">Vulnerable Groups:</label>
                                <div class="row">
                                    <div class="col-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="vulnerable_group[]" value="A-Older Person" id="v1">
                                            <label class="form-check-label small" for="v1">A-Older Person</label>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="vulnerable_group[]" value="C-PWD" id="v3">
                                            <label class="form-check-label small" for="v3">C-PWD</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2: Housing Condition -->
                            <div class="mb-3">
                                <label class="fw-bold small d-block mb-2">Housing Condition:</label>
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="housing_condition[]" value="Partially Damaged" id="hc1">
                                            <label class="form-check-label small" for="hc1">Partially Damaged</label>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="housing_condition[]" value="Totally Damaged" id="hc2">
                                            <label class="form-check-label small" for="hc2">Totally Damaged</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3: Casualty & Health -->
                            <div class="sb-1">
                                <label class="fw-bold small d-block mb-2">Casualty & Health Condition:</label>
                                <div class="row">
                                    <div class="col-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="casualty[]" value="Death" id="cas1">
                                            <label class="form-check-label small" for="cas1">Death</label>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="casualty[]" value="Injured" id="cas2">
                                            <label class="form-check-label small" for="cas2">Injured</label>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="casualty[]" value="Missing" id="cas3">
                                            <label class="form-check-label small" for="cas3">Missing</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="health_condition[]" value="With Illness" id="hc4">
                                            <label class="form-check-label small" for="hc4">With Illness</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row mb-0">
                    <!-- Box 1: ID Picture -->
                    <div class="col-md-3 mb-0">
                        <div class="card bg-light border-0 p-4 text-center h-100">
                            <h6 class="fw-bold mb-4 text-primary">
                                <i class="fas fa-id-card me-2"></i>ID Picture (2x2 inches)
                            </h6>
                            <div class="photo-frame mb-1">
                                <div class="photo-upload-area" id="photoUploadArea">
                                    <i class="fas fa-camera fa-2x text-muted mb-2"></i>
            
                                </div>
                                
                            </div>
                            <small class="text-muted">2x2 inches (51x51mm)</small>
                        </div>
                    </div>

                    <div class="col-md-9 mb-0">
                        <div class="card bg-light border-0 p-4">
                            <div class="row g-3">
                                <!-- Row 1: Family Head Signature -->
                                <div class="col-6">
                                    <div class="border-bottom pb-2 mb-1 text-center">
                                        <hr class="border-dark mt-4 mb-0">
                                        <label class="form-label fw-bold small text-dark mb-1 d-block">
                                            Signature/Thumbmark of Family Head
                                        </label>
                                        
                                    </div>
                                </div>

                                <!-- Row 2: Date Registered -->
                                <div class="col-6">
                                    <div class="border-bottom pb-2 mb-3 text-center">
                                         <hr class="border-dark mt-4 mb-0">
                                        <label class="form-label fw-bold small text-dark mb-1 d-block">
                                            Name/Signature of Brgy. Captain
</label>
                                       
                                    </div>
                                </div>

                                <!-- Row 3: Brgy Captain -->
                                <div class="col-6">
                                    <div class="border-bottom pb-2 mb-3 text-center">
                                         
                                        <label class="form-label fw-bold small text-dark mb-1 d-block">
                                            Date Registered
                                        </label>
                                        <input type="date" class="form-control form-control-sm mt-1" 
                                               name="date_registered" id="date_registered" required>
                                      
                                    </div>
                                </div>

                                <!-- Row 4: LSWDo -->
                                <div class="col-6 text-center">
                                    <hr class="border-dark mt-3 mb-0">
                                    <label class="form-label fw-bold small text-dark mb-1 d-block">
                                        Name/Signature of LSWDO
                                    </label>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

  <!-- Page Navigation -->
                    <div class="border-top pt-3 mt-3">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <button type="button" class="btn btn-secondary w-100" id="prevBtn" disabled>
                                    <i class="fas fa-arrow-left me-2"></i> Previous
                                </button>
                            </div>
                            <div class="col-4 text-center">
                                <span class="badge bg-primary">Page <span id="currentPage">1</span> of 2</span>
                            </div>
                            <div class="col-4 text-end">
                                <button type="button" class="btn btn-primary w-100" id="nextBtn">
                                    Next <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                               
                            </div>
                        </div>
                    </div>
                </div>
 
    
              <!-- Page 2: Complete Assistance Record -->
<div id="page2" class="d-none text-center">
     <div class="text-center mb-4 pb-3 border-bottom">
                        <h4 class="fw-bold text-dark mb-1">FAMILY ASSISTANCE RECORD</h4>
                    </div>  
    <div class="table-responsive">
    <table class="table table-bordered" id="assistanceTable">
       <thead class="table-light">
    <tr>
        <th rowspan="2" style="width: 15%; text-align: center;">Date</th>
        <th rowspan="2" style="width: 25%; text-align: center;">Name of Receiving Family Member</th>
        <th colspan="4" style="text-align: center;">Assistance Provided during</th>
        <th rowspan="2" style="width: 15%; text-align: center;">Recipient's Signature/Thumbmark</th>
    </tr>
    <tr>
        <th style="width: 15%;">Kind/Type</th>
        <th style="width: 10%;">Qty.</th>
        <th style="width: 10%;">Cost</th>
        <th style="width: 10%;">Provider</th>
    </tr>
</thead>
        <tbody id="assistanceBody">
            <!-- Dynamic rows will be added here -->
        </tbody>
    </table>
</div>

<!-- Add Row Button -->
<button type="button" class="btn btn-outline-primary btn-sm mb-4" id="addAssistanceRow">
    <i class="fas fa-plus me-1"></i> Add Assistance Record
</button>
    <div class="border-top pt-4 mt-4">
        <div class="row align-items-center">
            <div class="col-6">
                <button type="button" class="btn btn-secondary w-100 w-md-auto" id="prevBtnPage2">
                    <i class="fas fa-arrow-left me-2"></i> Previous
                </button>
            </div>
            <div class="col-6 text-end">
                <button type="submit" class="btn btn-success w-100 w-md-auto" id="submitBtn">
                    <i class="fas fa-check me-2"></i> Submit Form
                </button>
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-4 pt-3 border-top">
                <p class="text-muted small mb-0">This document is an official record of the Barangay Administration System.</p>
                <p class="text-muted small mb-0">For verification purposes only.</p>
            </div>
        </form>




<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentPage = 1;
    const totalPages = 2;
    let assistanceCounter = 0;
    let familyCounter = 0;
    
    // Page elements
   const page1 = document.getElementById('page1');
    const page2 = document.getElementById('page2');
    const prevBtnPage1 = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtnPage2 = document.getElementById('prevBtnPage2');
    const submitBtn = document.getElementById('submitBtn');
    const currentPageSpan = document.getElementById('currentPage');
    const evacForm = document.getElementById('evacForm');

    // Update page navigation
    function updatePageNavigation() {
        if (currentPage === 1) {
            page1.classList.remove('d-none');
            page2.classList.add('d-none');
            prevBtnPage1.disabled = true;
            prevBtnPage2.disabled = true;
        } else {
            page1.classList.add('d-none');
            page2.classList.remove('d-none');
            prevBtnPage1.disabled = true;
            prevBtnPage2.disabled = false;
        }
        
        currentPageSpan.textContent = currentPage;
        
        // Page 1: Show Next, hide Submit
        if (currentPage === 1) {
            nextBtn.classList.remove('d-none');
            submitBtn.classList.add('d-none');
        } 
        // Page 2: Hide Next, show Submit
        else {
            nextBtn.classList.add('d-none');
            submitBtn.classList.remove('d-none');
        }
    }

    // NEXT BUTTON (Page 1 → Page 2)
    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Validate Page 1
            const requiredFields = page1.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(function(field) {
                if (field.type === 'radio') {
                    const name = field.name;
                    const checked = page1.querySelector(`input[name="${name}"]:checked`);
                    if (!checked) {
                        isValid = false;
                        field.parentElement.classList.add('is-invalid');
                    }
                } else if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (isValid) {
                currentPage = 2;
                updatePageNavigation();
            }
        });
    }

    // PREVIOUS BUTTON (Page 2 → Page 1) - NOW FULLY FUNCTIONAL
    function goToPreviousPage() {
        if (currentPage > 1) {
            currentPage = 1;
            updatePageNavigation();
        }
    }

    if (prevBtnPage1) {
        prevBtnPage1.addEventListener('click', function(e) {
            e.preventDefault();
            goToPreviousPage();
        });
    }

    if (prevBtnPage2) {
        prevBtnPage2.addEventListener('click', function(e) {
            e.preventDefault();
            goToPreviousPage();
        });
    }

    // SUBMIT BUTTON
    if (submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Final validation for Page 2
            const assistanceRows = document.querySelectorAll('#assistanceBody tr');
            if (assistanceRows.length === 0) {
                alert('Please add at least one assistance record.');
                return;
            }
            
            // Validate all assistance rows
            let hasValidRow = false;
            assistanceRows.forEach(row => {
                const inputs = row.querySelectorAll('input[required]');
                let rowValid = true;
                inputs.forEach(input => {
                    if (!input.value.trim()) rowValid = false;
                });
                if (rowValid) hasValidRow = true;
            });
            
            if (!hasValidRow) {
                alert('Please complete at least one assistance record.');
                return;
            }
            
            // Submit form
            evacForm.submit();
        });
    }

    // AGE CALCULATION
    const dateOfBirth = document.getElementById('date_of_birth');
    if (dateOfBirth) {
        dateOfBirth.addEventListener('change', function() {
            const dob = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        });
    }

    // FAMILY MEMBERS TABLE
    const addFamilyBtn = document.getElementById('addFamilyMember');
    if (addFamilyBtn) {
        addFamilyBtn.addEventListener('click', function() {
            const tbody = document.getElementById('familyMembersBody');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="text" class="form-control form-control-sm" name="family_members[${familyCounter}][name]" placeholder="Full Name" required></td>
                <td>
                    <select class="form-select form-select-sm" name="family_members[${familyCounter}][relationship]" required>
                        <option value="Spouse">Spouse</option>
                        <option value="Child">Child</option>
                        <option value="Parent">Parent</option>
                        <option value="Sibling">Sibling</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
                <td><input type="number" class="form-control form-control-sm" name="family_members[${familyCounter}][age]" min="0" placeholder="Age" required></td>
                <td>
                    <select class="form-select form-select-sm" name="family_members[${familyCounter}][gender]" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
                <td><input type="text" class="form-control form-control-sm" name="family_members[${familyCounter}][education]" placeholder="Education"></td>
                <td><input type="text" class="form-control form-control-sm" name="family_members[${familyCounter}][occupation]" placeholder="Occupation"></td>
                <td><input type="text" class="form-control form-control-sm" name="family_members[${familyCounter}][remarks]" placeholder="Remarks"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-row">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(row);
            
            // Remove row handler
            row.querySelector('.remove-row').addEventListener('click', function() {
                row.remove();
            });
            familyCounter++;
        });
    }

    // ASSISTANCE RECORDS TABLE (Page 2)
    const addAssistanceBtn = document.getElementById('addAssistanceRow');
    if (addAssistanceBtn) {
        addAssistanceBtn.addEventListener('click', function() {
            const tbody = document.getElementById('assistanceBody');
            const row = document.createElement('tr');
             row.innerHTML = `
    <td><input type="date" name="assistance[${assistanceCounter}][date]" required></td>
    <td><input type="text" name="assistance[${assistanceCounter}][family_member]" required></td>
    <td><input type="text" name="assistance[${assistanceCounter}][type]" required></td>
    <td><input type="number" name="assistance[${assistanceCounter}][quantity]" required></td>
    <td><input type="number" name="assistance[${assistanceCounter}][cost]" required></td>
    <td><input type="text" name="assistance[${assistanceCounter}][provider]" required></td>
    <td><input type="text" name="assistance[${assistanceCounter}][signature]" required></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-row">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(row);
            
            row.querySelector('.remove-row').addEventListener('click', function() {
                row.remove();
            });
            assistanceCounter++;
        });
    }

    // GLOBAL REMOVE HANDLER
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-row')) {
            e.target.closest('tr').remove();
        }
    });

    // INITIALIZE
    updatePageNavigation();
    console.log('Form initialized successfully!');
});
</script>

<style>
 .card {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .card-body {
        padding: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #1b1b18;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-control, .form-select {
        border-radius: 6px;
        border: 1px solid #d1d5db;
        padding: 12px 14px;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #1976d2;
        box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.15);
        outline: none;
    }

    .btn {
        border-radius: 50px;
        padding: 12px 24px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }

    .btn-outline-primary {
        border-color: #1976d2;
        color: #1976d2;
    }

    .btn-outline-primary:hover {
        background-color: #1976d2;
        border-color: #1976d2;
        color: #fff;
    }

    .table {
        font-size: 0.9rem;
    }

    .table thead th {
        background-color: #f8f9fa;
        font-weight: 600;
        border-color: #dee2e6;
    }

    .table tbody td {
        vertical-align: middle;
    }

    .border-bottom {
        border-bottom: 2px solid #e0e0e0 !important;
    }

    .border-top {
        border-top: 2px solid #e0e0e0 !important;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }
    }

</style>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/EvacPages/DAFACForm.blade.php ENDPATH**/ ?>