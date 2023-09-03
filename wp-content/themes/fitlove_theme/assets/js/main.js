document.addEventListener('DOMContentLoaded', function () {
	let getCoords = (elem) => {
		let box = elem.getBoundingClientRect();
		return {
			top: box.top + window.scrollY,
			right: box.right + window.scrollX,
			bottom: box.bottom + window.scrollY,
			left: box.left + window.scrollX,
			height: box.height,
		};
	},
	isOnScreen = (elem) => {
		let coefficient;
		window.innerWidth <= 768 ? coefficient = .75 : coefficient = .9;
		return window.scrollY > (getCoords(elem).top - window.innerHeight / coefficient);
	},
	isMobile = () => {
		return window.outerWidth <= 767;
	},
	isExist = (selector) => {
		return document.querySelector(selector);
	}

	//МЕНЮ ХЭДЕРА НА ЭКРАНАХ МЕНЬШЕ 767px
	if (window.outerWidth <= 767) {
		let openMenu = document.querySelector('#openMenu'),
			hamburgerIcon = document.querySelector('#hamburger-icon'),
			header = document.querySelector('.main-header'),
			background = document.querySelector('#background'),
			menu = document.querySelector('#menu');

		//АКТИВАЦИЯ МЕНЮ
		openMenu.onclick = function (e) {
			e.preventDefault();
			hamburgerIcon.classList.toggle('active');
			menu.classList.toggle('active');
			background.classList.toggle('active');
			if (menu.classList.contains('active')) {
				menu.style.top = window.scrollY + 94 + "px";
			} else {
				menu.style.top = -350 + "px";
			}
		};

		background.onclick = function (e) {
			e.preventDefault();
			hamburgerIcon.classList.remove('active');
			menu.classList.remove('active');
			background.classList.remove('active');
			if (menu.classList.contains('active')) {
				menu.style.top = window.scrollY + 94 + "px";
			} else {
				menu.style.top = -350 + "px";
			}
		};

		//ФУНКЦИОНАЛ ХЭДЕРА ПРИ СКРОЛЛЕ
		let prevScrollpos = window.scrollY;

		window.addEventListener('scroll', function () {
			let currentScrollPos = window.scrollY;

			if (window.scrollY <= 2) {
				header.classList.remove('hide');
				header.classList.remove('no-hide');
				hamburgerIcon.classList.remove('active');
				menu.classList.remove('active');
				background.classList.remove('active');
				if (menu.classList.contains('active')) {
					menu.style.top = window.scrollY + 94 + "px";
				} else {
					menu.style.top = -350 + "px";
				}
			} else if (prevScrollpos > currentScrollPos) {
				header.classList.add('no-hide');
				header.classList.remove('hide');
				hamburgerIcon.classList.remove('active');
				menu.classList.remove('active');
				background.classList.remove('active');
				if (menu.classList.contains('active')) {
					menu.style.top = window.scrollY + 94 + "px";
				} else {
					menu.style.top = -350 + "px";
				}
			} else {
				header.classList.add('hide');
				header.classList.remove('no-hide');
				hamburgerIcon.classList.remove('active');
				menu.classList.remove('active');
				background.classList.remove('active');
				if (menu.classList.contains('active')) {
					menu.style.top = window.scrollY + 94 + "px";
				} else {
					menu.style.top = -350 + "px";
				}
			}
			prevScrollpos = currentScrollPos;
		});
	}

	if (isExist('.projects-page')) {
		// ПОКАЗАТЬ ЕЩЕ ПРЕОКТЫ
		jQuery('#more-projects').on("click", function (e) {
			e.preventDefault();
			let loadMore = jQuery(this),
				currentPage = loadMore.attr('data-current-page');
			loadMore.text('Загрузка...');

			const data = {
				"action": "load_more-projects",
				"query": JSON.stringify(loadMore.data("query")),
				"page": currentPage,
			}

			jQuery.ajax({
				url: "/wp-admin/admin-ajax.php",
				data: data,
				type: "POST",
				success:
					function (data) {
						if (data) {
							loadMore.html("Загрузить ещё");
							loadMore.prev().append(data);

							currentPage++;
							loadMore.attr('data-current-page', currentPage.toString());

							if (currentPage === parseInt(loadMore.attr("data-max-pages"))) {
								loadMore.remove();
							}
						} else {
							loadMore.remove();
						}
					},
				error: function (jqXHR, status, error) {
					console.log(jqXHR + '; ' + status + '; ' + error);
				}
			});
		});
	} else if (isExist('.default-container')) {
// ОБОРАЧИВАЕМ БЛОК ГАЛЛЕРЕИ-2 В ТЕГ A
		let galItem = document.querySelectorAll('.wp-block-gallery.columns-2 .wp-block-image');
		galItem.forEach(e => {
			src = e.querySelector('img').getAttribute('data-src-webp');
			org_html = e.innerHTML;
			new_html = "<a href='" + src + "'>" + org_html + "</a>";
			e.innerHTML = new_html;
		});

		// ДЕЛАЕМ ПОПАП ГАЛЛЕРЕИ-2
		$('.wp-block-gallery.columns-2').each(function () {
			$(this).magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery: {
					enabled: true
				},
				fixedContentPos: true,
				overflowY: 'auto',
				callbacks: {
					open: function () {
						document.querySelector('html').style.overflow = 'auto';
						document.querySelector('html').style.marginRight = 'unset';
					},
					close: function () {
						document.querySelector('html').style.overflow = 'auto';
					},
				},
			});
		});

		//ОБОРАЧИВАЕМ БЛОК ГАЛЛЕРЕИ-1 В СВАЙПЕР
		let galleryElements = document.querySelectorAll('.wp-block-gallery.columns-1');
		galleryElements.forEach(function (element) {
			element.classList.add('swiper', 'swiper-default');
		});

		let imageElements = document.querySelectorAll('.wp-block-gallery.columns-1 .wp-block-image');
		imageElements.forEach(function (element) {
			element.classList.add('swiper-slide');
		});

		let wrapperElement = document.createElement('div');
		wrapperElement.classList.add('swiper-wrapper');

		let slideElements = document.querySelectorAll('.swiper-slide');
		slideElements.forEach(function (element) {
			wrapperElement.appendChild(element);
		});

		let firstGalleryElement = document.querySelector('.wp-block-gallery.columns-1');
		firstGalleryElement.appendChild(wrapperElement);

		let navBtnElement = document.createElement('div');
		navBtnElement.classList.add('swiper-nav');

		let prevBtnElement = document.createElement('div');
		prevBtnElement.classList.add('nav-prev');
		prevBtnElement.innerHTML = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
			'<path d="M20 12H4M4 12L10 18M4 12L10 6" stroke="#FF6703" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n' +
			'</svg>\n';

		let nextBtnElement = document.createElement('div');
		nextBtnElement.classList.add('nav-next');
		nextBtnElement.innerHTML = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
			'<path d="M4 12H20M20 12L14 18M20 12L14 6" stroke="#FF6703" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n' +
			'</svg>\n';

		navBtnElement.appendChild(prevBtnElement);
		navBtnElement.appendChild(nextBtnElement);

		firstGalleryElement.insertBefore(navBtnElement, wrapperElement.nextSibling);

		let swiper = new Swiper(".swiper-default", {
			navigation: {
				nextEl: ".nav-next",
				prevEl: ".nav-prev",
			},
		});
	}

	window.addEventListener('load', function () {

	});
})