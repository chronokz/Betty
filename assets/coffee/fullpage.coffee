$('#fullpage').fullpage()
###	API https://github.com/alvarotrigo/fullPage.js#fullpagejs
	
	# Navigation
	menu: false
	anchors: ['firstSlide', 'secondSlide']
	navigation: false
	navigationPosition: 'right'
	navigationTooltips: ['firstSlide', 'secondSlide']
	slidesNavigation: true
	slidesNavPosition: 'bottom',

	# Scrolling
	css3: true
	scrollingSpeed: 700
	autoScrolling: true
	scrollBar: false
	easing: 'easeInQuart'
	easingcss3: 'ease'
	loopBottom: false
	loopTop: false
	loopHorizontal: true
	continuousVertical: false
	normalScrollElements: '#element1, .element2'
	scrollOverflow: false
	touchSensitivity: 15
	normalScrollElementTouchThreshold: 5

	# Accessibility
	keyboardScrolling: true
	animateAnchor: true,

	# Design
	verticalCentered: true
	resize : true
	sectionsColor : ['#ccc', '#fff']
	paddingTop: '3em'
	paddingBottom: '10px'
	fixedElements: '#header, .footer'
	responsive: 0,

	# Custom selectors
	sectionSelector: '.section'
	slideSelector: '.slide',

	# events
	onLeave: (index, nextIndex, direction) -> 

	afterLoad: (anchorLink, index) -> 

	afterRender: () -> 

	afterResize: () -> 

	afterSlideLoad: (anchorLink, index, slideAnchor, slideIndex) -> 

	onSlideLeave: (anchorLink, index, slideIndex, direction) -> 

###