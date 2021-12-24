<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Mail Order Complete</title>
</head>
<body>  
        <div class="logo">
            <div class="text-center" style="width: 200px">
                <img style="width: 200px; height: 200px; padding-left: 10%;" 
                src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.6435-9/84881630_1062116027454317_6490880144826171392_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=ad2b24&_nc_ohc=uM7ZOzFd6PsAX_i3193&_nc_ht=scontent.fsgn2-4.fna&oh=e3db058635968fa78b53bfd58fd403a6&oe=61CAE648"
                 class="rounded" alt="facebook Uyên Ngô">
              </div>
        </div>
        
        <p>Xin chào <?php echo e($data['fullname']); ?>. Cảm ơn bạn đã đặt hàng.<br>Chúng tôi sẽ sớm giao hàng đến bạn.</p><br>
        <h3 style="color:purple">Thông tin đơn hàng</h3><br>
        <table class="table table-dark table-striped" style="text-align: center;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khóa học</th>
                <th scope="col">số lượng</th>
                <th scope="col">giá tiền</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                ?>
                <?php $__currentLoopData = $data['order_detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($i++); ?></th>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->quantity); ?></td>
                    <td><?php echo e($item->price); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
          <h3 style="color: red;">Tổng tiền: <?php echo e($data['total_price']); ?></h3>
</body><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/Mail/order.blade.php ENDPATH**/ ?>