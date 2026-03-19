const ww = window.innerWidth;
const wh = window.innerHeight;

if (history.scrollRestoration) {
    history.scrollRestoration = 'manual';
}

function debounce(func, delay = 150) {
  let timeoutId;
  return function (...args) {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => {
      func.apply(this, args);
    }, delay);
  };
}

const windowHeight = () => {
    const doc = document.documentElement
    doc.style.setProperty('--window-height', `${window.innerHeight}px`)
}
window.addEventListener('resize', windowHeight);
windowHeight();


const MathUtils = {
    // map number x from range [a, b] to [c, d]
    map: (x, a, b, c, d) => (x - a) * (d - c) / (b - a) + c,
    // linear interpolation
    lerp: (a, b, n) => (1 - n) * a + n * b,
    // Random float
    getRandomFloat: (min, max) => (Math.random() * (max - min) + min).toFixed(2)
};


gsap.registerPlugin(ScrollTrigger);


function hasClass(element, className) {
    return element.classList.contains(className);
}

function addClass(elements, className) {
	for (var i = 0; i < elements.length; i++) {
		var element = elements[i];
		if (element.classList) {
			element.classList.add(className);
		} else {
			element.className += ' ' + className;
		}
	}
}

function removeClass(elements, className) {
	for (var i = 0; i < elements.length; i++) {
		var element = elements[i];
		if (element.classList) {
			element.classList.remove(className);
		} else {
			element.className = element.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
		}
	}
}

// var els = document.getElementsByClassName('current-class-name');
// removeClass(els, 'current-class-name');
// addClass(els, 'new-class-name');

// var el = document.getElementById('current-class-name');
// removeClass([el], 'current-class-name');
// addClass([el], 'new-class-name');

// const update = (time, deltaTime, frame) => {
//     lenis.raf(time * 1000)
// }
// const resize = (e) => {
//     ScrollTrigger.refresh();
// }
// const lenis = new Lenis({
//     duration: 1,
//     easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
//     infinite: false,
//     smoothTouch: false,  // Giữ native touch
//     syncTouch: false,    // Tránh mất inertia
//     touchMultiplier: 2,
//     infinite: false
// });
// lenis.on('scroll', ({ scroll, limit, velocity, direction, progress }) => {
//     ScrollTrigger.update();
// })
// gsap.ticker.add(update);
// gsap.ticker.lagSmoothing(0);
// if( !device.ios() ) {
//     window.addEventListener('resize', resize);
// }
// lenis.stop();
// window.scrollTo(0, 0); // Reset browser scroll
// lenis.scrollTo(0, { immediate: true, force: true }); // Reset Lenis
// lenis.scrollTo(offset, {
//     duration: 2
// });

const responsiveImages = () => {
    // Bạn có thể tùy chỉnh breakpoint tại đây
    const breakpoints = {
        mobile: 767,   // ≤ 767px  → mobile
        tablet: 1199   // 768px - 1024px → tablet, >1024px → desktop
    };

    // Lấy kích thước hiện tại
    const width = window.innerWidth;

    let device = 'desktop';
    if (width <= breakpoints.mobile) {
        device = 'mobile';
    } else if (width <= breakpoints.tablet) {
        device = 'tablet';
    }

    // 1. Xử lý thẻ <img> có class "responsive-img"
    document.querySelectorAll(`[data-img-${device}]`).forEach(img => {
        const src = img.getAttribute(`data-img-${device}`);
        if (src && img.getAttribute('src') !== src) {
            img.setAttribute('src', src);
        }
    });

    // 2. Xử lý background-image
    document.querySelectorAll(`[data-bg-${device}]`).forEach(el => {
        const bg = el.getAttribute(`data-bg-${device}`);
        if (bg) {
            el.style.backgroundImage = `url(${bg})`;
        }
    });
}
const debouncedResponsive = debounce(responsiveImages, 150);

responsiveImages();

const wowReponsiveJs = () => {
    // Lấy chiều rộng trình duyệt (thay thế cho biến ww)
    const ww = window.innerWidth;

    // 1. Mobile Animations (< 768px)
    if (ww < 768) {
        document.querySelectorAll('[data-mb-wow]').forEach(el => {
            const className = el.getAttribute('data-mb-wow');
            el.classList.add('wow', className);
        });
    }

    // 2. Delays cho Tablet (768px - 1199px)
    if (ww >= 768 && ww < 1200) {
        document.querySelectorAll('[data-md-wow-delay]').forEach(el => {
            const time = el.getAttribute('data-md-wow-delay');
            el.setAttribute('data-wow-delay', time);
        });
    }

    // 3. Delays cho Desktop (>= 1200px)
    if (ww >= 1200) {
        document.querySelectorAll('[data-xl-wow-delay]').forEach(el => {
            const time = el.getAttribute('data-xl-wow-delay');
            el.setAttribute('data-wow-delay', time);
        });
    }

    // 4. Downward Inheritance (Dưới 1200px)
    if (ww < 1200) {
        document.querySelectorAll('[wow-down-xl]').forEach(el => {
            const className = el.getAttribute('wow-down-xl');
            el.classList.add('wow', className);
        });
    }

    // 5. Downward Inheritance (Dưới 768px)
    if (ww < 768) {
        document.querySelectorAll('[wow-down-md]').forEach(el => {
            const className = el.getAttribute('wow-down-md');
            el.classList.add('wow', className);
        });
    }
}

