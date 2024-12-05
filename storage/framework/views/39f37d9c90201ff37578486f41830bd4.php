<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <?php
    use Carbon\Carbon;

    $currentHour = Carbon::now()->format('H');

    if ($currentHour < 12) {
        $greeting = 'Good Morning';
    } elseif ($currentHour < 18) {
        $greeting = 'Good Afternoon';
    } else {
        $greeting = 'Good Evening';
    }
    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (Auth::user()->is_admin == 'staff' || Auth::user()->is_admin == 'organization') {
    // Fetch permissions for 'staff' from the database as an array
    $permission = DB::table('role_permissions')
        ->where('role_name', Auth::user()->role_name)
        ->first();

    // Check if permissions are found
    if ($permission) {
        // Convert the object to an associative array
        $permissions = (array) $permission;
    } else {
        // Create an array to hold the modified permissions
        $permissions = [];

        // List of modules and permission suffixes
        $modules = [
            'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
            'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
            'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
            'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
            'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
            'achievement_type'
        ];
        $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

        // Set permissions for the allowed actions to 0 (default)
        foreach ($modules as $module) {
            foreach ($permissionSuffixes as $suffix) {
                $permissions["{$module}_{$suffix}"] = 1;
            }
        }
    }
} else if (Auth::user()->is_admin == 'admin') {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 2 (admin level)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 2;
        }
    }
} else {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 0 (default)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 1;
        }
    }
}


?>



<?php
    // Fetch the authenticated user's details with department and designation names
 $user = DB::table('users')
    ->join('departments', 'users.depart_id', '=', 'departments.id')
    ->join('designations', 'users.design_id', '=', 'designations.id')
    ->join('roles', 'users.role_name', '=', 'roles.id')
    ->select('users.*', 'departments.name', 'designations.designation_name', 'users.role_name as urole_name', 'roles.*') // Fixed missing quote
    ->where('users.id', Auth::id())
    ->first();
?>
<?php if($user): ?>
    <h4 class="fs-16 mb-1">
        <?php echo e($greeting); ?>, <?php echo e(strtoupper($user->first_name)); ?> - <?php echo e(strtoupper($user->name)); ?> - <?php echo e(strtoupper($user->designation_name)); ?>

    </h4>
