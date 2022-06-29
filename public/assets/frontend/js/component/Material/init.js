//define([
//    'exports', 'module', 'js/component/Material/app', 'js/component/Material/perfect-scrollbar.jquery.min.js',
//    'js/component/Material/sparkline', 'js/component/Material/waves', 'js/component/Material/sidebarmenu',
//    'js/component/Material/custom'
//  ], 
//  function(
//    Init, module, App, PerfectScrollbar, Sparkline, Waves, SidebarMenu, Custom
//  ) {

	$(function() {
	    "use strict";
	    $("#main-wrapper").AdminSettings({
	        Theme: false, // this can be true or false ( true means dark and false means light ),
	        Layout: 'vertical',
	        LogoBg: 'skin1', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6 
	        NavbarBg: 'skin1', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
	        SidebarType: 'mini-sidebar', // You can change it full / mini-sidebar / iconbar / overlay
	        SidebarColor: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
	        SidebarPosition: true, // it can be true / false ( true means Fixed and false means absolute )
	        HeaderPosition: true, // it can be true / false ( true means Fixed and false means absolute )
	        BoxedLayout: false, // it can be true / false ( true means Boxed and false means Fluid ) 
	    });
	});
//});