const wowLoadDoneJs = (item) => {
    const wow = new WOW({
        boxClass:     'wow',      // class của phần tử cần hiệu ứng
        animateClass: 'animated', // class hiệu ứng animation
        mobile:       true,       
        live:         true,       // tự động quét các phần tử mới thêm vào DOM
        callback:     function(box) {
            // Thay thế $(box).addClass('effect')
            box.classList.add('effect');
            
            // Thay thế $(box).removeClass('fix')
            box.classList.remove('fix');

            // Xử lý delay với arrow function để giữ đúng ngữ cảnh (context)
            setTimeout(() => {
                box.classList.add('done');
            }, 600);
        },
        scrollContainer: null 
    });
    
    wow.init();
}


const headerJs = () => {
    const header = document.querySelector('.header');
    const megamenu = document.querySelector('.menuMobile');
    
    if(header) {
        var headeroom = new Headroom(header, {
            tolerance : 4,
            offset : 100,
            classes: {
                pinned: "header-pin",
                unpinned: "header-unpin"
            },
            onPin : function() {
            },
            onUnpin : function() {
            },
        });
        headeroom.init();
    }

    const showMenu = () => {
        const btn = document.querySelector('.header__humberger');
        const btnBg = document.querySelector('.menuMobile__bg');

        btn.addEventListener('click', () => {
            if( hasClass(header, 'header--showmenu') === true ) {
                removeClass([header], 'header--showmenu');
                removeClass([megamenu], 'show-megamenu');
                removeClass([megamenu], 'effect');
                removeClass([document.body], 'body-fix-scroll');
            } else {
                addClass([header], 'header--showmenu');
                addClass([megamenu], 'show-megamenu');
                addClass([document.body], 'body-fix-scroll');
                setTimeout(() => {
                   addClass([megamenu], 'effect'); 
                }, 300);
            }
        });

        btnBg.addEventListener('click', () => {
            btn.click();
        });

        const dropDown = megamenu.querySelectorAll(".btn-dropdown");
        if(dropDown ) {
            dropDown.forEach(button => {
                // const button = el.querySelector('.collapse-title');
                // const content = el.querySelector('.collapse-content');
                button.addEventListener("click", function() {
                    const content = button.closest('li').querySelector('.mega-item');
                    button.classList.toggle("is-active");
                    
                    if( content ) {
                        if (content.style.height) {
                            content.style.height = null;
                        } else {
                            content.style.height = content.scrollHeight + "px";
                        }
                    }
        
                });
            });
        }

    }
    showMenu();

    const megamenuPc = () => {
        const navLinks = header.querySelectorAll('.header__list > ul > li > a');
        const megaWrapper = header.querySelector('.header__megamenu');
        const allContents = megaWrapper.querySelectorAll('.mega-content');

        let timeout = null;

        const hideAll = () => {
            megaWrapper.classList.remove('is-open');
            allContents.forEach(content => content.classList.remove('is-active'));
        };

        navLinks.forEach(link => {
            link.addEventListener('mouseenter', () => {
                clearTimeout(timeout);
                const targetId = link.getAttribute('data-target');
                const targetContent = document.getElementById(targetId);

                allContents.forEach(c => c.classList.remove('is-active'));
                if (targetContent) {
                    targetContent.classList.add('is-active');
                    megaWrapper.classList.add('is-open');
                }
            });

            link.addEventListener('mouseleave', () => {
                timeout = setTimeout(hideAll, 200);
            });
        });

        // Giữ menu mở khi hover vào chính nó
        megaWrapper.addEventListener('mouseenter', () => {
            clearTimeout(timeout);
        });

        // Đóng menu khi rời khỏi Mega Menu
        megaWrapper.addEventListener('mouseleave', hideAll);
    }

    if( ww > 1199 ) {
        megamenuPc();
    }

    const showSearch = () => {
        const btn = header.querySelector('.header__searchBtn');
        const close = header.querySelector('.header__bg');
        const closeHead = header.querySelector('.header__top .btn-close-search');
        btn.addEventListener('click', () => {
            addClass([header], 'header--showSearch');
        });
        close.addEventListener('click', () => {
            if( hasClass(header, 'header--showSearch') === true ) {
                removeClass([header], 'header--showSearch');
            }
        });
        closeHead.addEventListener('click', () => {
            close.click();
        });
    }
    showSearch();

    const slideSp = () => {
        const searchBox = header.querySelector('.header__searchBox');
        const slideDom = header.querySelector('.s-product .swiper');

        if( searchBox && slideDom ) {
            const slide = new Swiper(slideDom, {
                slidesPerView: 2.3,
                spaceBetween: 6,
                speed: 700,
                pagination: {
                    el: slideDom.querySelector('.swiper-pagination'),
                    clickable: true,
                },
                breakpoints: {
                    // when window width is >= 640px
                    767: {
                        slidesPerView: 3,
                        spaceBetween: 10
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 12
                    }
                }
                // loop: true,
            });
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        slideSp();
    });
}

