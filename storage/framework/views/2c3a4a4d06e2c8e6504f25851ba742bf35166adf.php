
<?php $__env->startSection('profile_master'); ?>

    <style>
        .warllet-money{
            margin-top: 7px;
            background: red;
            position: absolute;
            border: none;
        }
        .bonas{
            padding: 56px 8px;
        }

        .names{    background: #ddd;
            text-align: center;
            font-size: 45px;
            text-transform: capitalize;
            font-weight: bold;}
        .winner{    background: green;
            text-align: center;
            font-size: 45px;
            color:white;
            font-weight: bold;}
        .winner {
            animation: blinker 1s linear infinite;
        }

        @keyframes  blinker {
            50% {
                opacity: 0;
            }
        }


            @media (max-width: 776px) {
                .bonas{
                    padding: 0px 0px;

                }
                .warllet-money {
                    margin-top: -39px;
                    margin-left: 80px;
                }
                .bonas h3{
                    font-size: 16px;
                    text-align: center;
                    padding-top: 11px;
                }
                .bonas h4{
                    font-size: 16px;
                    text-align: center;
                    padding-top: 11px;
                }
            .winner{
                background: green;
                text-align: center;
                font-size: 20px;
                color: white;
                font-weight: bold;
                padding: 6px;
            }
            }
    </style>







    <?php if(Session::get('error')): ?>
<script>
 
    $(window).on('load', function() {
        $('#add-money').modal('show');
    });

</script>

    <?php endif; ?>


<?php
    $promosion_offer_active=get_option('promosion_offer_active');
    if($promosion_offer_active==1){
?>

    <script>

        $(document).ready(function(){
            $("#checked_tearm_conditon").change(function() {
                if($('#checked_tearm_conditon').prop('checked')) {
                   
                    $('#submit').removeAttr('disabled');
                } else {

                    $('#submit').attr('disabled','disabled');
                }
            });

        });

        window.onload = rollClick;
      //  window.onload = amitumi;
        const ENTRANTS =<?= get_option('address') ?>


        const namesEl = document.querySelector(".names");
        const winnerEl = document.querySelector(".winner");

        function randomName() {
            const rand = Math.floor(Math.random() * ENTRANTS.length);
            const name = ENTRANTS[rand];
            namesEl.innerText = name;
        }

        function rollClick() {

            winnerEl.classList.add("hide");
            namesEl.classList.remove("hide");
            setDeceleratingTimeout(randomName, 1, 100);
            setTimeout(()=>{
                namesEl.classList.add("hide");
            winnerEl.classList.remove("hide");
            const winner = namesEl.innerText;
           // winnerEl.innerText = winner;
            winder();

        }, 30000);
        }

         function winder(){

             $.ajax({
                 url:"<?php echo e(url('/')); ?>/customer/lotarySuccess",
                 success:function(data){
                     console.log(data)
                     const winnerEl = document.querySelector(".winner");
                     winnerEl.innerText = data;
                 }
             })

         }

        function setDeceleratingTimeout(callback, factor, times) {
            const internalCallback = ((t, counter) => {
                return () => {
                if (--t > 0) {
                    setTimeout(internalCallback, ++counter * factor);
                    callback();
                }
            };
        })(times, 0);

            setTimeout(internalCallback, factor);
        }

    </script>
    <?php  }  ?>


    <script>
            $(document).ready(function(){
        $("#submit_transaction").click(function () {
            if($("#transaction_id").val().length !=10){
                alert("Transaction Id does not matched");
                return false;
            }
            if($("#sender_number").val().length !=11){
                alert("Enter Your 11 digit Sender Number");
                return false;
            }

            if($("#amount_of_promotion").val().length ==0){
                alert("Please Enter Amount");
                return false;
            }

            $("#submit_transaction").attr("disabled","disabled")
            $.ajax({
                url:"<?php echo e(url('/')); ?>/add-wallet/balance",
                method:"post",
                data:{
                    transaction_id:$("#transaction_id").val(),
                    sender_number:$("#sender_number").val(),
                    amount:$("#amount_of_promotion").val(),
                    note:$("#note").val(),
                    "_token":"<?php echo e(csrf_token()); ?>"

                },
                success:function(data){
                    if(data.success==true){
                        $("#add-mony-sucess").text("Successfully added to your wallet please wait for admin approval")

                        setInterval(()=>{
                            $("#add-money").modal('hide');

                    },3000)
                    } else {

                    }
                }
            })


        })
            })



    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.customer.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/customer/dashboard_money.blade.php ENDPATH**/ ?>