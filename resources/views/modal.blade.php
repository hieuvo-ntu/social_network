<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalTitle">Bình luận bài viết</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label">Bình luận</label>
                        <textarea class="form-control" id="comment-text" placeholder="Bình luận của bạn"></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary Reply" >Gửi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

            </div>
        </div>

    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal Comment-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-comment">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!--Trả lời bình luận -->
<!-- The Modal -->
<div class="modal" id="myReplyModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="commentModalTitle">Trả lời bình luận</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label"></label>
                        <textarea class="form-control" id="reply-comment-text" placeholder="Bình luận của bạn"></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary Reply-Comment" >Gửi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

            </div>
        </div>

    </div>
</div>