function backToTopJs() {
    var wrap = $('.footer__backtotop');
    if( wrap.length ) {
        wrap.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, 500);
        });

        const update = () => {
            let scrollTop = $(window).scrollTop();
            if( scrollTop > $(window).height() ) {
                wrap.addClass('active');
            } else {
                wrap.removeClass('active');
            }
        }
        update();
        $(window).on('scroll', update);
    }
}

function loadingVideoJs() {
    // const list = $('[data-load-video]');
    // if( list.length ) {
    //     const wh = window.outerHeight;

    //     list.each(function() {
    //         const self = $(this);
    //         const getSrc = self.attr('data-load-video');
    //         const video = self.parent();

    //         const loadVideo = () => {
    //             self.attr('src', getSrc);
    //             video[0].load();
    //             video[0].play();
    //         };

    //         ScrollTrigger.create({
    //             trigger: self.parent(),
    //             start: `top-=${wh}px bottom`,
    //             onEnter: loadVideo,
    //             onEnterBack: loadVideo,
    //             invalidateOnRefresh: true,
    //         });
    //     });
    // }
}

function counterJs() {
    // const wrap = $('.counterJs');
    // if( wrap.length ) {
    //     wrap.each(function() {
    //         const self = $(this);
    //         const getTo = self.attr('data-to');
    //         function loadImage () {
    //             self.countTo({
    //                 to: getTo
    //             })
    //         };

    //         ScrollTrigger.create({
    //             trigger: self,
    //             start: 'top bottom',
    //             end: 'bottom top',
    //             onEnter: loadImage,
    //             onEnterBack: loadImage,
    //             invalidateOnRefresh: true,
    //         });
    //     });
    // }
}

const dropDownJs = () => {
    const wrap = document.querySelectorAll('[data-dropdown]');
    if( wrap ) {
        document.addEventListener('click', (e) => {
            // 1. Xử lý khi click vào nút Trigger
            const isDropdownButton = e.target.matches('[data-dropdowntrigger]') || e.target.closest('[data-dropdowntrigger]');
            
            let currentDropdown;
            if (isDropdownButton) {
                // Tìm container cha chứa nút vừa click
                currentDropdown = e.target.closest('[data-dropdown]');
                const menu = currentDropdown.querySelector('[data-dropdowncontent]');

                // Toggle (Đóng/Mở) menu của dropdown hiện tại
                const isOpen = menu.style.display === 'block';
                menu.style.display = isOpen ? 'none' : 'block';
                currentDropdown.classList.toggle('active')
            }

            // 2. Đóng tất cả các menu KHÁC khi mở một cái mới 
            // HOẶC đóng tất cả khi click ra ngoài vùng an toàn
            document.querySelectorAll('[data-dropdowncontent]').forEach(menu => {
                // Nếu click ra ngoài dropdown HOẶC click vào dropdown khác
                if (menu.closest('[data-dropdown]') === currentDropdown) return;
                menu.style.display = 'none';
            });
        });
    }
}

const heroSlideJs = () => {
    const wrap = document.querySelector('.sec-hero');
    if( wrap ) {
        const slideDom = wrap.querySelector('.swiper');
        const slide = new Swiper(slideDom, {
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 700,
            pagination: {
                el: wrap.querySelector('.swiper-pagination'),
                clickable: true,
            },
            navigation: {
                prevEl: slideDom.querySelector('.swiper-buttonCustom-prev'),
                nextEl: slideDom.querySelector('.swiper-buttonCustom-next'),
            },
            // loop: true,
        });
    }
}