<?php endif; ?>
                </div>
                        <!--<div class="mt-3 mt-lg-0">-->
                        <!--    <form action="javascript:void(0);">-->
                        <!--        <div class="row g-3 mb-0 align-items-center">-->
                        <!--            <div class="col-sm-auto">-->
                        <!--                <div class="input-group">-->
                        <!--                    <input type="text" class="form-control border-0 dash-filter-picker shadow" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-deafult-date="01 Jan 2022 to 31 Jan 2022">-->
                        <!--                    <div class="input-group-text bg-primary border-primary text-white">-->
                        <!--                        <i class="ri-calendar-2-line"></i>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                              
                        <!--        </div>-->
                                <!--end row-->
                        <!--    </form>-->
                        <!--</div>-->
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            
            
    <?php
    if (Auth::user()->is_admin === 'admin') {
        $leaves = DB::select('SELECT * FROM leaves');
    } else {
        $userId = auth()->id();  

        $leaves = DB::table('leaves')
            ->where('leaves.state', Auth::user()->state)
            ->where('leaves.district', Auth::user()->district)
            ->where('leaves.taluka', Auth::user()->taluka)
            ->where('leaves.org_id', Auth::user()->org_id)
            ->where('leaves.depart_id', Auth::user()->depart_id)
            ->where('leaves.design_id', Auth::user()->design_id)
            ->get();
    }

  
    $pendingCount = 0;
    $approvedCount = 0;
    $rejectCount = 0;

    $pendingCountPerMonth = array_fill(0, 12, 0);
    $approvedCountPerMonth = array_fill(0, 12, 0);
    $rejectCountPerMonth = array_fill(0, 12, 0);
    foreach ($leaves as $leave) {
        $monthIndex = date('n', strtotime($leave->created_at)) - 1; 
if (Auth::user()->is_admin === 'admin' 
    ? strtolower($leave->status) === 'pending' 
    : (strtolower($leave->status) === 'pending' && strtolower($user->role_name) === 'clerk')
) {
    $pendingCount++;
    $pendingCountPerMonth[$monthIndex]++;
} elseif (
    Auth::user()->is_admin === 'admin' 
    ? strtolower($leave->status) === 'approved_clerk' 
    : (strtolower($leave->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
) {
    $pendingCount++;
    $pendingCountPerMonth[$monthIndex]++;
}

elseif (
    Auth::user()->is_admin === 'admin' 
    ? (strtolower($leave->status) === 'approved')
    : (strtolower($leave->status) === 'approved' && strtolower($user->role_name) === 'hod')
) { 
    $approvedCount++;
    $approvedCountPerMonth[$monthIndex]++;
}

elseif (
    Auth::user()->is_admin === 'admin' 
    ? (strtolower($leave->status) === 'approved')
    : ((strtolower($leave->status) === 'approved' ||  strtolower($leave->status) === 'approved_clerk' ) &&  strtolower($user->role_name) === 'clerk')
) { 
    $approvedCount++;
    $approvedCountPerMonth[$monthIndex]++;
}


if (strtolower($leave->status) === 'rejected') { 
    $rejectCount++;
    $rejectCountPerMonth[$monthIndex]++;
}

    }
?>

<?php
    if (Auth::user()->is_admin === 'admin') {
$users = DB::select('SELECT * FROM users WHERE is_admin = "employee"');
    } else {
        $userId = auth()->id();  

        $users = DB::table('users')
            ->where('users.state', Auth::user()->state)
            ->where('users.district', Auth::user()->district)
            ->where('users.taluka', Auth::user()->taluka)
            ->where('users.org_id', Auth::user()->org_id)
            ->where('users.depart_id', Auth::user()->depart_id)
            ->where('users.design_id', Auth::user()->design_id)
                ->where('users.is_admin', 'employee')  

            ->get();
            
    }

    $userPendingCount = 0;
    $userApprovedCount = 0;
    $userRejectedCount = 0;

    $userPendingCountPerMonth = array_fill(0, 12, 0);
    $userApprovedCountPerMonth = array_fill(0, 12, 0);
    $userRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($users as $userss) {

if (Auth::user()->is_admin === 'admin' 
    ? strtolower($userss->status) === 'pending' 
    : (strtolower($userss->status) === 'pending' && strtolower($user->role_name) === 'clerk')
) {
    $userPendingCount++;
    $userPendingCountPerMonth[$monthIndex]++;
}        
        
     elseif (
    Auth::user()->is_admin === 'admin' 
    ? strtolower($userss->status) === 'approved_clerk' 
    : (strtolower($userss->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
) {
    $userPendingCount++;
    $userPendingCountPerMonth[$monthIndex]++;
}




elseif (
    Auth::user()->is_admin === 'admin' 
    ? (strtolower($userss->status) === 'approved')
    : (strtolower($userss->status) === 'approved' && strtolower($user->role_name) === 'hod')
) { 
    $userApprovedCount++;
    $userApprovedCountPerMonth[$monthIndex]++;
}

elseif (
    Auth::user()->is_admin === 'admin' 
    ? (strtolower($userss->status) === 'approved')
    : ((strtolower($userss->status) === 'approved' ||  strtolower($userss->status) === 'approved_clerk' ) &&  strtolower($user->role_name) === 'clerk')
) { 
    $userApprovedCount++;
    $userApprovedCountPerMonth[$monthIndex]++;
}



if (strtolower($userss->status) === 'rejected') { 
            $userRejectedCount++;
            $userRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>


<?php
    if (Auth::user()->is_admin === 'admin') {
        $userDocuments = DB::table('user_documents')
            ->select('*')
            ->get()
            ->groupBy('user_id');
    } else {
        $userId = auth()->id();  

        $userDocuments = DB::table('user_documents')
            ->where('user_documents.state', Auth::user()->state)
            ->where('user_documents.district', Auth::user()->district)
            ->where('user_documents.taluka', Auth::user()->taluka)
            ->where('user_documents.org_id', Auth::user()->org_id)
            ->where('user_documents.depart_id', Auth::user()->depart_id)
            ->where('user_documents.design_id', Auth::user()->design_id)
            ->get()
            ->groupBy('user_id');
    }


    $documentPendingCount = 0;
    $documentApprovedCount = 0;
    $documentRejectedCount = 0;

    $documentPendingCountPerMonth = array_fill(0, 12, 0);
    $documentApprovedCountPerMonth = array_fill(0, 12, 0);
    $documentRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($userDocuments as $userId => $documents) {
        $document = $documents->first();

        if (Auth::user()->is_admin === 'admin' 
            ? strtolower($document->status) === 'pending' 
            : (strtolower($document->status) === 'pending' && strtolower($user->role_name) === 'clerk')
        ) {
            $documentPendingCount++;
            $documentPendingCountPerMonth[$monthIndex]++;
        } elseif (
            Auth::user()->is_admin === 'admin' 
            ? strtolower($document->status) === 'approved_clerk' 
            : (strtolower($document->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
        ) {
            $documentPendingCount++;
            $documentPendingCountPerMonth[$monthIndex]++;
        } elseif (
            Auth::user()->is_admin === 'admin' 
            ? strtolower($document->status) === 'approved'
            : (strtolower($document->status) === 'approved' && strtolower($user->role_name) === 'hod')
        ) { 
            $documentApprovedCount++;
            $documentApprovedCountPerMonth[$monthIndex]++;
        } elseif (
            Auth::user()->is_admin === 'admin' 
            ? strtolower($document->status) === 'approved'
            : ((strtolower($document->status) === 'approved' || strtolower($document->status) === 'approved_clerk') && strtolower($user->role_name) === 'clerk')
        ) { 
            $documentApprovedCount++;
            $documentApprovedCountPerMonth[$monthIndex]++;
        }

        if (strtolower($document->status) === 'rejected') {
            $documentRejectedCount++;
            $documentRejectedCountPerMonth[$monthIndex]++;
        }
    }
    
    
?>

<?php
    if (Auth::user()->is_admin === 'admin') {
        $userAchievements = DB::select('SELECT * FROM achivements');
    } else {
        $userId = auth()->id();  

        $userAchievements = DB::table('achivements')
            ->where('achivements.state', Auth::user()->state)
            ->where('achivements.district', Auth::user()->district)
            ->where('achivements.taluka', Auth::user()->taluka)
            ->where('achivements.org_id', Auth::user()->org_id)
            ->where('achivements.depart_id', Auth::user()->depart_id)
            ->where('achivements.design_id', Auth::user()->design_id)
            ->get();
    }

    $achievementPendingCount = 0;
    $achievementApprovedCount = 0;
    $achievementRejectedCount = 0;

    $achievementPendingCountPerMonth = array_fill(0, 12, 0);
    $achievementApprovedCountPerMonth = array_fill(0, 12, 0);
    $achievementRejectedCountPerMonth = array_fill(0, 12, 0);


    foreach ($userAchievements as $achievement) {
        $monthIndex = date('n', strtotime($achievement->created_at)) - 1; // Get 0-based month index (Jan = 0, Dec = 11)

     if (Auth::user()->is_admin === 'admin' 
    ? strtolower($achievement->status) === 'pending' 
    : (strtolower($achievement->status) === 'pending' && strtolower($user->role_name) === 'clerk')
) {
    $achievementPendingCount++;
    $achievementPendingCountPerMonth[$monthIndex]++;
} elseif (
    Auth::user()->is_admin === 'admin' 
    ? strtolower($achievement->status) === 'approved_clerk' 
    : (strtolower($achievement->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
) {
    $achievementPendingCount++;
    $achievementPendingCountPerMonth[$monthIndex]++;
}

elseif (
    Auth::user()->is_admin === 'admin' 
    ? (strtolower($achievement->status) === 'approved')
    : (strtolower($achievement->status) === 'approved' && strtolower($user->role_name) === 'hod')
) { 
    $achievementApprovedCount++;
    $achievementApprovedCountPerMonth[$monthIndex]++;
}

elseif (
    Auth::user()->is_admin === 'admin' 
    ? (strtolower($achievement->status) === 'approved')
    : ((strtolower($achievement->status) === 'approved' ||  strtolower($achievement->status) === 'approved_clerk' ) &&  strtolower($user->role_name) === 'clerk')
) { 
    $achievementApprovedCount++;
    $achievementApprovedCountPerMonth[$monthIndex]++;
}
   if (strtolower($achievement->status) === 'rejected') {
            $achievementRejectedCount++;
            $achievementRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>


<?php
    if (Auth::user()->is_admin === 'admin') {
        $userAudits = DB::select('SELECT * FROM audits');
    } else {
        $userId = auth()->id();  

        $userAudits = DB::table('audits')
            ->where('audits.state', Auth::user()->state)
            ->where('audits.district', Auth::user()->district)
            ->where('audits.taluka', Auth::user()->taluka)
            ->where('audits.org_id', Auth::user()->org_id)
            ->where('audits.depart_id', Auth::user()->depart_id)
            ->where('audits.design_id', Auth::user()->design_id)
            ->get();
    }

    $auditPendingCount = 0;
    $auditApprovedCount = 0;
    $auditRejectedCount = 0;

    $auditPendingCountPerMonth = array_fill(0, 12, 0);
    $auditApprovedCountPerMonth = array_fill(0, 12, 0);
    $auditRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($userAudits as $audit) {
        $monthIndex = date('n', strtotime($audit->created_at)) - 1; // Get 0-based month index (Jan = 0, Dec = 11)

        // Pending status conditions
        if (Auth::user()->is_admin === 'admin' 
            ? strtolower($audit->status) === 'pending' 
            : (strtolower($audit->status) === 'pending' && strtolower($user->role_name) === 'clerk')
        ) {
            $auditPendingCount++;
            $auditPendingCountPerMonth[$monthIndex]++;
        }

        // Approved Clerk status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($audit->status) === 'approved_clerk' 
            : (strtolower($audit->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
        ) {
            $auditPendingCount++;
            $auditPendingCountPerMonth[$monthIndex]++;
        }

        // Approved status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($audit->status) === 'approved' 
            : (strtolower($audit->status) === 'approved' && strtolower($user->role_name) === 'hod')
        ) {
            $auditApprovedCount++;
            $auditApprovedCountPerMonth[$monthIndex]++;
        }

        // Approved or Approved Clerk condition for Clerk role
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($audit->status) === 'approved' 
            : ((strtolower($audit->status) === 'approved' || strtolower($audit->status) === 'approved_clerk') && strtolower($user->role_name) === 'clerk')
        ) {
            $auditApprovedCount++;
            $auditApprovedCountPerMonth[$monthIndex]++;
        }

        // Rejected status condition
        if (strtolower($audit->status) === 'rejected') {
            $auditRejectedCount++;
            $auditRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>

<?php
    if (Auth::user()->is_admin === 'admin') {
        $salaries = DB::select('SELECT * FROM salaries');
    } else {
        $userId = auth()->id();  

        $salaries = DB::table('salaries')
            ->where('salaries.state', Auth::user()->state)
            ->where('salaries.district', Auth::user()->district)
            ->where('salaries.taluka', Auth::user()->taluka)
            ->where('salaries.org_id', Auth::user()->org_id)
            ->where('salaries.depart_id', Auth::user()->depart_id)
            ->where('salaries.design_id', Auth::user()->design_id)
            ->get();
    }

    $salaryPendingCount = 0;
    $salaryApprovedCount = 0;
    $salaryRejectedCount = 0;

    $salaryPendingCountPerMonth = array_fill(0, 12, 0);
    $salaryApprovedCountPerMonth = array_fill(0, 12, 0);
    $salaryRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($salaries as $salary) {
        $monthIndex = date('n', strtotime($salary->created_at)) - 1; // Get 0-based month index (Jan = 0, Dec = 11)

        // Pending status conditions
        if (Auth::user()->is_admin === 'admin' 
            ? strtolower($salary->status) === 'pending' 
            : (strtolower($salary->status) === 'pending' && strtolower($user->role_name) === 'clerk')
        ) {
            $salaryPendingCount++;
            $salaryPendingCountPerMonth[$monthIndex]++;
        }

        // Approved Clerk status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($salary->status) === 'approved_clerk' 
            : (strtolower($salary->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
        ) {
            $salaryPendingCount++;
            $salaryPendingCountPerMonth[$monthIndex]++;
        }

        // Approved status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($salary->status) === 'approved' 
            : (strtolower($salary->status) === 'approved' && strtolower($user->role_name) === 'hod')
        ) {
            $salaryApprovedCount++;
            $salaryApprovedCountPerMonth[$monthIndex]++;
        }

        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($salary->status) === 'approved' 
            : ((strtolower($salary->status) === 'approved' || strtolower($salary->status) === 'approved_clerk') && strtolower($user->role_name) === 'clerk')
        ) {
            $salaryApprovedCount++;
            $salaryApprovedCountPerMonth[$monthIndex]++;
        }

        if (strtolower($salary->status) === 'rejected') {
            $salaryRejectedCount++;
            $salaryRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>

<?php
    if (Auth::user()->is_admin === 'admin') {
        $nominations = DB::select('SELECT * FROM nominations');
    } else {
        $userId = auth()->id();  

        $nominations = DB::table('nominations')
            ->where('nominations.state', Auth::user()->state)
            ->where('nominations.district', Auth::user()->district)
            ->where('nominations.taluka', Auth::user()->taluka)
            ->where('nominations.org_id', Auth::user()->org_id)
            ->where('nominations.depart_id', Auth::user()->depart_id)
            ->where('nominations.design_id', Auth::user()->design_id)
            ->get();
    }

    $nominationPendingCount = 0;
    $nominationApprovedCount = 0;
    $nominationRejectedCount = 0;

    $nominationPendingCountPerMonth = array_fill(0, 12, 0);
    $nominationApprovedCountPerMonth = array_fill(0, 12, 0);
    $nominationRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($nominations as $nomination) {
        $monthIndex = date('n', strtotime($nomination->created_at)) - 1; // Get 0-based month index (Jan = 0, Dec = 11)

        // Pending status conditions
        if (Auth::user()->is_admin === 'admin' 
            ? strtolower($nomination->status) === 'pending' 
            : (strtolower($nomination->status) === 'pending' && strtolower($user->role_name) === 'clerk')
        ) {
            $nominationPendingCount++;
            $nominationPendingCountPerMonth[$monthIndex]++;
        }

        // Approved Clerk status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($nomination->status) === 'approved_clerk' 
            : (strtolower($nomination->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
        ) {
            $nominationPendingCount++;
            $nominationPendingCountPerMonth[$monthIndex]++;
        }

        // Approved status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($nomination->status) === 'approved' 
            : (strtolower($nomination->status) === 'approved' && strtolower($user->role_name) === 'hod')
        ) {
            $nominationApprovedCount++;
            $nominationApprovedCountPerMonth[$monthIndex]++;
        }

        // Approved or Approved Clerk condition for Clerk role
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($nomination->status) === 'approved' 
            : ((strtolower($nomination->status) === 'approved' || strtolower($nomination->status) === 'approved_clerk') && strtolower($user->role_name) === 'clerk')
        ) {
            $nominationApprovedCount++;
            $nominationApprovedCountPerMonth[$monthIndex]++;
        }

        // Rejected status condition
        if (strtolower($nomination->status) === 'rejected') {
            $nominationRejectedCount++;
            $nominationRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>
<?php
    if (Auth::user()->is_admin === 'admin') {
        $checklists = DB::select('SELECT * FROM newchecklists');
    } else {
        $userId = auth()->id();  

        $checklists = DB::table('newchecklists')
            ->where('newchecklists.state', Auth::user()->state)
            ->where('newchecklists.district', Auth::user()->district)
            ->where('newchecklists.taluka', Auth::user()->taluka)
            ->where('newchecklists.org_id', Auth::user()->org_id)
            ->where('newchecklists.depart_id', Auth::user()->depart_id)
            ->where('newchecklists.design_id', Auth::user()->design_id)
            ->get();
    }

    $checklistPendingCount = 0;
    $checklistApprovedCount = 0;
    $checklistRejectedCount = 0;

    $checklistPendingCountPerMonth = array_fill(0, 12, 0);
    $checklistApprovedCountPerMonth = array_fill(0, 12, 0);
    $checklistRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($checklists as $checklist) {
        $monthIndex = date('n', strtotime($checklist->created_at)) - 1;

        if (strtolower($checklist->Status) === 'pending') {
            $checklistPendingCount++;
            $checklistPendingCountPerMonth[$monthIndex]++;
        }
        if (strtolower($checklist->Status) === 'approved' || strtolower($checklist->Status) === 'approved_clerk' ) {
            $checklistApprovedCount++;
            $checklistApprovedCountPerMonth[$monthIndex]++;
        }
        if (strtolower($checklist->Status) === 'rejected') {
            $checklistRejectedCount++;
            $checklistRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>


<?php
    if (Auth::user()->is_admin === 'admin') {
        $transfers = DB::select('SELECT * FROM transfers');
    } else {
        $userId = auth()->id();

        $transfers = DB::table('transfers')
            ->where('transfers.state', Auth::user()->state)
            ->where('transfers.district', Auth::user()->district)
            ->where('transfers.taluka', Auth::user()->taluka)
            ->where('transfers.org_id', Auth::user()->org_id)
            ->where('transfers.depart_id', Auth::user()->depart_id)
            ->where('transfers.design_id', Auth::user()->design_id)
            ->get();
    }

    $transferPendingCount = 0;
    $transferApprovedCount = 0;
    $transferRejectedCount = 0;

    $transferPendingCountPerMonth = array_fill(0, 12, 0);
    $transferApprovedCountPerMonth = array_fill(0, 12, 0);
    $transferRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($transfers as $transfer) {
        $monthIndex = date('n', strtotime($transfer->created_at)) - 1;

        if (Auth::user()->is_admin === 'admin' 
            ? strtolower($transfer->Status) === 'pending'
            : (strtolower($transfer->Status) === 'pending' && strtolower($user->role_name) === 'clerk')
        ) {
            $transferPendingCount++;
            $transferPendingCountPerMonth[$monthIndex]++;
        }

        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($transfer->Status) === 'approved_clerk'
            : (strtolower($transfer->Status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
        ) {
            $transferPendingCount++;
            $transferPendingCountPerMonth[$monthIndex]++;
        }

        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($transfer->Status) === 'approved'
            : (strtolower($transfer->Status) === 'approved' && strtolower($user->role_name) === 'hod')
        ) {
            $transferApprovedCount++;
            $transferApprovedCountPerMonth[$monthIndex]++;
        }

        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($transfer->Status) === 'approved'
            : ((strtolower($transfer->Status) === 'approved' || strtolower($transfer->Status) === 'approved_clerk') && strtolower($user->role_name) === 'clerk')
        ) {
            $transferApprovedCount++;
            $transferApprovedCountPerMonth[$monthIndex]++;
        }

        if (strtolower($transfer->Status) === 'rejected') {
            $transferRejectedCount++;
            $transferRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>
<?php
    if (Auth::user()->is_admin === 'admin') {
        $affidavits = DB::select('SELECT * FROM affidavits');
    } else {
        $affidavits = DB::table('affidavits')
            ->where('affidavits.state', Auth::user()->state)
            ->where('affidavits.district', Auth::user()->district)
            ->where('affidavits.taluka', Auth::user()->taluka)
            ->where('affidavits.org_id', Auth::user()->org_id)
            ->where('affidavits.depart_id', Auth::user()->depart_id)
            ->where('affidavits.design_id', Auth::user()->design_id)
            ->get();
    }

    $affidavitPendingCount = 0;
    $affidavitApprovedCount = 0;
    $affidavitRejectedCount = 0;

    $affidavitPendingCountPerMonth = array_fill(0, 12, 0);
    $affidavitApprovedCountPerMonth = array_fill(0, 12, 0);
    $affidavitRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($affidavits as $affidavit) {
        $monthIndex = date('n', strtotime($affidavit->created_at)) - 1;

        // Pending status conditions
        if (Auth::user()->is_admin === 'admin' 
            ? strtolower($affidavit->status) === 'pending' 
            : (strtolower($affidavit->status) === 'pending' && strtolower($user->role_name) === 'clerk')
        ) {
            $affidavitPendingCount++;
            $affidavitPendingCountPerMonth[$monthIndex]++;
        }

        // Approved Clerk status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($affidavit->status) === 'approved_clerk' 
            : (strtolower($affidavit->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
        ) {
            $affidavitPendingCount++;
            $affidavitPendingCountPerMonth[$monthIndex]++;
        }

        // Approved status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($affidavit->status) === 'approved' 
            : (strtolower($affidavit->status) === 'approved' && strtolower($user->role_name) === 'hod')
        ) {
            $affidavitApprovedCount++;
            $affidavitApprovedCountPerMonth[$monthIndex]++;
        }

        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($affidavit->status) === 'approved' 
            : ((strtolower($affidavit->status) === 'approved' || strtolower($affidavit->status) === 'approved_clerk') && strtolower($user->role_name) === 'clerk')
        ) {
            $affidavitApprovedCount++;
            $affidavitApprovedCountPerMonth[$monthIndex]++;
        }

        // Rejected status condition
        if (strtolower($affidavit->status) === 'rejected') {
            $affidavitRejectedCount++;
            $affidavitRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>
<?php
    if (Auth::user()->is_admin === 'admin') {
        $receipts = DB::select('SELECT * FROM receipts');
    } else {
        $receipts = DB::table('receipts')
            ->join('users', 'receipts.user_id', '=', 'users.id')
            ->where('users.state', Auth::user()->state)
            ->where('users.district', Auth::user()->district)
            ->where('users.taluka', Auth::user()->taluka)
            ->where('users.org_id', Auth::user()->org_id)
            ->where('users.depart_id', Auth::user()->depart_id)
            ->where('users.design_id', Auth::user()->design_id)
            ->select('receipts.*', 'users.status as user_status', 'users.role_name as user_role')
            ->get();
    }

    $receiptPendingCount = 0;
    $receiptApprovedCount = 0;
    $receiptRejectedCount = 0;

    $receiptPendingCountPerMonth = array_fill(0, 12, 0);
    $receiptApprovedCountPerMonth = array_fill(0, 12, 0);
    $receiptRejectedCountPerMonth = array_fill(0, 12, 0);

    foreach ($receipts as $receipt) {
        $monthIndex = date('n', strtotime($receipt->created_at)) - 1;

        // Pending status conditions
        if (Auth::user()->is_admin === 'admin' 
            ? strtolower($receipt->status) === 'pending' 
            : (strtolower($receipt->status) === 'pending' && strtolower($user->role_name) === 'clerk')
        ) {
            $receiptPendingCount++;
            $receiptPendingCountPerMonth[$monthIndex]++;
        }

        // Approved Clerk status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($receipt->status) === 'approved_clerk' 
            : (strtolower($receipt->status) === 'approved_clerk' && strtolower($user->role_name) === 'hod')
        ) {
            $receiptApprovedCount++;
            $receiptApprovedCountPerMonth[$monthIndex]++;
        }

        // Approved status conditions
        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($receipt->status) === 'approved' 
            : (strtolower($receipt->status) === 'approved' && strtolower($user->role_name) === 'hod')
        ) {
            $receiptApprovedCount++;
            $receiptApprovedCountPerMonth[$monthIndex]++;
        }

        elseif (Auth::user()->is_admin === 'admin' 
            ? strtolower($receipt->status) === 'approved' 
            : ((strtolower($receipt->status) === 'approved' || strtolower($receipt->status) === 'approved_clerk') && strtolower($user->role_name) === 'clerk')
        ) {
            $receiptApprovedCount++;
            $receiptApprovedCountPerMonth[$monthIndex]++;
        }

        // Rejected status condition
        if (strtolower($receipt->status) === 'rejected') {
            $receiptRejectedCount++;
            $receiptRejectedCountPerMonth[$monthIndex]++;
        }
    }
?>


<div class="row">
    <?php if((isset($permissions)) && (($permissions['dashborad_view'] == 2) || 
                   ($permissions['dashborad_create'] == 2) || 
                   ($permissions['dashborad_edit'] == 2) || 
                   ($permissions['dashborad_delete'] == 2))): ?>


    <div class="col-xl-3 col-md-6">
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Total Users
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <div class="row text-center">
                    <div class="col">
                        <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($userPendingCount); ?>"><?php echo e($userPendingCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($userApprovedCount); ?>"><?php echo e($userApprovedCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($userRejectedCount); ?>"><?php echo e($userRejectedCount); ?></span>
                        </h4>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="<?php echo e(route('user-details-view')); ?>" class="text-decoration-underline">View all</a>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-info rounded fs-3">
                            <i class="bx bx-user"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Total Documents
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="row text-center">
                        <div class="col">
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($documentPendingCount); ?>"><?php echo e($documentPendingCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($documentApprovedCount); ?>"><?php echo e($documentApprovedCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($documentRejectedCount); ?>"><?php echo e($documentRejectedCount); ?></span>
                            </h4>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="<?php echo e(route('documents.index')); ?>" class="text-decoration-underline">View all</a>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-success rounded fs-3">
                                <i class="bx bx-folder"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Total Leaves
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="row text-center">
                        <div class="col">
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($pendingCount); ?>"><?php echo e($pendingCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($approvedCount); ?>"><?php echo e($approvedCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($rejectCount); ?>"><?php echo e($rejectCount); ?></span>
                            </h4>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="<?php echo e(route('leaves.index')); ?>" class="text-decoration-underline">View all</a>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-primary rounded fs-3">
                                <i class="bx bx-calendar-check"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Total Nominations
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="row text-center">
                        <div class="col">
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($nominationPendingCount); ?>"><?php echo e($nominationPendingCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($nominationApprovedCount); ?>"><?php echo e($nominationApprovedCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($nominationRejectedCount); ?>"><?php echo e($nominationRejectedCount); ?></span>
                            </h4>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="<?php echo e(route('nomination-index')); ?>" class="text-decoration-underline">View all</a>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-warning rounded fs-3">
                                <i class="bx bx-task"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">
    
    
    <div class="col-xl-3 col-md-6">
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Total Salaries
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <div class="row text-center">
                    <div class="col">
                        <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($salaryPendingCount); ?>"><?php echo e($salaryPendingCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($salaryApprovedCount); ?>"><?php echo e($salaryApprovedCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($salaryRejectedCount); ?>"><?php echo e($salaryRejectedCount); ?></span>
                        </h4>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="<?php echo e(route('salary.index')); ?>" class="text-decoration-underline">View all</a>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-success rounded fs-3">
                            <i class="bx bx-wallet"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Total Checklists
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="row text-center">
                        <div class="col">
                            <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($checklistPendingCount); ?>"><?php echo e($checklistPendingCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                            <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($checklistApprovedCount); ?>"><?php echo e($checklistApprovedCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                            <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($checklistRejectedCount); ?>"><?php echo e($checklistRejectedCount); ?></span>
                            </h4>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="<?php echo e(route('checklist-new.index')); ?>" class="text-decoration-underline">View all</a>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-success rounded fs-3">
                                <i class="bx bx-check-circle"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
   <div class="col-xl-3 col-md-6">
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Total Receipts
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <div class="row text-center">
                    <div class="col">
                        <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($receiptPendingCount); ?>"><?php echo e($receiptPendingCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($receiptApprovedCount); ?>"><?php echo e($receiptApprovedCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($receiptRejectedCount); ?>"><?php echo e($receiptRejectedCount); ?></span>
                        </h4>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="<?php echo e(route('receipts.index')); ?>" class="text-decoration-underline">View all</a>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-info rounded fs-3">
                            <i class="bx bx-receipt"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Total Transfers
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <div class="row text-center">
                    <div class="col">
                        <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($transferPendingCount); ?>"><?php echo e($transferPendingCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($transferApprovedCount); ?>"><?php echo e($transferApprovedCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($transferRejectedCount); ?>"><?php echo e($transferRejectedCount); ?></span>
                        </h4>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="<?php echo e(route('transfer.index')); ?>" class="text-decoration-underline">View all</a>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-info rounded fs-3">
                            <i class="bx bx-transfer"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
   </div>
    

   
   <div class="row">
       
        
    <div class="col-xl-3 col-md-6">
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Total Affidavits
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <div class="row text-center">
                    <div class="col">
                        <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($affidavitPendingCount); ?>"><?php echo e($affidavitPendingCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($affidavitApprovedCount); ?>"><?php echo e($affidavitApprovedCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($affidavitRejectedCount); ?>"><?php echo e($affidavitRejectedCount); ?></span>
                        </h4>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="<?php echo e(route('getaffidavit')); ?>" class="text-decoration-underline">View all</a>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-info rounded fs-3">
                            <i class="bx bx-file"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

       <div class="col-xl-3 col-md-6">
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Total Achievements
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <div class="row text-center">
                    <div class="col">
                        <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($achievementPendingCount); ?>"><?php echo e($achievementPendingCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($achievementApprovedCount); ?>"><?php echo e($achievementApprovedCount); ?></span>
                        </h4>
                    </div>
                    <div class="col">
                        <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                        <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                            <span class="counter-value" data-target="<?php echo e($achievementRejectedCount); ?>"><?php echo e($achievementRejectedCount); ?></span>
                        </h4>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="<?php echo e(route('getahievement')); ?>" class="text-decoration-underline">View all</a>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-primary rounded fs-3">
                            <i class="bx bx-trophy"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Total Audits
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="row text-center">
                        <div class="col">
                            <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($auditPendingCount); ?>"><?php echo e($auditPendingCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                            <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($auditApprovedCount); ?>"><?php echo e($auditApprovedCount); ?></span>
                            </h4>
                        </div>
                        <div class="col">
                            <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="<?php echo e($auditRejectedCount); ?>"><?php echo e($auditRejectedCount); ?></span>
                            </h4>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="<?php echo e(route('audits.index')); ?>" class="text-decoration-underline">View all</a>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-primary rounded fs-3">
                                <i class="bx bx-clipboard"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Total Pensions
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="row text-center">
                        <div class="col">
                            <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="0">0</span>
                            </h4>
                        </div>
                        <div class="col">
                            <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="0">0</span>
                            </h4>
                        </div>
                        <div class="col">
                            <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                            <h4 class="fs-22 fw-semibold ff-secondary mt-1">
                                <span class="counter-value" data-target="0">0</span>
                            </h4>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="./pension" class="text-decoration-underline">View all</a>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-warning rounded fs-3">
                            <i class="bx bx-money"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


       
       
   </div> 
<?php endif; ?>





         <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Leaves</h4>
                            <!--<div>-->
                            <!--    <button type="button" class="btn btn-soft-secondary btn-sm shadow-none">-->
                            <!--        ALL-->
                            <!--    </button>-->
                            <!--    <button type="button" class="btn btn-soft-secondary btn-sm shadow-none">-->
                            <!--        1M-->
                            <!--    </button>-->
                            <!--    <button type="button" class="btn btn-soft-secondary btn-sm shadow-none">-->
                            <!--        6M-->
                            <!--    </button>-->
                            <!--    <button type="button" class="btn btn-soft-primary btn-sm shadow-none">-->
                            <!--        1Y-->
                            <!--    </button>-->
                            <!--</div>-->
                        </div><!-- end card header -->

                        <div class="card-header p-0 border-0 bg-light-subtle">
                            <div class="row g-0 text-center">
                                <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value" data-target="<?php echo e($pendingCount); ?>"><?php echo e($pendingCount); ?></span></h5>
                                        <p class="text-muted mb-0">Pending Leave </p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value" data-target="<?php echo e($approvedCount); ?>"><?php echo e($approvedCount); ?></span></h5>
                                        <p class="text-muted mb-0">Approved Leave</p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value" data-target="<?php echo e($rejectCount); ?>"><?php echo e($rejectCount); ?></span></h5>
                                        <p class="text-muted mb-0">Rejected Leave</p>
                                    </div>
                                </div>
                                <!--end col-->
                                <!--end col-->
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body p-0 pb-2">
                            <div class="w-100">
<div id="chart" ></div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-6">
    <div class="card">
        <div class="card-header border-0 align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Salaries</h4>
        </div><!-- end card header -->

        <div class="card-header p-0 border-0 bg-light-subtle">
            <div class="row g-0 text-center">
                <div class="col-6 col-sm-3">
                    <div class="p-3 border border-dashed border-start-0">
                        <h5 class="mb-1"><span class="counter-value" data-target="<?php echo e($salaryPendingCount); ?>"><?php echo e($salaryPendingCount); ?></span></h5>
                        <p class="text-muted mb-0">Pending Salary</p>
                    </div>
                </div>
                <!--end col-->
                <div class="col-6 col-sm-3">
                    <div class="p-3 border border-dashed border-start-0">
                        <h5 class="mb-1"><span class="counter-value" data-target="<?php echo e($salaryApprovedCount); ?>"><?php echo e($salaryApprovedCount); ?></span></h5>
                        <p class="text-muted mb-0">Approved Salary</p>
                    </div>
                </div>
                <!--end col-->
                <div class="col-6 col-sm-3">
                    <div class="p-3 border border-dashed border-start-0">
                        <h5 class="mb-1"><span class="counter-value" data-target="<?php echo e($salaryRejectedCount); ?>"><?php echo e($salaryRejectedCount); ?></span></h5>
                        <p class="text-muted mb-0">Rejected Salary</p>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div><!-- end card header -->

        <div class="card-body p-0 pb-2">
            <div class="w-100">
                <div id="salary-chart"></div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->


           
                            </div>
                            
                            
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

        </div> <!-- end .h-100-->

    </div> <!-- end col -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="<?php echo e(URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/jsvectormap/maps/world-merc.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('build/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>


<script>
    var options = {
        chart: {
            height: 350,
            type: 'line' // Main chart type
        },
        series: [
            {
                name: 'Pending',
                type: 'bar', // Display as a bar chart
                data: <?php echo json_encode($pendingCountPerMonth, 15, 512) ?>,
                color: '#1E90FF' // Blue color for pending
            },
            {
                name: 'Approved',
                type: 'line', // Display as a line chart
                data: <?php echo json_encode($approvedCountPerMonth, 15, 512) ?>,
                color: '#32CD32' // Green color for approved
            },
            {
                name: 'Rejected',
                type: 'line', // Display as a line chart
                data: <?php echo json_encode($rejectCountPerMonth, 15, 512) ?>,
                color: '#FF6347' // Red color for rejected
            }
        ],
        stroke: {
            curve: 'smooth', // Smooth lines
            width: [0, 3, 3] // Width for each series (0 for bars)
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            title: {
                text: 'Months'
            }
        },
        yaxis: {
            min: 0, // Minimum value for y-axis
            max: Math.max(
                Math.max(...<?php echo json_encode($pendingCountPerMonth, 15, 512) ?>),
                Math.max(...<?php echo json_encode($approvedCountPerMonth, 15, 512) ?>),
                Math.max(...<?php echo json_encode($rejectCountPerMonth, 15, 512) ?>)
            ) + 10, // Add padding to the max value for better display
            title: {
                text: 'Number of Leaves'
            }
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (value) {
                    return value + " leaves";
                }
            }
        },
        legend: {
            position: 'top'
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

<script>
    var options = {
        chart: {
            height: 350,
            type: 'line' // Main chart type
        },
        series: [
            {
                name: 'Pending',
                type: 'bar', // Display as a bar chart
                data: <?php echo json_encode($salaryPendingCountPerMonth, 15, 512) ?>,
                color: '#1E90FF' // Blue color for pending
            },
            {
                name: 'Approved',
                type: 'line', // Display as a line chart
                data: <?php echo json_encode($salaryApprovedCountPerMonth, 15, 512) ?>,
                color: '#32CD32' // Green color for approved
            },
            {
                name: 'Rejected',
                type: 'line', // Display as a line chart
                data: <?php echo json_encode($salaryRejectedCountPerMonth, 15, 512) ?>,
                color: '#FF6347' // Red color for rejected
            }
        ],
        stroke: {
            curve: 'smooth', // Smooth lines
            width: [0, 3, 3] // Width for each series (0 for bars)
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            title: {
                text: 'Months'
            }
        },
        yaxis: {
            min: 0, // Minimum value for y-axis
            max: Math.max(
                Math.max(...<?php echo json_encode($salaryPendingCountPerMonth, 15, 512) ?>),
                Math.max(...<?php echo json_encode($salaryApprovedCountPerMonth, 15, 512) ?>),
                Math.max(...<?php echo json_encode($salaryRejectedCountPerMonth, 15, 512) ?>)
            ) + 10, // Add padding to the max value for better display
            title: {
                text: 'Number of Salaries'
            }
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (value) {
                    return value + " salaries";
                }
            }
        },
        legend: {
            position: 'top'
        }
    };

    var chart = new ApexCharts(document.querySelector("#salary-chart"), options);
    chart.render();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u532655452/domains/eofficess.com/public_html/resources/views/index.blade.php ENDPATH**/ ?>