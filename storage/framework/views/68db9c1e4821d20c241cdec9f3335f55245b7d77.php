<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid" style="background-color: #E5EBF0">
    <div class="row" style="height: 400px;background:url('public/admin/img/Sapa.jpg') center center no-repeat fixed;background-size:cover;">
    </div>
        <div class="row" style="height: 60px;background-color: rgba(251,248,255,0.79)">
            <div class="col-sm-3" style="position: relative;top:-60px">
            <img class="rounded-circle img-thumbnail" style="width: 170px;margin:0;" src="public/source/user/img_avatar1.png" alt="Card image">
                <div class="card" style="border:none">

                    <div class="card-body" style="float:left">
                        <h4 class="card-title"><?php echo e($user_info->username); ?></h4>
                        <!--<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>-->

                    </div>
                </div>
            </div>

            <div class="col-sm-5" style="height:60px">
                <div class="introduce">
                    <ul>
                        <li><a>101 Bạn bè</a></li>
                        <li><a>69 bài đăng</a></li>
                        <li><a>96 lượt like</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <?php if(Auth::user()->id!=$user_info->id): ?>
                    <a href="" class="btn btn-outline-info"><i class="fa fa-envelope-o"></i>Gửi tin nhắn</a>
                    <?php if($friend==1): ?>
                        <a href="deleteFriend/<?php echo e($user_info->id); ?>" class="btn btn-outline-info confirm"><i class="fa fa-user-times"></i>Hủy kết bạn</a>
                    

                    <?php elseif($sentRequest==1): ?>
                        <a href="getReMoveRequest/<?php echo e($user_info->id); ?>" class="btn btn-outline-danger confirm"><i class="fa fa-user-plus"></i>Hủy yêu cầu</a>
                    <?php elseif($receiveRequest==1): ?>
                        <div class="dropdown" style="float:right;margin-right: 50px">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Trả lời lời mời
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="getAcceptRequest/<?php echo e($user_info->id); ?>">Chấp nhận</a>
                                <a class="dropdown-item confirm" href="getDeleteRequest/<?php echo e($user_info->id); ?>">Xóa lời mời</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="getSendFriendRequest/<?php echo e($user_info->id); ?>" class="btn btn-outline-info"><i class="fa fa-user-plus"></i>Kết bạn</a>

                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>
    <script>
        $(document).ready(function () {
            $('.confirm').on('click',function () {
                return confirm("Bạn có chắc muốn thực hiện hành động này?");
            })
        })
    </script>
</div>