const homeProductQcJs = () => {
    const wrap = document.querySelector('.sec-homeProductQc');
    if( wrap ) {
        const slideText = wrap.querySelector('.item-text');
        const slideImg = wrap.querySelector('.item-img');

        const slide1 = new Swiper(slideText.querySelector('.swiper'), {
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 700,
            pagination: {
                el: wrap.querySelector('.swiper-pagination'),
                clickable: true,
            },
        });
        const slide2 = new Swiper(slideImg.querySelector('.swiper'), {
            slidesPerView: 1,
            spaceBetween: 1,
            speed: 700,
        });

        slide1.on('slideChange', function() {
            setTimeout(function() {
                const getIndex = slideText.querySelector('.swiper-slide-active').getAttribute('data-index');
                slide2.slideTo(getIndex);
                // slideThumb.find('.swiper-slide').removeClass('current');
                // slideThumb.find(`.swiper-slide[data-index="${getIndex}"]`).addClass('current');

            });
        });
        slide2.on('slideChange', function() {
            setTimeout(function() {
                const getIndex = slideImg.querySelector('.swiper-slide-active').getAttribute('data-index');
                slide1.slideTo(getIndex);
                // slideThumb.find('.swiper-slide').removeClass('current');
                // slideThumb.find(`.swiper-slide[data-index="${getIndex}"]`).addClass('current');

            });
        });
    }
}

const scrollToHash = () => {
    const hash = window.location.hash.slice(1);
    const search = window.location.search;
    let params;
    if (!hash) return;
    const targetElement = document.getElementById(hash);
    if( search ) {
        try {
            params = new URLSearchParams(window.location.search);
        } catch (e) {
            console.warn("URLSearchParams không hỗ trợ hoặc lỗi:", e);
            params = new URLSearchParams(); // fallback
        }

        const tabIndex = params.get('tab');
        if( tabIndex !== null && tabIndex !== '' ) {
            targetElement.querySelector(`xo-tabs-trigger[xo-name="tab-${tabIndex}"]`).click();
        }
    }

    if (targetElement) {
        targetElement.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
        });
    }
}

const filterSidebarJs = () => {
    const accordion = () => {
        const acc =  document.querySelectorAll('.filter-accordion__item');
        acc.forEach(item => {
            const title = item.querySelector('.filter-accordion__title');
            if( title ) {
                const content = item.querySelector('.filter-accordion__content');
                content.style.maxHeight = content.scrollHeight + 'px';
                title.addEventListener('click', () => {
                    const isOpen = item.classList.contains('minus');
                    if (isOpen) {
                        item.classList.remove('minus');
                    } else {
                        item.classList.add('minus');
                    }
                });
            }
        });
    }
    accordion();

    const mobileActive = () => {
        const filter = document.querySelector('.filterSiderBar');

        if( ww < 768 && filter ) {
            const body = document.body;
            const header = document.querySelector('.header');
            const btnOpen = filter.querySelector('.fill-head__title');
            const btnClose = filter.querySelector('.filter-btn-close-mb');
            btnOpen.addEventListener('click', () => {
                addClass([header], 'header--showFilter');
                addClass([body], 'body-fix-scroll');
                addClass([filter], 'is-open');
            });
            btnClose.addEventListener('click', () => {
                removeClass([header], 'header--showFilter');
                removeClass([body], 'body-fix-scroll');
                removeClass([filter], 'is-open');
            });
        }
    }
    mobileActive();
}

const dropDownJsTrigger = () => {
    let activeDropdown = null;
    let activeTrigger = null;

    // Lắng nghe sự kiện click trên toàn trang
    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('.dropdown-trigger');
        
        // 1. Nếu click vào nút Trigger
        if (trigger) {
            const targetId = trigger.getAttribute('data-target');
            const targetMenu = document.getElementById(targetId);

            // Nếu đang mở chính nó thì đóng lại
            if (activeDropdown === targetMenu) {
                closeDropdown();
                return;
            }

            // Đóng cái cũ nếu đang mở cái khác
            closeDropdown();

            // Hiển thị và định vị
            showDropdown(trigger, targetMenu);
            return;
        }

        // 2. Nếu click ra ngoài (không phải trigger và không nằm trong menu)
        if (activeDropdown && !activeDropdown.contains(e.target)) {
            closeDropdown();
        }
    });

    function showDropdown(btn, menu) {
        activeDropdown = menu;
        activeTrigger = btn;
        
        // Di chuyển menu ra cuối body để thoát z-index đè
        document.body.appendChild(menu);
        menu.style.display = 'block';

        // Tính toán vị trí
        const rect = btn.getBoundingClientRect();
        
        // Đặt menu ngay dưới button
        menu.style.top = `${rect.bottom + 8}px`;
        menu.style.left = `${rect.left}px`;

        // Kiểm tra nếu menu bị tràn mép phải màn hình
        const menuRect = menu.getBoundingClientRect();
        if (menuRect.right > window.innerWidth) {
            menu.style.left = `${rect.right - menuRect.width}px`;
        }
        requestAnimationFrame(() => {
            menu.classList.add('is-open');
            btn.classList.add('is-active');
        });
    }

    function closeDropdown() {
        if (activeTrigger) {
            activeTrigger.classList.remove('is-active');
        }
        if (activeDropdown) {
            activeDropdown.style.display = 'none';
            activeDropdown.classList.remove('is-open');
        }
        activeDropdown = null;
        activeTrigger = null;
    }

    // Đóng khi cuộn trang hoặc resize để tránh lệch vị trí
    window.addEventListener('scroll', closeDropdown, true);
    window.addEventListener('resize', closeDropdown);
}

