Cufon.replace('.left-description h2, .right-description h2', { fontFamily: 'Aller' });

$(document).ready(function() {
    $('#slides1').bxSlider({
		alignment: 'horizontal',        // 'horizontal', 'vertical' - direction in which slides will move
		controls: true,                 // determines if default 'next'/'prev' controls are displayed
		speed: 500,                     // amount of time slide transition lasts (in milliseconds)
		pager: true,                    // determines if a numeric pager is displayed (1 2 3 4...)
		pager_short: false,             // determines if a 'short' numeric pager is displayed (1/4)
		pager_short_separator: ' / ',   // text to be used to separate the short pager
		margin: 0,                      // if 'horizontal', applies a right margin to each slide, if 'vertical' a
				                        // bottom margin is applied. example: margin: 50
		next_text: '',              // text to be displayed for the 'next' control
		next_image: '',                 // image to be used for the 'next' control
		prev_text: '',              // text to be displayed for the 'prev' control
		prev_image: '',                 // image to be used for the 'prev' control
		auto: true,                    // determines if slides will move automatically
		pause: 5000,                    // time between each slide transition (auto mode only) 
		auto_direction: 'next',         // order in which slides will transition (auto mode only)
		auto_hover: false,               // determines if slideshow will pause while mouse is hovering over slideshow
		auto_controls: false,           // determines if 'start'/'stop' controls are displayed (auto mode only)
		ticker: false,                  // determines if slideshow will behave as a constant ticker
		ticker_controls: false,         // determines if 'start'/'stop' ticker controls are displayed (ticker mode only)
		ticker_direction: 'next',       // order in which slides will transition (ticker mode only)
		ticker_hover: true,             // determines if slideshow will pause while mouse is hovering over slideshow
		stop_text: 'stop',              // text to be displayed for the 'stop' control
		start_text: 'start',            // text to be displayed for the 'start' control
		wrapper_class: 'slides1_wrap'  // class name to be used for the outer wrapper of the slideshow
	});
});