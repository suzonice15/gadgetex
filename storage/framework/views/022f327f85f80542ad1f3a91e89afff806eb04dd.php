
<?php $__env->startSection('pageTitle'); ?>
    All testmonial  List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
          
            <a href="<?php echo e(url('/admin/testmonial/create')); ?>" class="  btn btn-success">
<i class="fa fa-fw fa-plus"></i>  Add New  
</a>  
        </div>
        
            
        

    </div>
    <br/>
    <br/>
    <div class="table-responsive">

        <table  class="table table-bordered table-striped   ">
            <thead>
            <tr style="text-align:center !important">
                <th style="text-align:center"> Sl</th>
                <th style="text-align:center">user name</th>
                <th style="text-align:center">Image</th>
                <th style="text-align:center">Description</th>
                 <th style="text-align:center"> Created date </th>
                <th style="text-align:center" >Action </th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $testmonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="text-align:center !important">
                <td style="text-align:center"> <?php echo e($testi->id); ?></td>
                <td style="text-align:center"><?php echo e($testi->user_name); ?></td>
                <td style="text-align:center"><img style="width:80px" src="/<?php echo e($testi->image); ?>" alt="testi"></td>
                <td style="text-align:center"><?php echo $testi->description; ?></td>
                 <td style="text-align:center"><?php echo e($testi->create_date); ?></td>
                <td style="text-align:center" ><a href="<?php echo e(url('admin/testmonial/edit/'.$testi->id)); ?>" class="btn btn-info">Edit</a> 
                <a href="<?php echo e(url('admin/testmonial/destroy/'.$testi->id)); ?>" onclick="return confirm('Are you want to delete this Product')" class="btn btn-warning">Delete</a>
            </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
              
            </tbody>

        </table>

    </div>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/admin/testmonial/index.blade.php ENDPATH**/ ?>