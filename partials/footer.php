<footer class="site-footer margin-top-10">
<div class="footer-top padding-6 white">
	<h3>Sign up for our newsletter.</h3>
	<? echo do_shortcode( '[contact-form-7 id="5" title="Sign up for our newsletter"]' ); ?>
	<p><small>* Receive updates on features and new developments. Unsubscribe at anytime.</small></p>
</div>
<div class="footer-bottom white padding-6">
<div class="container">
	<div class="footer-column-1">
		<h4 class="bold">Workerline</h4>
		<?php
            wp_nav_menu( array(
                'menu'           => 'Workerline',
                'theme_location' => 'footer-1',
                'fallback_cb'    => true,
                'container'      => 'nav',
            ) );
		?>
	</div>
	<div class="footer-column-2">
		<h4 class="bold">Product</h4>
		<?php
            wp_nav_menu( array(
                'menu'           => 'Product',
                'theme_location' => 'footer-2',
                'fallback_cb'    => true,
                'container'      => 'nav',
            ) );
		?>
	</div>
		<div class="footer-column-3">
			<h4 class="bold">Resources</h4>
			<?php
				wp_nav_menu( array(
					'menu'           => 'Resources',
					'theme_location' => 'footer-3',
					'fallback_cb'    => true,
					'container'      => 'nav',
				) );
			?>
		</div>
		<div class="footer-column-4">
			<ul class="social-contact">
				<li><a href="https://www.facebook.com/workerlinewebsites" target="_blank" title="Connect on Facebook"><img src="/wp-content/uploads/2020/07/facebook.png" class="white-filter" /></a></li>
				<li><a href="https://www.linkedin.com/company/workerline/" target="_blank" title="Connect on LinkedIn"><img src="/wp-content/uploads/2020/07/linkedin.png" class="white-filter" /></a></li>
				<li><a href="https://twitter.com/workerlineunion" target="_blank" title="Connect on Twitter"><img src="/wp-content/uploads/2020/07/twitter.png" class="white-filter" /></a></li>
				<?php /*<li><a href="https://twitter.com/workerlineunion" target="_blank" title="Connect on YouTube"><img src="/wp-content/uploads/2020/07/youtube.png" class="white-filter" /></a></li>*/?>
			</ul>
		</div>
		<div class="footer-column-5">
			<a class="logo-wrapper" href="/" title="Return Home">
				<img src="/wp-content/uploads/2020/07/logo.png" src="Workerline Logo" class="white-filter" />
				<p>Strengthen Your Lines Of Communication</p>
			</a>
		</div>
	</div>
	<div class="container">
	<div class="footer-signoff">
		<div class="signature">
			<p>Workerline Inc. Owen Sound, Ontario, Canada</p>
		</div>
		<div class="legal">
			<p><a href="/">Workerline Inc. 2020</a> | <a href="/privacy-policy">Privacy Policy</a> | <a href="/sitemap.xml">Site Map</a></p>
		</div>
	</div>
</div>
</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