const footerJs = () => {
    const wrap = document.querySelector('.footer');
    if( wrap ){
        if( ww < 768 ) {
            const listAcc = wrap.querySelector('.footer__listWrap');
            listAcc.querySelectorAll('.mb-accordion .f-title').forEach(button => {
                button.addEventListener('click', () => {
                    const accordionItem = button.parentElement;
                    const content = accordionItem.querySelector('.f-content');
                    const isOpen = accordionItem.classList.contains('active');

                    document.querySelectorAll('.mb-accordion').forEach(item => {
                        item.classList.remove('active');
                        item.querySelector('.f-content').style.height = 0;
                    });

                    if (!isOpen) {
                        accordionItem.classList.add('active');
                        content.style.height = content.scrollHeight + "px";
                    }
                });
            })
        }
    }
}

const textBoxShowMoreJs = () => {
    const wrap = document.querySelectorAll('.textBoxShowMore');
    if( wrap ) {
        wrap.forEach((el) => {
            const btn = el.querySelector('.btn-show-hide');
            const getHeight = el.querySelector('.textBoxShowMore__entry').clientHeight;
            el.querySelector('.textBoxShowMore__text').style.setProperty('--height', `${getHeight}px`);
            addClass([el], 'done');

            btn.addEventListener('click', () => {
                el.classList.toggle("show-more");
            });
        });
    }
}

const initAccordions = () => {
    const containers = document.querySelectorAll('.accordion-container');
    containers.forEach(container => {
        const isMultiple = container.getAttribute('data-multi') === "true";
        const allItems = container.querySelectorAll('.accordion-item');

        // --- LOGIC MỞ SẴN ---
        allItems.forEach(item => {
        if (item.classList.contains('active')) {
            const content = item.querySelector('.accordion-content');
            // Set height ngay lập tức để người dùng thấy nội dung
            content.style.height = content.scrollHeight + "px";
        }
        });

        // --- LOGIC CLICK ---
        container.addEventListener('click', (e) => {
            const header = e.target.closest('.accordion-header');
            if (!header) return;

            const currentItem = header.parentElement;
            const content = currentItem.querySelector('.accordion-content');
            const isOpen = currentItem.classList.contains('active');

            if (!isMultiple && !isOpen) {
                allItems.forEach(item => {
                item.classList.remove('active');
                item.querySelector('.accordion-content').style.height = '0px';
                });
            }

            if (isOpen) {
                currentItem.classList.remove('active');
                content.style.height = '0px';
            } else {
                currentItem.classList.add('active');
                content.style.height = content.scrollHeight + "px";
            }
        });
        setTimeout(() => {
            container.classList.add('is-done');
        }, 100);
    });
};

const tooltipLogic = {
  activeTooltip: null,

  init() {
    const targets = document.querySelectorAll('.has-tooltip');
    
    targets.forEach(target => {
      target.addEventListener('mouseenter', () => this.show(target));
      target.addEventListener('mouseleave', () => this.hide());
    });
  },

  show(target) {
    const selector = target.getAttribute('data-target');
    const template = document.querySelector(selector);
    const preferredPos = target.getAttribute('data-pos') || 'top';

    if (!template) return;

    // 1. Tạo và đẩy vào cuối body
    this.activeTooltip = document.createElement('div');
    this.activeTooltip.className = 'tooltip-portal';
    this.activeTooltip.innerHTML = template.innerHTML;
    document.body.appendChild(this.activeTooltip);

    // 2. Ép trình duyệt render để lấy được kích thước thật của Tooltip
    const targetRect = target.getBoundingClientRect();
    const tooltipRect = this.activeTooltip.getBoundingClientRect();
    
    // 3. Tính toán vị trí
    const coords = this.calculate(targetRect, tooltipRect, preferredPos);

    // 4. Áp dụng tọa độ và hiển thị
    this.activeTooltip.style.transform = `translate(${coords.x}px, ${coords.y}px)`;
    this.activeTooltip.classList.add('visible');
  },

  calculate(t, tt, pos) {
    const margin = 10;
    const padding = 10;
    let x, y;

    // Hàm xác định tọa độ theo vị trí mong muốn
    const getPos = (p) => {
      switch (p) {
        case 'top': 
          return { x: t.left + (t.width - tt.width) / 2, y: t.top - tt.height - margin };
        case 'bottom': 
          return { x: t.left + (t.width - tt.width) / 2, y: t.bottom + margin };
        case 'left': 
          return { x: t.left - tt.width - margin, y: t.top + (t.height - tt.height) / 2 };
        case 'right': 
          return { x: t.right + margin, y: t.top + (t.height - tt.height) / 2 };
      }
    };

    let res = getPos(pos);

    // KIỂM TRA TRÀN (COLLISION)
    // Nếu tràn trên -> lật xuống dưới
    if (res.y < padding) res = getPos('bottom');
    // Nếu tràn dưới -> lật lên trên
    if (res.y + tt.height > window.innerHeight - padding) res = getPos('top');
    
    // Giới hạn không cho tràn trái/phải màn hình
    res.x = Math.max(padding, Math.min(res.x, window.innerWidth - tt.width - padding));
    res.y = Math.max(padding, Math.min(res.y, window.innerHeight - tt.height - padding));

    return res;
  },

  hide() {
    if (this.activeTooltip) {
      this.activeTooltip.remove();
      this.activeTooltip = null;
    }
  }
};

