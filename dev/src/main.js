//import 'jarallax/dist/jarallax.min.css';
import "@fancyapps/ui/dist/fancybox/fancybox.css";
//import "aos/dist/aos.css";
import './scss/style.scss';
//!
import { Swiper } from "swiper/bundle";

//import { jarallax } from "jarallax";
import { Fancybox } from "@fancyapps/ui/dist/fancybox/";
//import AOS from "AOS";

import { AutoCalc } from "./js/AutoCalc.js";
import { Menu } from './js/Menu.js';
//import { RunningLine } from './js/RunningLine.js';
//import { BackdropList } from './js/BackdropList.js';
import { Modal } from './js/Modal.js';
import { cookies } from "./js/Cookies.js";
//import { AnimationCounter } from "./js/AnimationCounter.js";
//import HiddenDescr from "./js/HiddenDescr.js";
//import HiddenList from "./js/HiddenList.js";
import { imask } from "./js/imask.js";
import { fileBtn } from "./js/FileBtn.js";
//import { CustomFieldSelect } from "./js/CustomFieldSelect.js";
//import { Spoiler } from './js/Spoiler.js';
import { ScrollToTop } from './js/ScrollToTop.js';
import { MXSwiper } from './js/MXSwiper.js';
import { CustomSelect } from './js/CustomSelect.js';
//import { Tabs } from './js/Tabs.js';
//import { MapScrollLock } from './js/MapScrollLock.js';
//import { cf7CustomValidation } from './js/cf7-validation.js';
//import { SelectFromAcf } from './js/SelectFromAcf.js';
//import { loadMore } from './js/loadMore.js';
//import AirDatepicker from 'air-datepicker';
//import 'air-datepicker/air-datepicker.css';
//document.querySelectorAll('input.form-input-date')?.forEach(input => {
//	new AirDatepicker(input, {
//		selectedDates: [new Date()],
//		isMobile: true,
//		autoClose: true,
//		minDate: new Date(),
//	});
//})
// time
//document.querySelectorAll('input.form-input-time')?.forEach(input => {
//	new AirDatepicker(input, {
//		isMobile: true,
//		autoClose: true,
//		timepicker: true,
//		onlyTimepicker: true
//	});
//})
//cf7CustomValidation();

// FOR CONTACTS FORM 7
//import "./js/redirect-to-thanks-page.js";


new AutoCalc();
//new CustomFieldSelect({
//	input: '.form-wrapper .cf-select',
//	lastEdit: false
//});
new Menu({
	btn: '.burger-btn', //.burger-btn-icon
	menu: '.header-menu',
	activeClass: 'open-header-menu',
	closeBtns: ['a', '.cart-btn']
})
//new Menu({
//	btn: '.filter-mobile-btn',
//	menu: '.filter',
//	activeClass: 'open-filter-menu',
//	closeBtns: ['.filter-close-btn']
//})
//new Menu({
//	btn: '.header__phone-btn', //.burger-btn-icon
//	menu: '.header-phone-box',
//	activeClass: 'open-phone-box',
//	//closeBtns: ['.menu-close-btn']
//})

//new BackdropList();

new Modal();

//jarallax(document.querySelectorAll('.jarallax'), {
	//speed: 0.2,
//});

cookies();
imask();

Fancybox.bind("[data-fancybox]", {
	placeFocusBack: false
});

//new RunningLine();
new ScrollToTop();

//new Spoiler();

//new Spoiler('[data-spoiler]', {
//	onlyOneOpen: true,
//	activeClass: 'is-open',
//});

//new Spoiler('[data-spoiler]', { media: 'max-width: 768px' });

new MXSwiper();
//new Tabs();
new CustomSelect({
	selector: 'select',
	forceSend: true,
});

//new MapScrollLock();
/*
window.addEventListener('scroll', function () {
	const header = document.querySelector('.header');

	if (window.scrollY > 50) {
		header.classList.add('scrolled');
	} else {
		header.classList.remove('scrolled');
		const valueUnits = header.offsetHeight;
		document.querySelector(':root').style.setProperty(`--header-height`, valueUnits + 'px');
	}
});
*/

fileBtn();//

//new Tabs();

//document.querySelectorAll('video.wp-video-shortcode').forEach(video => {
//	if (!video.src) {
//		const link = video.querySelector('a');
//		if (link) video.src = link.href;
//	}
//});

//document?.querySelectorAll('.wpcf7-acceptance input[type="checkbox"]')?.forEach(el => {
//	el.checked = true;
//})

