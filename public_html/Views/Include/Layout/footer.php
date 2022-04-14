
		<div class="post-popup job_post">
			<?php   
				require_once APP_ROOT . '/Views/Pages/Common_components/create-post.php';
			?>
		</div><!--post-project-popup end-->



		<div class="chatbox-list">
			<div class="chatbox">
				<div class="chat-mg bx">
					<a href="#" title=""><img src="/public/images/chat.png" alt=""></a>
					<span>2</span>
				</div>
				<div class="conversation-box">
					<div class="con-title">
						<h3>Messages</h3>
						<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
					</div>
					<div class="chat-list">
						<div class="conv-list active">
							<div class="usrr-pic">
								<img src="http://via.placeholder.com/50x50" alt="">
								<span class="active-status activee"></span>
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="/public/images/smley.png" alt=""></span>
							</div>
							<div class="ct-time">
								<span>1:55 PM</span>
							</div>
							<span class="msg-numbers">2</span>
						</div>
						<div class="conv-list">
							<div class="usrr-pic">
								<img src="http://via.placeholder.com/50x50" alt="">
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="/public/images/smley.png" alt=""></span>
							</div>
							<div class="ct-time">
								<span>11:39 PM</span>
							</div>
						</div>
						<div class="conv-list">
							<div class="usrr-pic">
								<img src="http://via.placeholder.com/50x50" alt="">
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="/public/images/smley.png" alt=""></span>
							</div>
							<div class="ct-time">
								<span>0.28 AM</span>
							</div>
						</div>
					</div><!--chat-list end-->
				</div><!--conversation-box end-->
			</div>
		</div><!--chatbox-list end-->

	</div><!--theme-layout end-->



<script type="text/javascript" src="/public/js/jquery.min.js"></script>
<script type="text/javascript" src="/public/js/popper.js"></script>
<script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/public/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="/public/lib/slick/slick.min.js"></script>
<script type="text/javascript" src="/public/js/scrollbar.js"></script>
<script type="text/javascript" src="/public/js/script.js"></script>
<script type="text/javascript" src="/public/scripts/common.js"></script>
<script type="text/javascript" src="/public/scripts/like.js"></script>
<script type="text/javascript" src="/public/scripts/deletePost.js"></script>

</body>
</html>

 
<?php

unset($_SESSION['message']);

?>