const collapseJs = () => {
    const wraps = document.querySelectorAll(".collapse");
    if(wraps ) {
        wraps.forEach(el => {
            const button = el.querySelector('.collapse-title');
            const content = el.querySelector('.collapse-content');
            button.addEventListener("click", function() {
                
                el.classList.toggle("active");
    
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        });
    }
}

const popupJs = () => {
    const popupWrap = document.querySelectorAll('.popup');
    const openButtons = document.querySelectorAll('.popup-open');
    const overlays = document.querySelectorAll('.popup__wrap');

    // --- HÀM DÙNG CHUNG ---
    const openPopup = (modal) => {
        modal.classList.add('show-popup');
        document.body.classList.add('body-fix-scroll');
    };
    const closePopup = (modal) => {
        modal.classList.remove('show-popup');
        document.body.classList.remove('body-fix-scroll');
    };

    // 1. Xử lý tất cả các NÚT MỞ
    openButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const targetSelector = btn.getAttribute('data-popup-target');
            const targetPopup = document.querySelector(targetSelector);
            if (targetPopup) openPopup(targetPopup);
        });
    });

    // 2. Xử lý Logic cho TỪNG POPUP (Đóng & Trigger)
    popupWrap.forEach(popup => {
        const closeBtn = popup.querySelector('.popup-close');
        const closeBg = popup.querySelector('.popup__wrap');
        closeBtn.addEventListener('click', () => closePopup(popup));

        popup.addEventListener('click', (e) => {
            if (e.target === popup) closePopup(popup);
        });

        closeBg.addEventListener('click', (e) => {
            if( e.target.className === 'popup__wrap' ) {
                closeBtn.click();
            } 
        });

        const delay = parseInt(popup.getAttribute('data-trigger-time'));
        if (!isNaN(delay)) {
            setTimeout(() => {
                openPopup(popup);
            }, delay);
        }
    });
}

const selectKhuVucJs = () => {
    const cityId = document.getElementById('select-city');
    const districtId = document.getElementById('select-district');

    if( cityId && districtId ) {
        const citySelect = new SlimSelect({
            select: cityId,
            settings: {
                placeholderText: cityId.getAttribute('data-placeholder'),
            },
            events: {
                afterChange: (newVal) => {
                    const cityId = newVal[0].value;
                    updateDistricts(cityId);
                }
            }
        });
    
        // 2. Khởi tạo SlimSelect cho Quận/Huyện
        const districtSelect = new SlimSelect({
            select: districtId,
            settings: {
                placeholderText: districtId.getAttribute('data-placeholder'),
            },
            settings: {
                placeholderText: 'Chọn Quận/Huyện',
            }
        });
    
        // 3. Hàm cập nhật dữ liệu
        async function updateDistricts(cityId) {
            // Hiển thị trạng thái đang tải (tùy chọn)
            districtSelect.setData([{ text: 'Đang tải...', value: '' }]);
    
            try {
                // Giả sử đây là API lấy dữ liệu của bạn
                // const response = await fetch(`/api/districts?city=${cityId}`);
                // const data = await response.json();
    
                // Dữ liệu mẫu để test
                const mockData = {
                    hn: [{ text: 'Ba Đình', value: 'bd' }, { text: 'Cầu Giấy', value: 'cg' }],
                    hcm: [{ text: 'Quận 1', value: 'q1' }, { text: 'Quận 7', value: 'q7' }],
                    hn: [{ text: 'Ba Đình', value: 'bd' }, { text: 'Cầu Giấy', value: 'cg' }],
                    hcm2: [{ text: 'Quận 1', value: 'q1' }, { text: 'Quận 7', value: 'q7' }],
                    hn3: [{ text: 'Ba Đình', value: 'bd' }, { text: 'Cầu Giấy', value: 'cg' }],
                    hcm3: [{ text: 'Quận 1', value: 'q1' }, { text: 'Quận 7', value: 'q7' }],
                    hn4: [{ text: 'Ba Đình', value: 'bd' }, { text: 'Cầu Giấy', value: 'cg' }],
                    hcm4: [{ text: 'Quận 1', value: 'q1' }, { text: 'Quận 7', value: 'q7' }],
                };
    
                const districts = mockData[cityId] || [];
    
                // QUAN TRỌNG: Dùng setData để SlimSelect tự cập nhật UI
                districtSelect.setData(districts.map(d => ({
                    text: d.text,
                    value: d.value
                })));
    
            } catch (error) {
                console.error('Error data:', error);
            }
        }
    }
}