//AOS.init({
//	disable: 'mobile',
//	duration: 600,
//	offset: 100
//});

//new SelectFromAcf('.custom-select-product', {
//	data: '.select-products-data'
//})

//loadMore();

//AnimationCounter();

//HiddenDescr();

//HiddenList();
document.addEventListener('DOMContentLoaded', function () {
	if (typeof Swiper === 'undefined') return;

	var hero = document.querySelector('.hero');
	if (!hero) return;

	var sliderEl = hero.querySelector('.hero-swiper');
	var tabsEl = hero.querySelector('.hero-tabs');

	if (!sliderEl || sliderEl.swiper) return;

	var swiper = new Swiper(sliderEl, {
		slidesPerView: 1,
		spaceBetween: 0,
		rewind: true,
	});

	var tabsSwiper = null;

	if (tabsEl && !tabsEl.swiper) {
		tabsSwiper = new Swiper(tabsEl, {
			slidesPerView: 'auto',
			watchOverflow: true,
		});
	}

	var tabs = [].slice.call(hero.querySelectorAll('.hero-tabs-slide__btn'));
	var currentEl = hero.querySelector('.hero__pagination-current');
	var prevBtn = hero.querySelector('.hero__navs-btn-prev');
	var nextBtn = hero.querySelector('.hero__navs-btn-next');

	var updateUI = function () {
		var index = swiper.realIndex;

		if (currentEl) {
			currentEl.textContent = index + 1 > 9 ? String(index + 1) : '0' + (index + 1);
		}

		tabs.forEach(function (tab, i) {
			tab.classList.toggle('is-active', i === index);
		});

		if (tabsSwiper && tabs[index]) {
			var tabsRect = tabsEl.getBoundingClientRect();
			var tabRect = tabs[index].getBoundingClientRect();

			if (tabRect.left < tabsRect.left || tabRect.right > tabsRect.right) {
				tabsSwiper.slideTo(index);
			}
		}
	};

	swiper.on('slideChange', updateUI);

	tabs.forEach(function (tab, i) {
		tab.addEventListener('click', function () {
			swiper.slideToLoop(i);
		});
	});

	if (prevBtn) {
		prevBtn.addEventListener('click', function () {
			swiper.slidePrev();
		});
	}

	if (nextBtn) {
		nextBtn.addEventListener('click', function () {
			swiper.slideNext();
		});
	}

	updateUI();
});

// showMore
document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('[data-show-more]').forEach(function (btn) {
		var list = document.querySelector(btn.getAttribute('data-show-more'));
		if (!list) return;

		var moreText = btn.textContent.trim();
		var lessText = btn.getAttribute('data-show-less') || 'Скрыть';

		btn.addEventListener('click', function () {
			var isOpened = list.classList.toggle('is-opened');
			btn.textContent = isOpened ? lessText : moreText;
		});
	});
});

// product-hero-swiper
const productThumbSwiper = new Swiper('.product-gallery-thumbs', {
	slidesPerView: 4,
	spaceBetween: 8,
	rewind: true,

	breakpoints: {
		'640': {
			spaceBetween: 16
		},
		'1024': {
			spaceBetween: 24
		}
	}
})
const productSwiper = new Swiper('.product-gallery-swiper', {
	slidesPerView: 1,
	spaceBetween: 8,
	loop: true,
	breakpoints: {
		'640': {
			spaceBetween: 16
		},
		'1024': {
			spaceBetween: 24
		}
	},
	thumbs: {
		swiper: productThumbSwiper,
	}
})

const productName = document.querySelectorAll('.meta-product-name');
const productPage = document.querySelectorAll('.meta-product-page');

if (productName.length) {
	productName.forEach(el => {
		const allInputs = document.querySelectorAll('input.product-name');
		allInputs.forEach(input => {
			input.value = el.textContent.trim();
		})
	})
}
if (productPage.length) {
	productPage.forEach(el => {
		const allInputs = document.querySelectorAll('input.product-page');
		allInputs.forEach(input => {
			input.value = el.textContent.trim();
		})
	})
}

document.addEventListener('DOMContentLoaded', () => {
	const filter = document.querySelector('.projects-filter');

	if (!filter) return;

	const toggle = filter.querySelector('[data-filter-toggle]');

	if (!toggle) return;

	toggle.addEventListener('click', () => {
		const isOpen = filter.classList.toggle('is-open');
		toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
	});

	document.addEventListener('click', (event) => {
		if (!filter.contains(event.target)) {
			filter.classList.remove('is-open');
			toggle.setAttribute('aria-expanded', 'false');
		}
	});
});