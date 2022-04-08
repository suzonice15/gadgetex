
<?php $__env->startSection('pageTitle'); ?>
    All Advertisement  List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
          
            <a href="<?php echo e(url('/admin/advertisement/create')); ?>" class="  btn btn-success">
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
                <th style="text-align:center">Title</th>
                <th style="text-align:center">Image</th>
                <th style="text-align:center">Parmalink</th>
                 <th style="text-align:center"> Created date </th>
                <th style="text-align:center" >Action </th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $advertisement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="text-align:center !important">
                <td style="text-align:center"> <?php echo e($adv->id); ?></td>
                <td style="text-align:center"><?php echo e($adv->title); ?></td>
                <td style="text-align:center"><img style="width:100px;" src="/<?php echo e($adv->image); ?>"></td>
                <td style="text-align:center"><?php echo e($adv->link); ?><</td>
                 <td style="text-align:center"><?php echo e($adv->create_date); ?></td>
                <td style="text-align:center" ><a href="<?php echo e(url('admin/advertisement/edit/'.$adv->id)); ?>" class="btn btn-info">Edit</a> 
                <a href="<?php echo e(url('admin/advertisement/destroy/'.$adv->id)); ?>" onclick="return confirm('Are you want to delete this Product')" class="btn btn-warning">Delete</a>
            </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
              
            </tbody>

        </table>

    </div>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/admin/advertisement/index.blade.php ENDPATH**/ ?>