const onePageNavJs = () => {
    const sections = document.querySelectorAll("[data-trigger-link]");
    const navLinks = document.querySelectorAll(".nav-linkJs");
    if( sections && navLinks) {
        const getHeight = document.querySelector('.header__wrap').clientHeight + 20;
    
        const options = {
            threshold: 0.6,
        };
    
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
            if (entry.isIntersecting) {
                navLinks.forEach((link) => link.classList.remove("active"));
                
                const activeLink = document.querySelector(`.nav-linkJs[href="#${entry.target.id}"]`);
                if (activeLink) activeLink.classList.add("active");
            }
            });
        }, options);
    
        sections.forEach((section) => observer.observe(section));
    
        navLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
            e.preventDefault();
        
            const targetId = link.getAttribute("href");
            const targetSection = document.querySelector(targetId);
            
            
    
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',       // cuộn mượt
                    block: 'start',           // đưa đầu section lên đầu viewport
                    inline: 'nearest'
                });
            }
            });
        });
    }
}

const sanphamRalate = () => {
    const slide1 = document.querySelectorAll('.sanphanRalate-slideJs');
    slide1.forEach((item) => {
        const swiper = item.querySelector('.swiper');
        new Swiper(swiper, {
            slidesPerView: 2,
            spaceBetween: 10,
            speed: 700,
            pagination: {
                el: swiper.querySelector('.swiper-pagination'),
                clickable: true,
            },
            navigation: {
                prevEl: swiper.querySelector('.swiper-buttonCustom-prev'),
                nextEl: swiper.querySelector('.swiper-buttonCustom-next'),
            },
            breakpoints: {
                767: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 15
                }
            }
        });
    });
}

const checkChinhSachBoxJs = () => {
    const wrap = document.querySelector('.checkChinhSachBox');
    if( wrap ) {
        container = wrap.querySelector('.entry-scroll');
        let parentHeight = container.clientHeight;    
        let totalContentHeight = container.scrollHeight;

        if( totalContentHeight > parentHeight ) {
            wrap.classList.add('set-scroll');
        }

        container.addEventListener('scroll', () => {
            const scrolled = container.scrollTop;
            parentHeight = container.clientHeight;
            totalContentHeight = container.scrollHeight;
            if (scrolled + parentHeight >= totalContentHeight - 1) {
                container.classList.add('is-bottom');
            } else {
                container.classList.remove('is-bottom');
            }
        });
    }
}

function initAdvancedZoom() {
    const items = document.querySelectorAll('.zoom-item');
    const result = document.getElementById('zoom-result');
    let zoomScale = 3; // Mức zoom khởi điểm

    items.forEach(item => {
        const img = item.querySelector('img');
        const mode = item.getAttribute('data-zoom-mode');
        const lens = document.createElement('div');
        lens.className = 'zoom-lens';
        item.appendChild(lens);

        // Xử lý lăn chuột thay đổi độ zoom
        item.addEventListener('wheel', (e) => {
            e.preventDefault();
            const step = 0.05;
            zoomScale = e.deltaY > 0 ? Math.max(1.2, zoomScale - step) : Math.min(5, zoomScale + step);
            render(e);
        });

        item.addEventListener('mousemove', render);
        item.addEventListener('mouseleave', () => {
            lens.style.display = 'none';
            result.style.display = 'none';
            img.style.transform = 'scale(1)';
            zoomScale = 5;
        });

        function render(e) {
            const rect = item.getBoundingClientRect();
            
            if (mode === 'center') {
                // --- CHẾ ĐỘ CENTER ---
                lens.style.display = 'none';
                result.style.display = 'none';
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                img.style.transformOrigin = `${x}% ${y}%`;
                img.style.transform = `scale(${zoomScale})`;
            } 
            else {
                // --- CHẾ ĐỘ LEFT HOẶC RIGHT ---
                lens.style.display = 'block';
                result.style.display = 'block';
                img.style.transform = 'scale(1)'; // Reset zoom ảnh gốc

                const ratio = rect.width / rect.height;

                // Tính kích thước lens theo tỉ lệ box result và zoomScale
                const lensW = result.offsetWidth / zoomScale;
                const lensH = result.offsetHeight / zoomScale;
                lens.style.width = lensW + "px";
                lens.style.height = lensH + "px";


                // Vị trí chuột
                let x = e.clientX - rect.left - (lensW / 2);
                let y = e.clientY - rect.top - (lensH / 2);

                // Giới hạn lens trong khung ảnh
                x = Math.max(0, Math.min(x, rect.width - lensW));
                y = Math.max(0, Math.min(y, rect.height - lensH));

                lens.style.left = x + "px";
                lens.style.top = y + "px";

                // Đặt vị trí Box Result (Left/Right)
                const gap = 20; // Khoảng cách giữa ảnh và box zoom
                if (mode === 'right') {
                    result.style.left = (rect.right + gap) + "px";
                    result.style.top = rect.top + "px";
                } else {
                    result.style.left = (rect.left - result.offsetWidth - gap) + "px";
                    result.style.top = rect.top + "px";
                }

                // Cập nhật ảnh zoom
                result.style.backgroundImage = `url('${img.src}')`;
                result.style.backgroundSize = `${rect.width * zoomScale}px ${rect.height * zoomScale}px`;
                result.style.backgroundPosition = `-${x * zoomScale}px -${y * zoomScale}px`;
                
            }
        }
    });
}

