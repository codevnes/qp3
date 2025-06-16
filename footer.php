</main><!-- #main -->
</div><!-- #content -->

<footer id="footer" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
	<div class="site-info">
		<div class="container">
			<div class="wrap">
				<div class="row align-items-center">
					<div class="col-md-6 text-md-left text-center">
						<div class="footer-right">
							<p id="copyright">© <?php echo date('Y'); ?> Bản quyền thuộc về <?php bloginfo('name'); ?>.
							</p>
							<ul>
								<li class="icon_social icon_facebook"><a title="Facebook" href="#" rel="nofollow"
										target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li class="icon_social icon_instagram"><a title="Instagram" href="#" rel="nofollow"
										target="_blank"><i class="fab fa-instagram"></i></a></li>
								<li class="icon_social icon_youtube"><a title="youtube" href="#" rel="nofollow"
										target="_blank"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="footer-left">
							<ul>
								<li>
									<a href="#"><i class="fa-regular fa-paper-plane 2x"></i> Đăng ký nhận tin</a>
								</li>
								<li>
									<a href="tel:(028) 35 28 28 28">
										<i class="fa-regular fa-phone-rotary 2x"></i>(028) 35 28 28 28
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<div id="back-top" class="d-lx-none">
	<i class="fas fa-chevron-up"></i>
</div>

<div class="modal uni-modal" id="modalGroup">
	<div class="background-overlay"></div>
	<div class="modal-dialog modal-extra " role="document">
		<div class="modal-content">
			<div class="close">
				<div class="menu-title"><i class="fas fa-times-circle"></i> Close</div>
			</div>
			<div class="modal-body">
				<div class="spinner"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modalForm">
	<div class="background-overlay"></div>
	<div class="modal-dialog modal-extra " role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="modal-header">
					<h3 class="modal-title">
						Thông tin ứng tuyển
					</h3>
					<div class="close">
						<i class="fas fa-times-circle"></i>
					</div>
				</div>
				<hr class="wp-block-separator has-alpha-channel-opacity has-background is-style-wide">
				<?php echo do_shortcode('[contact-form-7 id="109" title="Form Ứng tuyển"]'); ?>
			</div>
		</div>
	</div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>