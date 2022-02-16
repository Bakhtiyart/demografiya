<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package demografik
 */

?>

<footer class="section section__footer">

	<button class="btn__scroll scroll-top">

		<svg version="1.1" class="icon icon__arrow" xmlns="http://www.w3.org/2000/svg"
			xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12.9px" height="10.4px"
			viewBox="0 0 12.9 10.4" style="enable-background:new 0 0 12.9 10.4;" xml:space="preserve">

			<path class="st0"
				d="M12.6,4.7L7.8,0l-1,1.1l3.5,3.4H0V6h10.2L6.7,9.4l1,1.1l4.8-4.7c0.1-0.1,0.2-0.3,0.2-0.5S12.8,4.8,12.6,4.7z">

			</path>

		</svg>

		<span class="screen_reader">Yuqoriga</span>

	</button>

	<div class="footer__top">
		<div class="wrapper">
			<div class="row">
				<div class="col-md-6">
					<a class="d-md-flex" href="https://moiti.uz/" target="_blank">
						<span class="footer-logo-icon d-md-flex">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/moiti_logo.png">
							<p>O‘zbekiston Respublikasi Mahalla va oilani qo‘llab-quvvatlash vazirligi huzuridagi

								“Mahalla va oila” ilmiy-tadqiqot instituti</p>
						</span>
					</a>
					<div class="font-1">
						<div class="textwidget">
							<p>Portalda e'lon qilingan materiallardan nusxa koʻchirish, tarqatish va boshqa shakllarda foydalanish faqat tahririyat yozma roziligi bilan amalga oshirilishi mumkin.

							</p>
						</div>
					</div>

					<h4>Mobil ilovalarni yuklab oling</h4>
					<div class="mobile_apps">
						<a href="#" rel="noopener noreferrer" target="_blank">
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAoCAYAAAA16j4lAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NEFGRTUxNzQwNUU4MTFFQUI1MDk5QTRCMEY3M0M1RkQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NEFGRTUxNzUwNUU4MTFFQUI1MDk5QTRCMEY3M0M1RkQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0QUZFNTE3MjA1RTgxMUVBQjUwOTlBNEIwRjczQzVGRCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0QUZFNTE3MzA1RTgxMUVBQjUwOTlBNEIwRjczQzVGRCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PmTDxB4AAAunSURBVHja7JwFbFRb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"
								class="sc-jqCOkK dmdysE">
						</a>
						<a href="#" rel="noopener noreferrer" target="_blank">

							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIYAAAAoCAYAAAA7b4IPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MzI3QkIyQTQwNUU4MTFFQUFBNzNDNEFBNDJDRkI0NDgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MzI3QkIyQTUwNUU4MTFFQUFBNzNDNEFBNDJDRkI0NDgiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozMjdCQjJBMjA1RTgxMUVBQUE3M0M0QUE0MkNGQjQ0OCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDozMjdCQjJBMzA1RTgxMUVBQUE3M0M0QUE0MkNGQjQ0OCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pi/c4P0AAA/iSURBVHja7JwJnI3l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"
								class="sc-bbmXgH fseuZE">
						</a>
					</div>
				</div>

				<div class="col-md-3">
					<h3 class="subtitle font__secondary--15">Asosiy havolalar</h3>
					<ul>
						<li><a href="#">Aholini ro'yhatga olish</a></li>
						<li><a href="#">Demografik passport</a></li>
						<li><a href="#">Interaktiv xarita</a></li>
						<li><a href="#">Raqamli kutubxona</a></li>
						<li><a href="#">Xalqaro demografiya jurnali</a></li>
						<li><a href="#">Onlayn kurslar</a></li>
					</ul>
				</div>

				<div class="col-md-3">
					<h3 class="subtitle font__secondary--15">Xar doim xabardor bo'ling!</h3>
					<ul class="social__nav">
						<li>
							<a href="#" target="_blank">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<i class="fa fa-youtube-play"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer__bottom">
		<div class="wrapper">
			<nav class="footer-menu">
				<ul id="menu-footer-navigation" class="nav navbar-nav">
					<li class="menu-privacy-policy-terms-of-service">
						<a href="#">Maxfiylik siyosati</a>
					</li>
					<li class="menu-permissions">
						<a href="#">Saytdan foydalanish qoidalari</a>
					</li>
				</ul>
			</nav>
			<p class="copyright">© 2022 Demografiya web portali. Barcha huquqlar himoya qilingan.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