function controlVideo(swiperInstance) {
    if (Fancybox.getInstance()) return;
    const activeSlide = swiperInstance.slides[swiperInstance.activeIndex];
    const activeVideo = activeSlide.querySelector('video');
    
    if (activeVideo) {
        // Kiểm tra nếu video chưa có src (do lazy load) thì gán lại
        const source = activeVideo.querySelector('source');
        if (source && !activeVideo.src) {
            activeVideo.src = source.getAttribute('data-src');
            activeVideo.load();
            activeVideo.addEventListener('loadeddata', () => {
                activeSlide.querySelector('.swiper-lazy-preloader').classList.add('done');
            });
        }
        
        // activeVideo.play().catch(() => {});
    }
}

const productViewSlideJs = () => {
    const wrap = document.querySelector('.productViewSlide');
    if( wrap ) {
        const domBig = wrap.querySelector('.swiper-big');
        const domThumb = wrap.querySelector('.swiper-thumb');

        var swiperThumb = new Swiper(domThumb, {
            slidesPerView: 6,
            spaceBetween: 10,
            speed: 700,
            freeMode: true,
            watchSlidesProgress: true,
        });
        
        var swiperImg = new Swiper(domBig, {
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 500,
            navigation: {
                prevEl: domBig.querySelector('.swiper-buttonCustom-prev'),
                nextEl: domBig.querySelector('.swiper-buttonCustom-next'),
            },
            autoplay: {
                delay: 20000,
                disableOnInteraction: false
            },
            thumbs: {
                swiper: swiperThumb
            },
            on: {
                init: function () {
                    if( ww > 1199 ) {

                        initAdvancedZoom();
                    } 
                },
                slideChange: function () {
                    this.slides.forEach(slide => {
                        const video = slide.querySelector('video');
                        if (video) {
                            video.pause();
                            video.currentTime = 0;
                        }
                    });
                }
            },
        });

        swiperImg.on('slideChange', function() {
            setTimeout(function() {
                const getIndex = domBig.querySelector('.swiper-slide-active').getAttribute('data-index');
                swiperThumb.slideTo(getIndex);

            });
        });

        domThumb.querySelectorAll('.swiper-slide').forEach((e) => {
            e.addEventListener('click', () => {
                if( !hasClass(e, 'swiper-slide-active')) {
                    var getIndex = e.getAttribute('data-index');
                    swiperThumb.slideTo( Number(getIndex), 500, false );
                }
            });
        });
    }
}


wowReponsiveJs();
wowLoadDoneJs();
headerJs();
heroSlideJs();
homeProductQcJs();
footerJs();
filterSidebarJs();
dropDownJs();
dropDownJsTrigger();
productViewSlideJs();
tooltipLogic.init();
collapseJs();
selectKhuVucJs();
sanphamRalate();

Fancybox.bind("[data-fancybox]", {
    Toolbar: {
        display: {
        left: ["infobar"],
        middle: ["zoomIn", "zoomOut", "toggleZoom"],
        right: ["close"],
        },
    },
    Carousel: {
        Zoomable: {
            maxScale: 2, 
        },
    },
});

window.addEventListener('resize', debouncedResponsive);
window.addEventListener('orientationchange', () => {
  setTimeout(debouncedResponsive, 200);
});

document.addEventListener('DOMContentLoaded', function() {
    addClass([document.querySelector('body')], 'body-load-done');
    textBoxShowMoreJs();
    initAccordions();
    popupJs();
    onePageNavJs();
    checkChinhSachBoxJs();
    
    setTimeout(() => {
        scrollToHash();
    }, 100);

    // const viewportWidth = window.innerWidth;
    // const viewportHeight = window.innerHeight;
    // alert(`Width: ${viewportWidth}px, Height: ${viewportHeight}px`);
});
window.addEventListener('hashchange', scrollToHash);